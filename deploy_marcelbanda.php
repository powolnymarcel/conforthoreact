#!/usr/bin/env php
<?php
declare(strict_types=1);

/**
 * One-shot deploy for bandagisterie-confortho.be (Laravel + Vite).
 *
 * Run:
 *   php deploy_marcelbanda.php
 * Or with migrations:
 *   php deploy_marcelbanda.php --migrate
 */

final class DeployMarcelBanda
{
    private string $domain = 'bandagisterie-confortho.be';
    private string $wwwDomain = 'www.bandagisterie-confortho.be';
    private string $repoUrl = 'https://github.com/powolnymarcel/conforthoreact.git';
    private string $baseDir = '/var/www/bandagisterie-confortho.be';
    private string $appDir = '/var/www/bandagisterie-confortho.be/www';
    private string $nginxConfPath = '/etc/nginx/sites-available/bandagisterie-confortho';
    private string $nginxEnabledPath = '/etc/nginx/sites-enabled/bandagisterie-confortho';
    private string $phpFpmSock = '';
    private bool $runMigrations = false;
    private bool $autoDbProvision = true;
    private bool $regenDb = false;
    private string $dumpPath = '';
    private bool $isRoot = false;

    public function __construct(array $argv)
    {
        $this->isRoot = function_exists('posix_geteuid') && posix_geteuid() === 0;
        $this->parseArgs($argv);
    }

    public function run(): void
    {
        $this->requireCommand('git');
        $this->requireCommand('php');
        $this->requireCommand('composer');
        $this->requireCommand('npm');
        $this->requireCommand('nginx');
        $this->requireCommand('curl');
        if ($this->autoDbProvision) {
            $this->requireCommand('mysql');
        }

        if (!$this->isRoot) {
            $this->requireCommand('sudo');
        }

        $this->phpFpmSock = $this->detectPhpFpmSocket($this->phpFpmSock);
        $branch = $this->detectDefaultBranch($this->repoUrl) ?: 'main';

        $this->log("Domain: {$this->domain}");
        $this->log("Repo: {$this->repoUrl} (branch {$branch})");
        $this->log("App dir: {$this->appDir}");
        $this->log("PHP-FPM socket: {$this->phpFpmSock}");

        $this->runCmd($this->sudo("mkdir -p " . escapeshellarg($this->baseDir)));
        $this->runCmd($this->sudo("chown -R " . escapeshellarg($this->currentUserGroup()) . " " . escapeshellarg($this->baseDir)));

        $this->cloneOrUpdateRepo($branch);

        $this->runCmd("cd " . escapeshellarg($this->appDir) . " && test -f .env || cp .env.example .env");
        $this->prepareLaravelCacheDirs();
        if ($this->autoDbProvision) {
            $this->provisionDatabaseFromDump();
        }

        $this->runCmd("cd " . escapeshellarg($this->appDir) . " && composer install --no-dev --optimize-autoloader --no-interaction");
        $this->runCmd("cd " . escapeshellarg($this->appDir) . " && npm ci");
        $this->runCmd("cd " . escapeshellarg($this->appDir) . " && npm run build");

        if (!$this->hasLaravelAppKey()) {
            $this->runCmd("cd " . escapeshellarg($this->appDir) . " && php artisan key:generate --force");
        }

        $this->runCmd("cd " . escapeshellarg($this->appDir) . " && php artisan storage:link", true);
        $this->runCmd("cd " . escapeshellarg($this->appDir) . " && php artisan optimize:clear", true);
        $this->runCmd("cd " . escapeshellarg($this->appDir) . " && php artisan optimize");

        if ($this->runMigrations) {
            $this->runCmd("cd " . escapeshellarg($this->appDir) . " && php artisan migrate --force");
        } else {
            $this->log("Skipping migrations (use --migrate to run them).");
        }

        $this->runCmd($this->sudo("chown -R www-data:www-data " . escapeshellarg($this->appDir . "/storage") . " " . escapeshellarg($this->appDir . "/bootstrap/cache")));
        $this->runCmd($this->sudo("find " . escapeshellarg($this->appDir . "/storage") . " " . escapeshellarg($this->appDir . "/bootstrap/cache") . " -type d -exec chmod 775 {} \\;"));
        $this->runCmd($this->sudo("find " . escapeshellarg($this->appDir . "/storage") . " " . escapeshellarg($this->appDir . "/bootstrap/cache") . " -type f -exec chmod 664 {} \\;"));

        $this->writeNginxConfig();
        $this->enableNginxSite();

        $this->runCmd($this->sudo("nginx -t"));
        $this->runCmd($this->sudo("systemctl reload nginx"));

        $this->probeSite();
        $this->log("Deploy finished.");
    }

