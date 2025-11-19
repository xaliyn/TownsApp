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
        $this->call([
            CountySeeder::class,
            TownSeeder::class,
            PopulationSeeder::class,
            FixSequenceSeeder::class, // must be LAST
        ]);

        
        if (DB::getDriverName() !== 'pgsql') {
            DB::statement("ALTER TABLE counties AUTO_INCREMENT = " . ((int) DB::table('counties')->max('id') + 1));
            DB::statement("ALTER TABLE towns    AUTO_INCREMENT = " . ((int) DB::table('towns')->max('id') + 1));
        }
    }
}
