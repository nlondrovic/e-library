<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BindingSeeder extends Seeder
{
    public function run()
    {
        DB::table('bindings')->insert([
            ['name' => 'Meki povez'],
            ['name' => 'Tvrdi povez'],
            ['name' => 'Plastična spirala'],
            ['name' => 'Klamovani'],
        ]);
    }
}
