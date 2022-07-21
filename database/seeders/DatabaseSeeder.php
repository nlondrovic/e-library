<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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

            AuthorSeeder::class,
            RoleSeeder::class,
            BookSeeder::class,
            UsersSeeder::class,
        ]);
    }
}
