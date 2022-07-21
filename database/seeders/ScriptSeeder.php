<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScriptSeeder extends Seeder
{
    public function run()
    {
        DB::table('scripts')->insert([
            ['name' => 'Latin'],
            ['name' => 'Chinese'],
            ['name' => 'Arabic'],
            ['name' => 'Bengali-Assamese'],
            ['name' => 'Cyrillic'],
            ['name' => 'Malayalam'],
            ['name' => 'Thai'],
            ['name' => 'Lao'],
            ['name' => 'Hebrew'],
            ['name' => 'Armenian'],
            ['name' => 'Greek'],
            ['name' => 'Tibetan'],
            ['name' => 'Georgian'],
            ['name' => 'Mongolian'],
        ]);
    }
}
