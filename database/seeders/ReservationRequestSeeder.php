<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationRequestSeeder extends Seeder
{
    public function run()
    {
        DB::table('reservation_requests')->insert([
            [
                'student_id' => 6,
                'book_id' => 2,
                'start_time' => now()
            ],
            [
                'student_id' => 7,
                'book_id' => 5,
                'start_time' => now()
            ],
            [
                'student_id' => 8,
                'book_id' => 7,
                'start_time' => now()
            ],
            [
                'student_id' => 9,
                'book_id' => 12,
                'start_time' => now()
            ],
            [
                'student_id' => 10,
                'book_id' => 19,
                'start_time' => now()
            ],
            [
                'student_id' => 11,
                'book_id' => 23,
                'start_time' => now()
            ],
        ]);
    }
}
