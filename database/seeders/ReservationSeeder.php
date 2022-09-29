<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        // Active checkouts
        DB::table('reservations')->insert([
            [
                'book_id' => rand(1, 29),
                'librarian_id' => rand(2, 5),
                'student_id' => rand(6, 20),
                'start_time' => Carbon::now()->subDays(6)->toDateTimeString()
            ],
            [
                'book_id' => 2,
                'librarian_id' => 2,
                'student_id' => 7,
                'start_time' => Carbon::now()->subDays(16)->toDateTimeString()
            ]
        ]);

        // Archived checkouts
        DB::table('reservations')->insert([
            [
                'book_id' => rand(1, 29),
                'librarian_id' => rand(2, 5),
                'student_id' => rand(6, 20),
                'start_time' => Carbon::now()->subDays(10)->toDateTimeString(),
                'end_time' => Carbon::now()->subDays(3)->toDateTimeString(),
                'reservation_end_reason_id' => 1
            ],
            [
                'book_id' => rand(1, 29),
                'librarian_id' => rand(2, 5),
                'student_id' => rand(6, 20),
                'start_time' => Carbon::now()->subDays(12)->toDateTimeString(),
                'end_time' => Carbon::now()->subDays(6)->toDateTimeString(),
                'reservation_end_reason_id' => 2,
            ],
            [
                'book_id' => rand(1, 29),
                'librarian_id' => rand(2, 5),
                'student_id' => rand(6, 20),
                'start_time' => Carbon::now()->subDays(20)->toDateTimeString(),
                'end_time' => Carbon::now()->subDays(11)->toDateTimeString(),
                'reservation_end_reason_id' => 3
            ]
        ]);
    }
}
