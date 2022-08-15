<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckoutSeeder extends Seeder
{
    public function run()
    {
        // Active checkouts
        DB::table('checkouts')->insert([
            [
                'book_id' => 1,
                'checkout_librarian_id' => 1,
                'student_id' => 6,
                'start_time' => '2022-08-01 13:00:00'
            ],
            [
                'book_id' => 2,
                'checkout_librarian_id' => 2,
                'student_id' => 7,
                'start_time' => '2022-07-20 13:00:00'
            ]

        ]);

        // Ended checkouts
        DB::table('checkouts')->insert([
            [
                'book_id' => 3,
                'checkout_librarian_id' => 3,
                'student_id' => 8,
                'start_time' => '2022-07-15 13:00:00',
                'end_time' => '2022-08-02 13:00:00',
                'checkin_librarian_id' => 2,
                'checkout_end_reason_id' => 1
            ],
            [
                'book_id' => 4,
                'checkout_librarian_id' => 4,
                'student_id' => 9,
                'start_time' => '2022-08-02 13:00:00',
                'end_time' => '2022-08-15 13:00:00',
                'checkin_librarian_id' => 1,
                'checkout_end_reason_id' => 1
            ]
        ]);

        // Written off books
        DB::table('checkouts')->insert([
            [
                'book_id' => 4,
                'checkout_librarian_id' => 5,
                'student_id' => 10,
                'start_time' => '2022-07-25 13:00:00',
                'end_time' => '2022-07-07 13:00:00',
                'checkin_librarian_id' => 2,
                'checkout_end_reason_id' => 2
            ],
            [
                'book_id' => 5,
                'checkout_librarian_id' => 4,
                'student_id' => 11,
                'start_time' => '2022-08-03 13:00:00',
                'end_time' => '2022-08-06 13:00:00',
                'checkin_librarian_id' => 3,
                'checkout_end_reason_id' => 2
            ]
        ]);
    }
}
