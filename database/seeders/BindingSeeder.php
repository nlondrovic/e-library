<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BindingSeeder extends Seeder
{
    public function run()
    {
        DB::table('bindings')->insert([
            [ 'name' => 'Meki povez' ],
            [ 'name' => 'Plastična spirala' ],
            [ 'name' => 'Tvrdi povez' ],
            [ 'name' => 'Klamovani' ],
        ]);
    }
}
