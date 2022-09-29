<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run()
    {
        DB::table('genres')->insert([
            ['name' => 'Akcija i avantura'],
            ['name' => 'Umjetnost/arhitektura'],
            ['name' => 'Alternativna istorija'],
            ['name' => 'Autobiografija'],
            ['name' => 'Antologija'],
            ['name' => 'Biografija'],
            ['name' => 'Ženska književnost'],
            ['name' => 'Biznis/ekonomija'],
            ['name' => 'Dječija literatura'],
            ['name' => 'Zanat i hobiji'],
            ['name' => 'Klasična književnost'],
            ['name' => 'Kuvar'],
            ['name' => 'Stripovi'],
            ['name' => 'Dnevnik'],
            ['name' => 'Odrastanje'],
            ['name' => 'Rečnik'],
            ['name' => 'Krimi'],
            ['name' => 'Enciklopedije'],
            ['name' => 'Drama'],
            ['name' => 'Vodiči'],
            ['name' => 'Bajke'],
            ['name' => 'Zdravlje/fitnes'],
            ['name' => 'Fikcija'],
            ['name' => 'Istorija'],
            ['name' => 'Grafički romani'],
            ['name' => 'Kuća i bašta'],
            ['name' => 'Istorijska fikcija'],
            ['name' => 'Komedija'],
            ['name' => 'Horor'],
            ['name' => 'Novine'],
            ['name' => 'Misterija'],
            ['name' => 'Matematika'],
            ['name' => 'Paranormalna romansa'],
            ['name' => 'Memoari'],
            ['name' => 'Slikovnica'],
            ['name' => 'Filozofija'],
            ['name' => 'Poezija'],
            ['name' => 'Molitvenik'],
            ['name' => 'Politički triler'],
            ['name' => 'Religija, duhovnost, i novo doba'],
            ['name' => 'Romansa'],
            ['name' => 'Udžbenik'],
            ['name' => 'Satira'],
            ['name' => 'Istinski zločin'],
            ['name' => 'Naučna fantastika'],
            ['name' => 'Časopis'],
            ['name' => 'Kratke priče'],
            ['name' => 'Nauka'],
            ['name' => 'Neizvjesnost'],
            ['name' => 'Triler'],
            ['name' => 'Sport i razonoda'],
            ['name' => 'Špageti vestern'],
            ['name' => 'Putovanje'],
            ['name' => 'Omladina'],
        ]);
    }
}
