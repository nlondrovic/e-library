<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    public function run()
    {
        DB::table('publishers')->insert([
            ['name' => 'Vijesti, Podgorica'],
            ['name' => 'Knjiga - Komerc Beograd'],
            ['name' => 'Izdavačno preduzeće Rad, Beograd'],
            ['name' => 'Prosveta, Beograd'],
            ['name' => 'Zavod za udžbenike i nastavna sredstva, Podgorica'],
            ['name' => 'Svjetlost, Sarajevo'],
            ['name' => 'Daily press D.O.O.'],
            ['name' => 'Knjiga Komerc'],
            ['name' => 'Zavod za udzbenike i nastavna sredstva - Beograd'],
            ['name' => 'Centralna narodna bliboteka Crne Gore - Biblioteka Vijenci'],
            ['name' => 'Gutenbergova galaksija'],

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
