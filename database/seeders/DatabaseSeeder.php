<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run your seeders
        $this->call([
            CountySeeder::class,
            TownSeeder::class,
            PopulationSeeder::class,
            FixSequenceSeeder::class,
        ]);

        // Detect which database driver is used
        $driver = DB::getDriverName();

        if ($driver === 'pgsql') {

            // Fix sequences for PRIMARY KEY TABLES ONLY
            DB::statement("
                SELECT setval(
                    pg_get_serial_sequence('counties', 'id'),
                    (SELECT COALESCE(MAX(id), 0) FROM counties)
                );
            ");

            DB::statement("
                SELECT setval(
                    pg_get_serial_sequence('towns', 'id'),
                    (SELECT COALESCE(MAX(id), 0) FROM towns)
                );
            ");

            // populations has NO auto-increment id → do nothing

        } else {
            // MySQL / MariaDB uses AUTO_INCREMENT
            DB::statement("ALTER TABLE counties AUTO_INCREMENT = " . ((int) DB::table('counties')->max('id') + 1));
            DB::statement("ALTER TABLE towns    AUTO_INCREMENT = " . ((int) DB::table('towns')->max('id') + 1));
            // populations has NO id → no AUTO_INCREMENT
        }
    }
}
