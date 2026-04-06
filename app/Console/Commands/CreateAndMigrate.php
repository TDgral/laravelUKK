<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class CreateAndMigrate extends Command
{
    protected $signature = 'db:create-migrate {--database=perpustakaan}';

    protected $description = 'Create DB if not exists and run migrate:fresh';

    public function handle()
    {
        try {
            $dbName = $this->option('database');

            config(['database.connections.mysql.database' => '']);
            DB::purge('mysql');
            DB::reconnect('mysql');

            DB::statement("CREATE DATABASE IF NOT EXISTS `{$dbName}`");
            $this->info("Database '{$dbName}' created!");

            config(['database.connections.mysql.database' => $dbName]);
            DB::purge('mysql');
            DB::reconnect('mysql');

            Artisan::call('migrate:fresh');
            $this->info('Migrations completed');
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}
