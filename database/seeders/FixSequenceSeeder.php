<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixSequenceSeeder extends Seeder
{
    public function run(): void
    {
        // ONLY run this for PostgreSQL
        if (DB::getDriverName() !== 'pgsql') {
            return;
        }

        DB::statement("
            SELECT setval(
                pg_get_serial_sequence('counties', 'id'),
                (SELECT COALESCE(MAX(id), 1) FROM counties)
            );
        ");

        DB::statement("
            SELECT setval(
                pg_get_serial_sequence('towns', 'id'),
                (SELECT COALESCE(MAX(id), 1) FROM towns)
            );
        ");

        DB::statement("
            SELECT setval(
                pg_get_serial_sequence('populations', 'id'),
                (SELECT COALESCE(MAX(id), 1) FROM populations)
            );
        ");
    }
}
