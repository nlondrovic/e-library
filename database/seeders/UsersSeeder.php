<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Nikola Londrović',
                'email' => 'nikolalondrovic41@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role_id' => 1,
                'JMBG' => 1111111111111,
                'picture' => 'https://ca.slack-edge.com/T01ALTYJSTE-U033HJXL8HM-5bb1c906a7f6-512'
            ],
            [
                'name' => 'Nikola Kapor',
                'email' => 'nikola1kapor@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role_id' => 1,
                'JMBG' => '1111111111111',
                'picture' => 'https://ca.slack-edge.com/T01ALTYJSTE-U033Y7P17LK-22e4569d0941-512'
            ],
            [
                'name' => 'Boris Vojinović',
                'email' => 'boris.vojinovic008@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role_id' => 1,
                'JMBG' => '1111111111111',
                'picture' => 'https://ca.slack-edge.com/T01ALTYJSTE-U033HK6EJ07-f1618f25bdd6-512'
            ],
            [
                'name' => 'Kristijan Vuković',
                'email' => 'kikovuk9@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role_id' => 3,
                'JMBG' => '1111111111111',
                'picture' => 'https://ca.slack-edge.com/T01ALTYJSTE-U033RHEGVN2-7f2cded96618-512'
            ]
        ];

        DB::table('users')->insert($users);
        User::factory(4)->create();
    }
}
