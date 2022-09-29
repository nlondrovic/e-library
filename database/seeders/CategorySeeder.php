<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Umjetnost i fotografija', 'icon' => 'fas fa-palette'],
            ['name' => 'Biogrfija', 'icon' => 'fas fa-address-book'],
            ['name' => 'Dječije knjige', 'icon' => 'fas fa-children'],
            ['name' => 'Zanat i hobiji', 'icon' => 'fas fa-screwdriver-wrench'],
            ['name' => 'Krimi i triler', 'icon' => 'fas fa-gun'],
            ['name' => 'Hrana i piće', 'icon' => 'fas fa-burger'],
            ['name' => 'Grafički romani, Anime & Mange', 'icon' => 'fas fa-tv'],
            ['name' => 'Istorija i arheologija', 'icon' => 'fas fa-calendar-day'],
            ['name' => 'Um, tijelo i duh', 'icon' => 'fas fa-brain'],
            ['name' => 'Naučna fantastika, fikcija i horor', 'icon' => 'fas fa-rocket']
        ]);
    }
}
