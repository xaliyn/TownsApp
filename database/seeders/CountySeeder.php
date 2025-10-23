<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountySeeder extends Seeder
{
    public function run(): void
    {
        $path = base_path('data/counties.txt');

        if (!file_exists($path)) {
            throw new \RuntimeException("Missing file: $path");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $index => $line) {
            // Skip header line
            if ($index === 0 || str_starts_with($line, 'id')) {
                continue;
            }

            $data = explode("\t", trim($line));

            DB::table('counties')->insert([
                'id' => (int)$data[0],
                'cname' => $data[1],
            ]);
        }
    }
}

