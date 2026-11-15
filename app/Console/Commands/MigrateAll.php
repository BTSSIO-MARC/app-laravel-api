<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

#[Signature('migrate:all {--seed}')]
#[Description('Réinitialise et reconstruit TOUTES les bases de données (SQLite + MariaDB/MySQL)')]
class MigrateAll extends Command
{
    public function handle(): int
    {
        $this->info('...Nettoyage de la base de données par défaut (SQLite)...');
        Artisan::call('db:wipe', [], $this->output);

        $this->info('...Nettoyage de la base de données MariaDB/MySQL...');
        Artisan::call('db:wipe', ['--database' => 'mariadb'], $this->output);

        $this->info('...Exécution de toutes les migrations...');
        $options = [];
        if ($this->option('seed')) {
            $options['--seed'] = true;
        }

        Artisan::call('migrate', $options, $this->output);

        $this->info('Toutes les bases de données ont été réinitialisées avec succès !');
        return Command::SUCCESS;
    }
}
