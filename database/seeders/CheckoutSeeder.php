<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckoutSeeder extends Seeder
{
    public function run()
    {
        DB::table('checkouts')->insert([
                [
                    'book_id' => 1,
                    'checkout_librarian_id' => 4,
                    'student_id' => 6,
                    'start_time' => "2022-07-25 18:00:00"
                ],
                [
                    'book_id' => 2,
                    'checkout_librarian_id' => 4,
                    'student_id' => 7,
                    'start_time' => "2022-07-25 18:05:00"
                ],
                [
                    'book_id' => 3,
                    'checkout_librarian_id' => 5,
                    'student_id' => 8,
                    'start_time' => "2022-07-25 18:10:00"
                ],
                [
                    'book_id' => 4,
                    'checkout_librarian_id' => 5,
                    'student_id' => 9,
                    'start_time' => "2022-07-25 18:15:00"
                ]
            ]
        );
    }
}
