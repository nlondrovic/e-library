<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    public function run()
    {
        DB::table('publishers')->insert([
            ['name' => 'Penguin Random House'],
            ['name' => 'Hachette Book Group'],
            ['name' => 'HarperCollins'],
            ['name' => 'Macmillan Publishers'],
            ['name' => 'Simon & Schuster'],
            ['name' => 'Scholastic Corporation'],
            ['name' => 'Pearson Education'],
            ['name' => 'McGraw-Hill Education'],
            ['name' => 'Houghton Mifflin Harcourt'],
            ['name' => 'Cengage Learning']
        ]);
    }
}
