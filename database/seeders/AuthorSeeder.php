<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run()
    {

        DB::table('authors')->insert([
            [
                'name' => 'J. K. Rowling',
                'about' => 'Joanne Rowling (born 31 July 1965), also known by her pen name J. K. Rowling, is a British author and philanthropist. She wrote a seven-volume children\'s fantasy series, Harry Potter, published from 1997 to 2007. The series has sold over 500 million copies, been translated into at least 70 languages, and spawned a global media franchise including films and video games. The Casual Vacancy (2012) was her first novel for adults. She writes Cormoran Strike, an ongoing crime fiction series, as Robert Galbraith.',
                'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/J._K._Rowling_2010.jpg/220px-J._K._Rowling_2010.jpg'
            ],
            [
                'name' => 'Ivo Andrić',
                'about' => 'Ivo Andrić (9 October 1892 – 13 March 1975) was a Yugoslav novelist, poet and short story writer who won the Nobel Prize in Literature in 1961. His writings dealt mainly with life in his native Bosnia under Ottoman rule.',
                'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/S._Kragujevic%2C_Ivo_Andric%2C_1961.jpg/220px-S._Kragujevic%2C_Ivo_Andric%2C_1961.jpg'
             ],
            [
                'name' => 'Petar II Petrović-Njegoš',
                'about' => 'Petar II Petrović-Njegoš (13 November 1813 – 31 October 1851), commonly referred to simply as Njegoš, was a Prince-Bishop of Montenegro, poet and philosopher whose works are widely considered some of the most important in Montenegrin and Serbian literature.',
                'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Petar_II_Petrovic-Njegos.jpg/220px-Petar_II_Petrovic-Njegos.jpg'
            ]
        ]);
    }
}
