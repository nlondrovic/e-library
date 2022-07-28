<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{


    public function run()
    {
        DB::table('reservation_end_reasons')->insert([
            [ 'value' => 'Reservation expired' ],
            [ 'value' => 'Reservation denied' ],
            [ 'value' => 'Reservation cancelled' ],
            [ 'value' => 'Book checked out' ],
        ]);

        $this->call([
            BindingSeeder::class,
            CategorySeeder::class,
            GenreSeeder::class,
            PublisherSeeder::class,
            ScriptSeeder::class,
            SizeSeeder::class,

            AuthorSeeder::class,
            RoleSeeder::class,
            BookSeeder::class,
            UsersSeeder::class,
        ]);
    }
}
