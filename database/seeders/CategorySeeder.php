<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [ 'name' => 'Art & Photography' ],
            [ 'name' => 'Biography' ],
            [ 'name' => 'Children\'s Books' ],
            [ 'name' => 'Crafts & Hobbies' ],
            [ 'name' => 'Crime & Thriller' ],
            [ 'name' => 'Food & Drink' ],
            [ 'name' => 'Graphic Novels, Anime & Manga' ],
            [ 'name' => 'History & Archaeology' ],
            [ 'name' => 'Mind, Body & Spirit' ],
            [ 'name' => 'Science Fiction, Fantasy & Horror' ],
        ]);
    }
}
