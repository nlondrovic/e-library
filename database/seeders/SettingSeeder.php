<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            ['variable' => 'Holding time' ,'value' => 20 ],
            ['variable' => 'Reservation time' ,'value' => 20 ],
            ['variable' => 'Overdue time' ,'value' => 5 ],
        ]);
    }
}
