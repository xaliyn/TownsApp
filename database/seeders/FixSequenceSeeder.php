<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixSequenceSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::getDriverName() !== 'pgsql') {
            return;
        }

        // --- FIND THE REAL SEQUENCE NAME FOR counties.id ---
        $countySeq = DB::table('pg_class')
            ->join('pg_namespace', 'pg_namespace.oid', '=', 'pg_class.relnamespace')
            ->where('relkind', 'S')
            ->where('relname', 'LIKE', 'counties_id_seq%')
            ->value('relname') ?? 'counties_id_seq';

        // force column to use sequence
        DB::statement("ALTER TABLE counties ALTER COLUMN id SET DEFAULT nextval('$countySeq');");

        // sync the sequence
        DB::statement("SELECT setval('$countySeq', COALESCE((SELECT MAX(id) FROM counties), 1), true);");


        // --- FIND THE REAL SEQUENCE NAME FOR towns.id ---
        $townSeq = DB::table('pg_class')
            ->join('pg_namespace', 'pg_namespace.oid', '=', 'pg_class.relnamespace')
            ->where('relkind', 'S')
            ->where('relname', 'LIKE', 'towns_id_seq%')
            ->value('relname') ?? 'towns_id_seq';

        DB::statement("ALTER TABLE towns ALTER COLUMN id SET DEFAULT nextval('$townSeq');");

        DB::statement("SELECT setval('$townSeq', COALESCE((SELECT MAX(id) FROM towns), 1), true);");
    }
}