    private function parseArgs(array $argv): void
    {
        foreach ($argv as $arg) {
            if ($arg === '--migrate') {
                $this->runMigrations = true;
                continue;
            }
            if ($arg === '--skip-db') {
                $this->autoDbProvision = false;
                continue;
            }
            if ($arg === '--regen-db') {
                $this->regenDb = true;
                continue;
            }
            if (strpos($arg, '--domain=') === 0) {
                $this->domain = substr($arg, strlen('--domain='));
                continue;
            }
            if (strpos($arg, '--www-domain=') === 0) {
                $this->wwwDomain = substr($arg, strlen('--www-domain='));
                continue;
            }
            if (strpos($arg, '--repo=') === 0) {
                $this->repoUrl = substr($arg, strlen('--repo='));
                continue;
            }
            if (strpos($arg, '--base-dir=') === 0) {
                $this->baseDir = rtrim(substr($arg, strlen('--base-dir=')), '/');
                $this->appDir = $this->baseDir . '/www';
                continue;
            }
            if (strpos($arg, '--php-fpm-sock=') === 0) {
                $this->phpFpmSock = substr($arg, strlen('--php-fpm-sock='));
                continue;
            }
            if (strpos($arg, '--dump=') === 0) {
                $this->dumpPath = substr($arg, strlen('--dump='));
                continue;
            }
            if ($arg === '--help' || $arg === '-h') {
                $this->printHelp();
                exit(0);
            }
        }
    }

    private function printHelp(): void
    {
        echo "Usage: php deploy_marcelbanda.php [options]\n\n";
        echo "Options:\n";
        echo "  --migrate                 Run php artisan migrate --force\n";
        echo "  --skip-db                 Skip automatic DB provisioning/import\n";
        echo "  --regen-db                Force new random DB/user/password and reimport dump\n";
        echo "  --dump=...                Dump path (default: database/dump.sql or current_db_dump.sql)\n";
        echo "  --domain=...              Domain (default: {$this->domain})\n";
        echo "  --www-domain=...          WWW domain (default: {$this->wwwDomain})\n";
        echo "  --repo=...                Git URL (default: {$this->repoUrl})\n";
        echo "  --base-dir=...            Base dir (default: {$this->baseDir})\n";
        echo "  --php-fpm-sock=...        Force PHP-FPM socket path\n";
        echo "  --help                    Show this help\n";
    }

    private function cloneOrUpdateRepo(string $branch): void
    {
        if (is_dir($this->appDir . '/.git')) {
            $this->runCmd("git -C " . escapeshellarg($this->appDir) . " fetch --all --prune");
            $this->runCmd("git -C " . escapeshellarg($this->appDir) . " checkout " . escapeshellarg($branch));
            $this->runCmd("git -C " . escapeshellarg($this->appDir) . " pull --ff-only origin " . escapeshellarg($branch));
            return;
        }

        if (is_dir($this->appDir) && !$this->isDirectoryEmpty($this->appDir)) {
            throw new RuntimeException("Directory exists and is not empty: {$this->appDir}");
        }

        $this->runCmd("git clone --branch " . escapeshellarg($branch) . " " . escapeshellarg($this->repoUrl) . " " . escapeshellarg($this->appDir));
    }

    private function prepareLaravelCacheDirs(): void
    {
        $dirs = [
            "{$this->appDir}/bootstrap/cache",
            "{$this->appDir}/storage/framework/cache",
            "{$this->appDir}/storage/framework/sessions",
            "{$this->appDir}/storage/framework/views",
            "{$this->appDir}/storage/framework/testing",
            "{$this->appDir}/storage/logs",
        ];
        foreach ($dirs as $dir) {
            if (!is_dir($dir) && !mkdir($dir, 0775, true) && !is_dir($dir)) {
                throw new RuntimeException("Failed to create directory: {$dir}");
            }
        }
        @touch("{$this->appDir}/storage/logs/laravel.log");
    }

