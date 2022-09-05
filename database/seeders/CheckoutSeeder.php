<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckoutSeeder extends Seeder
{
    public function run()
    {
        // Active checkouts
        DB::table('checkouts')->insert([
            [
                'book_id' => rand(1, 29),
                'checkout_librarian_id' => rand(2, 5),
                'student_id' => rand(6, 20),
                'start_time' => Carbon::now()->subDays(6)->toDateTimeString()
            ],
            [
                'book_id' => rand(1, 29),
                'checkout_librarian_id' => rand(2, 5),
                'student_id' => rand(6, 20),
                'start_time' => Carbon::now()->subDays(23)->toDateTimeString()
            ]
        ]);

        // Ended checkouts
        DB::table('checkouts')->insert([
            [
                'book_id' => rand(1, 29),
                'checkout_librarian_id' => rand(2, 5),
                'student_id' => rand(6, 20),
                'start_time' => Carbon::now()->subDays(33)->toDateTimeString(),
                'end_time' => Carbon::now()->subDays(5)->toDateTimeString(),
                'checkin_librarian_id' => rand(2, 5),
                'checkout_end_reason_id' => 1
            ],
            [
                'book_id' => rand(1, 29),
                'checkout_librarian_id' => rand(2, 5),
                'student_id' => rand(6, 20),
                'start_time' => Carbon::now()->subDays(18)->toDateTimeString(),
                'end_time' => Carbon::now()->subDays(3)->toDateTimeString(),
                'checkin_librarian_id' => rand(2, 5),
                'checkout_end_reason_id' => 1
            ]
        ]);

        // Written off books
        DB::table('checkouts')->insert([
            [
                'book_id' => rand(1, 29),
                'checkout_librarian_id' => rand(2, 5),
                'student_id' => rand(6, 20),
                'start_time' => Carbon::now()->subDays(21)->toDateTimeString(),
                'end_time' => Carbon::now()->subDays(6)->toDateTimeString(),
                'checkin_librarian_id' => rand(2, 5),
                'checkout_end_reason_id' => 2
            ],
            [
                'book_id' => rand(1, 29),
                'checkout_librarian_id' => rand(2, 5),
                'student_id' => rand(6, 20),
                'start_time' => Carbon::now()->subDays(16)->toDateTimeString(),
                'end_time' => Carbon::now()->subDays(2)->toDateTimeString(),
                'checkin_librarian_id' => rand(2, 5),
                'checkout_end_reason_id' => 2
            ]
        ]);
    }
}
