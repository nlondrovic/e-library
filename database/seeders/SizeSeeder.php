<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    public function run()
    {
        DB::table('sizes')->insert([
            ['name' => 'A0'],
            ['name' => 'A1'],
            ['name' => 'A2'],
            ['name' => 'A3'],
            ['name' => 'A4'],
            ['name' => 'A5'],
            ['name' => 'A6'],
            ['name' => 'A7'],
            ['name' => 'A8'],
            ['name' => 'A9'],
            ['name' => 'A10'],
            ['name' => 'B0'],
            ['name' => 'B1'],
            ['name' => 'B2'],
            ['name' => 'B3'],
            ['name' => 'B4'],
            ['name' => 'B5'],
            ['name' => 'B6'],
            ['name' => 'B7'],
            ['name' => 'B8'],
            ['name' => 'B9'],
            ['name' => 'B10'],
            ['name' => 'C1'],
            ['name' => 'C2'],
            ['name' => 'C3'],
            ['name' => 'C4'],
            ['name' => 'C5'],
            ['name' => 'C6'],
            ['name' => 'C7'],
            ['name' => 'C8'],
            ['name' => 'C9'],
            ['name' => 'C10'],
            ['name' => 'D0'],
            ['name' => 'D1'],
            ['name' => 'D2'],
            ['name' => 'D3'],
            ['name' => 'D4'],
            ['name' => 'D5'],
            ['name' => 'D6'],
            ['name' => 'D7'],
            ['name' => 'D8'],
            ['name' => 'D9'],
            ['name' => 'D10'],
        ]);
    }
}
