<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TownSeeder extends Seeder
{
    public function run(): void
    {
        $path = base_path('data/towns.txt');

        if (!file_exists($path)) {
            throw new \RuntimeException("Missing file: $path");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $index => $line) {
            // Skip header
            if ($index === 0 || str_starts_with($line, 'id')) {
                continue;
            }

            $data = explode("\t", trim($line));

            DB::table('towns')->insert([
                'id' => (int)$data[0],
                'tname' => $data[1],
                'countyid' => (int)$data[2],
                'countyseat' => ((int)$data[3] === -1),
                'countylevel' => ((int)$data[4] === -1),
            ]);
        }
    }
}
