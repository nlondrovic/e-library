<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckoutEndReasonSeeder extends Seeder
{
    public function run()
    {
        DB::table('checkout_end_reasons')->insert([
            ['value' => 'Book checked in'],
            ['value' => 'Book lost']
        ]);
    }
}
