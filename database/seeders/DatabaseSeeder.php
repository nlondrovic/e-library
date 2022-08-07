<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BindingSeeder::class,
            CategorySeeder::class,
            GenreSeeder::class,
            PublisherSeeder::class,
            ScriptSeeder::class,
            SizeSeeder::class,
            ReservationEndReasonSeeder::class,
            CheckoutEndReasonSeeder::class,

            AuthorSeeder::class,
            RoleSeeder::class,
            BookSeeder::class,
            UserSeeder::class

        ]);
    }
}
