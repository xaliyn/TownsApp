<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopulationSeeder extends Seeder
{
    public function run(): void
    {
        $path = base_path('data/populations.txt');

        if (!file_exists($path)) {
            throw new \RuntimeException("Missing file: $path");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $index => $line) {
            // Skip header
            if ($index === 0 || str_starts_with($line, 'townid')) {
                continue;
            }

            $data = explode("\t", trim($line));

            DB::table('populations')->insert([
                'townid' => (int)$data[0],
                'ryear'  => (int)$data[1],
                'women'  => (int)$data[2],
                'total'  => (int)$data[3],
            ]);
        }
    }
}
