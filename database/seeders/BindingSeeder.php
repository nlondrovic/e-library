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
            [ 'name' => 'Wire spiral' ],
            [ 'name' => 'Plastic spiral' ],
            [ 'name' => 'Paperback' ],
            [ 'name' => 'Hard cover' ],
            [ 'name' => 'Saddle stitching' ],
            [ 'name' => 'Case binding' ]
        ]);
    }
}
