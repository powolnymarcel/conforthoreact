<?php

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Command\Command;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('contacts:backup-and-truncate {--force : Skip confirmation prompt}', function () {
    $contacts = Contact::query()
        ->orderBy('id')
        ->get([
            'id',
            'name',
            'email',
            'subject',
            'phone',
            'message',
            'created_at',
            'updated_at',
        ]);

    $total = $contacts->count();
    $timestamp = now()->format('Ymd_His');
    $backupDirectory = 'backups/contacts';
    $backupPath = "{$backupDirectory}/contacts_{$timestamp}.json";

    $payload = [
        'generated_at' => now()->toIso8601String(),
        'total' => $total,
        'contacts' => $contacts->toArray(),
    ];

    Storage::disk('local')->makeDirectory($backupDirectory);

    $written = Storage::disk('local')->put(
        $backupPath,
        json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
    );

    if (!$written) {
        $this->error('Backup failed: unable to write backup file.');
        return Command::FAILURE;
    }

    if (!$this->option('force')) {
        $confirmed = $this->confirm(
            "Backup created ({$total} messages). Continue and TRUNCATE contacts table?",
            false
        );

        if (!$confirmed) {
            $this->warn('Operation cancelled. Backup has been kept.');
            $this->line('Backup file: ' . storage_path('app/' . $backupPath));
            return Command::SUCCESS;
        }
    }

    Schema::disableForeignKeyConstraints();
    try {
        DB::table('contacts')->truncate();
    } finally {
        Schema::enableForeignKeyConstraints();
    }

    $this->info("Done. {$total} message(s) backed up and contacts table truncated.");
    $this->line('Backup file: ' . storage_path('app/' . $backupPath));

    return Command::SUCCESS;
})->purpose('Backup all contact messages and truncate contacts table');
