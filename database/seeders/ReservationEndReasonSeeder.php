<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationEndReasonSeeder extends Seeder
{
    public function run()
    {
        DB::table('reservation_end_reasons')->insert([
            [ 'value' => 'Reservation expired' ],
            [ 'value' => 'Reservation cancelled' ],
            [ 'value' => 'Book checked out' ],
        ]);
    }
}
