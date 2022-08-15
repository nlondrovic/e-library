<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        // Active checkouts
        DB::table('reservations')->insert([
            [
                'book_id' => 1,
                'librarian_id' => 1,
                'student_id' => 6,
                'start_time' => '2022-08-01 13:00:00'
            ],
            [
                'book_id' => 2,
                'librarian_id' => 2,
                'student_id' => 7,
                'start_time' => '2022-07-20 13:00:00'
            ]
        ]);

        // Archived checkouts
        DB::table('reservations')->insert([
            [
                'book_id' => 3,
                'librarian_id' => 3,
                'student_id' => 8,
                'start_time' => '2022-07-18 13:00:00',
                'end_time' => '2022-08-04 13:00:00',
                'reservation_end_reason_id' => 1
            ],
            [
                'book_id' => 4,
                'librarian_id' => 4,
                'student_id' => 8,
                'start_time' => '2022-08-01 13:00:00',
                'end_time' => '2022-08-09 13:00:00',
                'reservation_end_reason_id' => 2,
            ],
            [
                'book_id' => 5,
                'librarian_id' => 5,
                'student_id' => 10,
                'start_time' => '2022-07-31 13:00:00',
                'end_time' => '2022-08-05 13:00:00',
                'reservation_end_reason_id' => 3
            ]
        ]);
    }
}
