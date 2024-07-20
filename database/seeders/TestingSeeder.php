<?php

namespace Database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\TruncateAllTablesSeeder;
use Src\Auth\Core\Laravel\Eloquent\UserSeeder;

class TestingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->command->info('Comienza a ejecutarse el Testing Seeder:');
        DB::beginTransaction();

        Schema::disableForeignKeyConstraints();

        $this->call([
            TruncateAllTablesSeeder::class,
            UserSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
        DB::commit();
    }
}
