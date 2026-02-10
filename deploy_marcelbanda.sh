#!/usr/bin/env bash
set -Eeuo pipefail

# ---------------------------------------------
# Deploy script for bandagisterie-confortho.be
# ---------------------------------------------

DOMAIN="${DOMAIN:-bandagisterie-confortho.be}"
WWW_DOMAIN="${WWW_DOMAIN:-www.bandagisterie-confortho.be}"
REPO_URL="${REPO_URL:-https://github.com/powolnymarcel/conforthoreact.git}"
BASE_DIR="${BASE_DIR:-/var/www/${DOMAIN}}"
APP_DIR="${APP_DIR:-${BASE_DIR}/www}"
NGINX_CONF_PATH="${NGINX_CONF_PATH:-/etc/nginx/sites-available/marcelbanda.conf}"
NGINX_ENABLED_PATH="${NGINX_ENABLED_PATH:-/etc/nginx/sites-enabled/marcelbanda.conf}"
PHP_FPM_SOCK="${PHP_FPM_SOCK:-}"
RUN_MIGRATIONS="${RUN_MIGRATIONS:-0}"

CERT_FULLCHAIN="/etc/letsencrypt/live/${DOMAIN}/fullchain.pem"
CERT_PRIVKEY="/etc/letsencrypt/live/${DOMAIN}/privkey.pem"
CERTBOT_SSL_OPTIONS="/etc/letsencrypt/options-ssl-nginx.conf"
CERTBOT_SSL_DHPARAM="/etc/letsencrypt/ssl-dhparams.pem"
WEBSHELL_SNIPPET="/etc/nginx/snippets/block-webshells.conf"

log() {
  printf '[deploy] %s\n' "$*"
}

require_cmd() {
  if ! command -v "$1" >/dev/null 2>&1; then
    printf 'ERROR: required command not found: %s\n' "$1" >&2
    exit 1
  fi
}

default_branch() {
  git ls-remote --symref "$REPO_URL" HEAD \
    | awk '/^ref:/ {sub("refs/heads/","",$2); print $2; exit}'
}

detect_php_fpm_sock() {
  if [[ -n "$PHP_FPM_SOCK" ]]; then
    if [[ ! -S "$PHP_FPM_SOCK" ]]; then
      printf 'ERROR: PHP_FPM_SOCK does not exist or is not a socket: %s\n' "$PHP_FPM_SOCK" >&2
      exit 1
    fi
    return
  fi

  local cli_ver cli_sock
  cli_ver="$(php -r 'echo PHP_MAJOR_VERSION.".".PHP_MINOR_VERSION;')"
  cli_sock="/run/php/php${cli_ver}-fpm.sock"
  if [[ -S "$cli_sock" ]]; then
    PHP_FPM_SOCK="$cli_sock"
    return
  fi

  local sock selected=""
  while IFS= read -r sock; do
    if [[ "$(basename "$sock")" =~ ^php([0-9]+)\.([0-9]+)-fpm\.sock$ ]]; then
      local major minor
      major="${BASH_REMATCH[1]}"
      minor="${BASH_REMATCH[2]}"
      if (( major > 8 || (major == 8 && minor >= 1) )); then
        selected="$sock"
        break
      fi
    fi
  done < <(ls -1 /run/php/php*-fpm.sock 2>/dev/null | sort -Vr)

  if [[ -z "$selected" ]]; then
    printf 'ERROR: no compatible PHP-FPM socket found (need PHP >= 8.1).\n' >&2
    printf 'Set it manually, e.g. PHP_FPM_SOCK=/run/php/php8.2-fpm.sock\n' >&2
    exit 1
  fi

  PHP_FPM_SOCK="$selected"
}

prepare_laravel_cache_dirs() {
  mkdir -p \
    bootstrap/cache \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/framework/testing \
    storage/logs
  touch storage/logs/laravel.log
}

