<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixSequenceSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::getDriverName() !== 'pgsql') {
            return; // MySQL does not use sequences
        }

        // --- FIX counties.id ---
        DB::statement("
            DO $$
            BEGIN
                IF NOT EXISTS (
                    SELECT 1 FROM pg_class WHERE relname = 'counties_id_seq'
                ) THEN
                    CREATE SEQUENCE counties_id_seq;
                    ALTER TABLE counties ALTER COLUMN id SET DEFAULT nextval('counties_id_seq');
                END IF;
            END $$;
        ");

        DB::statement("
            SELECT setval(
                'counties_id_seq',
                COALESCE((SELECT MAX(id) FROM counties), 1),
                true
            );
        ");

        // --- FIX towns.id ---
        DB::statement("
            DO $$
            BEGIN
                IF NOT EXISTS (
                    SELECT 1 FROM pg_class WHERE relname = 'towns_id_seq'
                ) THEN
                    CREATE SEQUENCE towns_id_seq;
                    ALTER TABLE towns ALTER COLUMN id SET DEFAULT nextval('towns_id_seq');
                END IF;
            END $$;
        ");

        DB::statement("
            SELECT setval(
                'towns_id_seq',
                COALESCE((SELECT MAX(id) FROM towns), 1),
                true
            );
        ");

        // populations has composite key → NO SEQUENCE NEEDED
    }
}
