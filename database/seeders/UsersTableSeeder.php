<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $users = [
            [
                'name' => 'Nikola Londrović',
                'email' => 'nikolalondrovic41@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ]
        ];

        DB::table('users')->insert($users);
    }
}