    private function provisionDatabaseFromDump(): void
    {
        $existingDb = $this->getEnvValue('DB_DATABASE');
        $existingUser = $this->getEnvValue('DB_USERNAME');
        $existingPass = $this->getEnvValue('DB_PASSWORD');

        if (
            !$this->regenDb &&
            $existingDb !== '' &&
            $existingUser !== '' &&
            $existingPass !== ''
        ) {
            $this->log("Existing DB credentials found in .env, skipping DB provisioning. Use --regen-db to rotate.");
            return;
        }

        $dumpFile = $this->resolveDumpFile();
        $dbName = 'banda_' . substr(bin2hex(random_bytes(8)), 0, 12);
        $dbUser = 'u_' . substr(bin2hex(random_bytes(8)), 0, 14);
        $dbPass = substr(bin2hex(random_bytes(18)), 0, 28);

        $this->log("Creating random MySQL database/user...");
        $sql = implode("\n", [
            "CREATE DATABASE `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;",
            "CREATE USER '{$dbUser}'@'localhost' IDENTIFIED BY '{$dbPass}';",
            "CREATE USER '{$dbUser}'@'%' IDENTIFIED BY '{$dbPass}';",
            "GRANT ALL PRIVILEGES ON `{$dbName}`.* TO '{$dbUser}'@'localhost';",
            "GRANT ALL PRIVILEGES ON `{$dbName}`.* TO '{$dbUser}'@'%';",
            "FLUSH PRIVILEGES;",
        ]);
        $this->runCmd($this->sudo("mysql -e " . escapeshellarg($sql)));

        $this->log("Importing dump into {$dbName} from {$dumpFile} ...");
        $this->runCmd(
            $this->sudo(
                "mysql --default-character-set=utf8mb4 " .
                escapeshellarg($dbName) .
                " < " . escapeshellarg($dumpFile)
            )
        );

        $this->setEnvValues([
            'APP_URL' => 'https://' . $this->domain,
            'DB_CONNECTION' => 'mysql',
            'DB_HOST' => '127.0.0.1',
            'DB_PORT' => '3306',
            'DB_DATABASE' => $dbName,
            'DB_USERNAME' => $dbUser,
            'DB_PASSWORD' => $dbPass,
        ]);

        $this->writeDbCredentialsFile($dbName, $dbUser, $dbPass, $dumpFile);
        $this->log("DB_DATABASE={$dbName}");
        $this->log("DB_USERNAME={$dbUser}");
        $this->log("DB_PASSWORD={$dbPass}");
        $this->log("Database ready. Credentials saved in {$this->appDir}/.deploy-db-credentials.txt");
    }

    private function resolveDumpFile(): string
    {
        $candidates = [];

        if ($this->dumpPath !== '') {
            if (str_starts_with($this->dumpPath, '/')) {
                $candidates[] = $this->dumpPath;
            } else {
                $candidates[] = $this->appDir . '/' . ltrim($this->dumpPath, '/');
            }
        } else {
            $candidates[] = $this->appDir . '/database/dump.sql';
            $candidates[] = $this->appDir . '/current_db_dump.sql';
        }

        foreach ($candidates as $file) {
            if (is_file($file) && is_readable($file)) {
                return $file;
            }
        }

        throw new RuntimeException(
            'No SQL dump found. Expected: ' .
            implode(' or ', $candidates)
        );
    }

    private function getEnvValue(string $key): string
    {
        $envPath = $this->appDir . '/.env';
        if (!is_file($envPath)) {
            return '';
        }
        $content = file_get_contents($envPath);
        if (!is_string($content) || $content === '') {
            return '';
        }

        if (!preg_match('/^' . preg_quote($key, '/') . '=(.*)$/m', $content, $m)) {
            return '';
        }

        $raw = trim($m[1]);
        if ($raw === 'null' || $raw === '(null)' || $raw === '') {
            return '';
        }
        if (
            (str_starts_with($raw, '"') && str_ends_with($raw, '"')) ||
            (str_starts_with($raw, "'") && str_ends_with($raw, "'"))
        ) {
            return substr($raw, 1, -1);
        }
        return $raw;
    }

    /**
     * @param array<string,string> $values
     */
    private function setEnvValues(array $values): void
    {
        $envPath = $this->appDir . '/.env';
        $content = file_get_contents($envPath);
        if (!is_string($content)) {
            throw new RuntimeException("Cannot read {$envPath}");
        }

        $lines = preg_split('/\r\n|\n|\r/', rtrim($content, "\r\n")) ?: [];
        $found = array_fill_keys(array_keys($values), false);

        foreach ($lines as &$line) {
            foreach ($values as $key => $value) {
                if (preg_match('/^\s*' . preg_quote($key, '/') . '\s*=/', $line) === 1) {
                    $line = $key . '=' . $this->formatEnvValue($value);
                    $found[$key] = true;
                    break;
                }
            }
        }
        unset($line);

        foreach ($values as $key => $value) {
            if (!$found[$key]) {
                $lines[] = $key . '=' . $this->formatEnvValue($value);
            }
        }

        $newContent = implode(PHP_EOL, $lines) . PHP_EOL;
        if (file_put_contents($envPath, $newContent) === false) {
            throw new RuntimeException("Cannot write {$envPath}");
        }
    }

