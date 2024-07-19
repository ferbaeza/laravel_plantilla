<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\TestingSeeder;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\TruncateAllTablesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('Comienza a ejecutarse el DatabaseSeeder:');
        DB::beginTransaction();

        Schema::disableForeignKeyConstraints();

        $this->call([
            TruncateAllTablesSeeder::class,
            TestingSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
        DB::commit();
    }
}