write_nginx_http_only() {
  local webshell_include=""
  if [[ -f "$WEBSHELL_SNIPPET" ]]; then
    webshell_include="    include ${WEBSHELL_SNIPPET};"
  fi

  sudo tee "$NGINX_CONF_PATH" >/dev/null <<EOF
server {
    listen 80;
    listen [::]:80;
    server_name ${DOMAIN} ${WWW_DOMAIN};

${webshell_include}
    root ${APP_DIR}/public;
    index index.php index.html;

    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location /storage/ {
        alias ${APP_DIR}/storage/app/public/;
        access_log off;
        expires 30d;
        add_header Cache-Control "public, immutable";
    }

    location = /index.php {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:${PHP_FPM_SOCK};
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
    }

    location ~ \.php$ {
        return 404;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    location ~* \.(?:css|js|mjs|jpg|jpeg|png|gif|webp|svg|ico|woff|woff2|ttf|eot|otf|json|xml)$ {
        expires 30d;
        access_log off;
        log_not_found off;
        try_files \$uri =404;
    }
}
EOF
}

write_nginx_https() {
  local webshell_include=""
  local certbot_options_include=""
  local certbot_dhparam_line=""

  if [[ -f "$WEBSHELL_SNIPPET" ]]; then
    webshell_include="    include ${WEBSHELL_SNIPPET};"
  fi

  if [[ -f "$CERTBOT_SSL_OPTIONS" ]]; then
    certbot_options_include="    include ${CERTBOT_SSL_OPTIONS};"
  fi

  if [[ -f "$CERTBOT_SSL_DHPARAM" ]]; then
    certbot_dhparam_line="    ssl_dhparam ${CERTBOT_SSL_DHPARAM};"
  fi

  sudo tee "$NGINX_CONF_PATH" >/dev/null <<EOF
server {
    listen 80;
    listen [::]:80;
    server_name ${DOMAIN} ${WWW_DOMAIN};
    return 301 https://\$host\$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name ${DOMAIN} ${WWW_DOMAIN};

${webshell_include}
    root ${APP_DIR}/public;
    index index.php index.html;

    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location /storage/ {
        alias ${APP_DIR}/storage/app/public/;
        access_log off;
        expires 30d;
        add_header Cache-Control "public, immutable";
    }

    location = /index.php {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:${PHP_FPM_SOCK};
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
    }

    location ~ \.php$ {
        return 404;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    location ~* \.(?:css|js|mjs|jpg|jpeg|png|gif|webp|svg|ico|woff|woff2|ttf|eot|otf|json|xml)$ {
        expires 30d;
        access_log off;
        log_not_found off;
        try_files \$uri =404;
    }

    ssl_certificate ${CERT_FULLCHAIN};
    ssl_certificate_key ${CERT_PRIVKEY};
${certbot_options_include}
${certbot_dhparam_line}
}
EOF
}

main() {
  require_cmd git
  require_cmd php
  require_cmd composer
  require_cmd npm
  require_cmd sudo
  require_cmd nginx

  local branch
  branch="$(default_branch)"
  if [[ -z "$branch" ]]; then
    branch="main"
  fi

  detect_php_fpm_sock

  log "Domain: ${DOMAIN}"
  log "Repo: ${REPO_URL} (branch ${branch})"
  log "App dir: ${APP_DIR}"
  log "PHP-FPM socket: ${PHP_FPM_SOCK}"

  sudo mkdir -p "$BASE_DIR"
  sudo chown -R "$(id -un):$(id -gn)" "$BASE_DIR"

  if [[ -d "${APP_DIR}/.git" ]]; then
    log "Repository exists, pulling latest changes..."
    git -C "$APP_DIR" fetch --all --prune
    git -C "$APP_DIR" checkout "$branch"
    git -C "$APP_DIR" pull --ff-only origin "$branch"
  elif [[ -d "$APP_DIR" ]] && [[ -n "$(ls -A "$APP_DIR" 2>/dev/null || true)" ]]; then
    printf 'ERROR: %s exists and is not empty.\n' "$APP_DIR" >&2
    printf 'Move/remove it, then rerun this script.\n' >&2
    exit 1
  else
    log "Cloning repository..."
    git clone --branch "$branch" "$REPO_URL" "$APP_DIR"
  fi

  cd "$APP_DIR"

  if [[ ! -f .env ]]; then
    log "Creating .env from .env.example"
    cp .env.example .env
  fi

  log "Preparing Laravel cache directories..."
  prepare_laravel_cache_dirs

  log "Installing PHP dependencies..."
  composer install --no-dev --optimize-autoloader --no-interaction

  log "Installing Node dependencies..."
  npm ci

  log "Building front assets..."
  npm run build

  if ! grep -q '^APP_KEY=base64:' .env; then
    log "Generating Laravel APP_KEY..."
    php artisan key:generate --force
  fi

  if [[ ! -L public/storage ]]; then
    log "Creating storage symlink..."
    php artisan storage:link || true
  fi

  if [[ "$RUN_MIGRATIONS" == "1" ]]; then
    log "Running database migrations..."
    php artisan migrate --force
  else
    log "Skipping migrations (set RUN_MIGRATIONS=1 to enable)."
  fi

  log "Optimizing Laravel..."
  php artisan optimize

  log "Fixing runtime permissions..."
  sudo chown -R www-data:www-data storage bootstrap/cache
  sudo find storage bootstrap/cache -type d -exec chmod 775 {} \;
  sudo find storage bootstrap/cache -type f -exec chmod 664 {} \;

  if [[ -f "$CERT_FULLCHAIN" && -f "$CERT_PRIVKEY" ]]; then
    log "SSL certs found, writing HTTPS nginx config."
    write_nginx_https
  else
    log "SSL certs not found, writing HTTP-only nginx config."
    write_nginx_http_only
    log "After certbot, rerun this script to switch to HTTPS config."
  fi

  log "Enabling nginx site..."
  sudo ln -sfn "$NGINX_CONF_PATH" "$NGINX_ENABLED_PATH"

  log "Testing nginx config..."
  sudo nginx -t

  log "Reloading nginx..."
  sudo systemctl reload nginx

  log "Deployment finished successfully."
  log "Open: https://${DOMAIN}"
}

main "$@"
