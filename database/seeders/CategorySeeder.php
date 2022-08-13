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
            ['name' => 'Art & Photography', 'icon' => 'fas fa-palette'],
            ['name' => 'Biography', 'icon' => 'fas fa-address-book'],
            ['name' => 'Children\'s Books', 'icon' => 'fas fa-children'],
            ['name' => 'Crafts & Hobbies', 'icon' => 'fas fa-screwdriver-wrench'],
            ['name' => 'Crime & Thriller', 'icon' => 'fas fa-gun'],
            ['name' => 'Food & Drink', 'icon' => 'fas fa-burger'],
            ['name' => 'Graphic Novels, Anime & Manga', 'icon' => 'fas fa-tv'],
            ['name' => 'History & Archaeology', 'icon' => 'fas fa-calendar-day'],
            ['name' => 'Mind, Body & Spirit', 'icon' => 'fas fa-brain'],
            ['name' => 'Science Fiction, Fantasy & Horror', 'icon' => 'fas fa-rocket']
        ]);
    }
}
