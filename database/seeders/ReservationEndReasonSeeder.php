<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationEndReasonSeeder extends Seeder
{
    public function run()
    {
        DB::table('reservation_end_reasons')->insert([
            ['value' => 'Reservation expired'],
            ['value' => 'Reservation canceled'],
            ['value' => 'Book checked out'],
        ]);
    }
}