    private function formatEnvValue(string $value): string
    {
        if (preg_match('/^[A-Za-z0-9_\\-\\.]+$/', $value) === 1) {
            return $value;
        }
        return '"' . addcslashes($value, "\\\"$") . '"';
    }

    private function writeDbCredentialsFile(string $dbName, string $dbUser, string $dbPass, string $dumpFile): void
    {
        $path = $this->appDir . '/.deploy-db-credentials.txt';
        $content = implode(PHP_EOL, [
            'Date=' . date('c'),
            'Domain=' . $this->domain,
            'DB_HOST=127.0.0.1',
            'DB_PORT=3306',
            'DB_DATABASE=' . $dbName,
            'DB_USERNAME=' . $dbUser,
            'DB_PASSWORD=' . $dbPass,
            'DUMP_FILE=' . $dumpFile,
            '',
        ]);

        if (file_put_contents($path, $content) === false) {
            throw new RuntimeException("Cannot write {$path}");
        }
        @chmod($path, 0600);
    }

    private function writeNginxConfig(): void
    {
        $certFullchain = "/etc/letsencrypt/live/{$this->domain}/fullchain.pem";
        $certPrivkey = "/etc/letsencrypt/live/{$this->domain}/privkey.pem";
        $certOptions = "/etc/letsencrypt/options-ssl-nginx.conf";
        $certDhparam = "/etc/letsencrypt/ssl-dhparams.pem";
        $webshellSnippet = "/etc/nginx/snippets/block-webshells.conf";

        $webshellInclude = is_file($webshellSnippet) ? "    include {$webshellSnippet};\n" : '';
        $hasCert = is_file($certFullchain) && is_file($certPrivkey);

        $httpOnly = <<<NGINX
server {
    listen 80;
    listen [::]:80;
    server_name {$this->domain} {$this->wwwDomain};
{$webshellInclude}    root {$this->appDir}/public;
    index index.php index.html;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location = /index.php {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:{$this->phpFpmSock};
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ \.php$ {
        return 404;
    }

    location ~ /\. {
        deny all;
    }
}
NGINX;

        $httpsConfig = <<<NGINX
server {
    listen 80;
    listen [::]:80;
    server_name {$this->domain} {$this->wwwDomain};
    return 301 https://\$host\$request_uri;
}

server {
    listen 443 ssl;
    listen [::]:443 ssl;
    server_name {$this->domain} {$this->wwwDomain};

{$webshellInclude}    root {$this->appDir}/public;
    index index.php index.html;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location /storage/ {
        alias {$this->appDir}/storage/app/public/;
        access_log off;
        expires 30d;
        add_header Cache-Control "public, immutable";
    }

    location = /index.php {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:{$this->phpFpmSock};
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ \.php$ {
        return 404;
    }

    location ~ /\. {
        deny all;
    }

    ssl_certificate {$certFullchain};
    ssl_certificate_key {$certPrivkey};
NGINX;

        if (is_file($certOptions)) {
            $httpsConfig .= "\n    include {$certOptions};";
        }
        if (is_file($certDhparam)) {
            $httpsConfig .= "\n    ssl_dhparam {$certDhparam};";
        }

        $httpsConfig .= "\n}\n";
        $configContent = $hasCert ? $httpsConfig : $httpOnly;

        $tmp = tempnam(sys_get_temp_dir(), 'nginx-banda-');
        if ($tmp === false) {
            throw new RuntimeException('Failed to create temp file for nginx config');
        }
        file_put_contents($tmp, $configContent);

        $this->runCmd($this->sudo("install -m 644 " . escapeshellarg($tmp) . " " . escapeshellarg($this->nginxConfPath)));
        @unlink($tmp);
    }

    private function enableNginxSite(): void
    {
        $this->runCmd($this->sudo("ln -sfn " . escapeshellarg($this->nginxConfPath) . " " . escapeshellarg($this->nginxEnabledPath)));
        $this->runCmd($this->sudo("rm -f /etc/nginx/sites-enabled/default"), true);
        $this->runCmd($this->sudo("rm -f /etc/nginx/sites-enabled/marcelbanda.conf"), true);
    }

    private function hasLaravelAppKey(): bool
    {
        $envPath = $this->appDir . '/.env';
        if (!is_file($envPath)) {
            return false;
        }
        $env = file_get_contents($envPath);
        if ($env === false) {
            return false;
        }
        if (!preg_match('/^APP_KEY=(.*)$/m', $env, $m)) {
            return false;
        }
        $value = trim($m[1]);
        return $value !== '' && $value !== 'null';
    }

    private function detectDefaultBranch(string $repo): ?string
    {
        $cmd = "git ls-remote --symref " . escapeshellarg($repo) . " HEAD 2>/dev/null";
        $out = shell_exec($cmd);
        if (!is_string($out) || $out === '') {
            return null;
        }
        if (preg_match('/^ref:\s+refs\\/heads\\/([^\\s]+)\\s+HEAD/m', $out, $m)) {
            return $m[1];
        }
        return null;
    }

    private function detectPhpFpmSocket(string $manual): string
    {
        if ($manual !== '') {
            if (file_exists($manual)) {
                return $manual;
            }
            throw new RuntimeException("Provided PHP-FPM socket does not exist: {$manual}");
        }

        $candidates = [];

        $cliVersion = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;
        $cliSock = "/run/php/php{$cliVersion}-fpm.sock";
        if (file_exists($cliSock)) {
            $candidates[] = $cliSock;
        }

        foreach (glob('/run/php/php*-fpm.sock') ?: [] as $sock) {
            $candidates[] = $sock;
        }

        $candidates = array_values(array_unique($candidates));
        usort($candidates, static function (string $a, string $b): int {
            $va = self::extractVersionFromSock($a);
            $vb = self::extractVersionFromSock($b);
            return version_compare($vb, $va);
        });

        foreach ($candidates as $sock) {
            $version = self::extractVersionFromSock($sock);
            if ($version === '' || version_compare($version, '8.1', '<')) {
                continue;
            }
            if (file_exists($sock)) {
                return $sock;
            }
        }

        throw new RuntimeException('No compatible PHP-FPM socket found (need PHP >= 8.1).');
    }

    private static function extractVersionFromSock(string $sock): string
    {
        if (preg_match('/php(\\d+)\\.(\\d+)-fpm\\.sock$/', $sock, $m)) {
            return $m[1] . '.' . $m[2];
        }
        return '';
    }

    private function probeSite(): void
    {
        $url = 'https://' . $this->domain . '/';
        $cmd = "curl -kI --resolve " . escapeshellarg("{$this->domain}:443:127.0.0.1") . " " . escapeshellarg($url) . " | head -n 1";
        $this->runCmd($cmd, true);
    }

    private function currentUserGroup(): string
    {
        $user = trim((string) shell_exec('id -un'));
        $group = trim((string) shell_exec('id -gn'));
        if ($user === '' || $group === '') {
            throw new RuntimeException('Cannot resolve current user/group');
        }
        return "{$user}:{$group}";
    }

    private function isDirectoryEmpty(string $dir): bool
    {
        $items = scandir($dir);
        if ($items === false) {
            return true;
        }
        foreach ($items as $item) {
            if ($item !== '.' && $item !== '..') {
                return false;
            }
        }
        return true;
    }

    private function requireCommand(string $cmd): void
    {
        $code = 0;
        system("command -v " . escapeshellarg($cmd) . " >/dev/null 2>&1", $code);
        if ($code !== 0) {
            throw new RuntimeException("Missing required command: {$cmd}");
        }
    }

    private function sudo(string $cmd): string
    {
        return $this->isRoot ? $cmd : "sudo " . $cmd;
    }

    private function runCmd(string $cmd, bool $allowFail = false): void
    {
        echo ">> {$cmd}\n";
        passthru($cmd, $code);
        if ($code !== 0 && !$allowFail) {
            throw new RuntimeException("Command failed with exit code {$code}: {$cmd}");
        }
    }

    private function log(string $message): void
    {
        echo "[deploy] {$message}\n";
    }
}

try {
    (new DeployMarcelBanda($argv))->run();
} catch (Throwable $e) {
    fwrite(STDERR, "[deploy][ERROR] " . $e->getMessage() . PHP_EOL);
    exit(1);
}
