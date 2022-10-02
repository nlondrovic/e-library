<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AuthorSeeder::class,
            BindingSeeder::class,
            CategorySeeder::class,
            GenreSeeder::class,
            PublisherSeeder::class,
            ScriptSeeder::class,
            SizeSeeder::class,
            SettingSeeder::class,
            ReservationEndReasonSeeder::class,
            CheckoutEndReasonSeeder::class,
            RoleSeeder::class,

            BookSeeder::class,
            UserSeeder::class,
            CheckoutSeeder::class,
            ReservationSeeder::class,
            ReservationRequestSeeder::class
        ]);
    }
}
