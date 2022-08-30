<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'isbn' => '0747532699123',
                'content' => 'Harry Potter and the Philosopher\'s Stone is a fantasy novel written by British author J. K. Rowling. The first novel in the Harry Potter series and Rowling\'s debut novel, it follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday, when he receives a letter of acceptance to Hogwarts School of Witchcraft and Wizardry. Harry makes close friends and a few enemies during his first year at the school and with the help of his friends, he faces an attempted comeback by the dark wizard Lord Voldemort, who killed Harry\'s parents, but failed to kill Harry when he was just 15 months old.',
                'author_id' => 1,
                'picture' => 'https://upload.wikimedia.org/wikipedia/en/6/6b/Harry_Potter_and_the_Philosopher%27s_Stone_Book_Cover.jpg',
                'page_count' => 352,
                'size_id' => 4,
                'script_id' => 1,
                'binding_id' => 3,
                'publisher_id' => 1,
                'publish_date' => "2014-09-01",
                'total_count' => 10,
                'category_id' => 10,
                'genre_id' => 1,
                'checkouts_count' => 1,
                'reserved_count' => 1
            ],
            [
                'title' => 'Harry Potter and the Chamber of Secrets',
                'isbn' => '0747538492123',
                'content' => 'Harry Potter and the Chamber of Secrets is a fantasy novel written by British author J. K. Rowling and the second novel in the Harry Potter series. The plot follows Harry\'s second year at Hogwarts School of Witchcraft and Wizardry, during which a series of messages on the walls of the school\'s corridors warn that the "Chamber of Secrets" has been opened and that the "heir of Slytherin" would kill all pupils who do not come from all-magical families. These threats are found after attacks that leave residents of the school petrified. Throughout the year, Harry and his friends Ron and Hermione investigate the attacks.',
                'author_id' => 1,
                'picture' => 'https://upload.wikimedia.org/wikipedia/en/5/5c/Harry_Potter_and_the_Chamber_of_Secrets.jpg',
                'page_count' => 384,
                'size_id' => 4,
                'script_id' => 1,
                'binding_id' => 3,
                'publisher_id' => 2,
                'publish_date' => "2014-09-11",
                'total_count' => 10,
                'category_id' => 10,
                'genre_id' => 1,
                'checkouts_count' => 1,
                'reserved_count' => 1
            ],
            [
                'title' => 'Harry Potter and the Prisoner of Azkaban',
                'isbn' => '0747542155123',
                'content' => 'Harry Potter and the Prisoner of Azkaban is a fantasy novel written by British author J. K. Rowling and is the third in the Harry Potter series. The book follows Harry Potter, a young wizard, in his third year at Hogwarts School of Witchcraft and Wizardry. Along with friends Ronald Weasley and Hermione Granger, Harry investigates Sirius Black, an escaped prisoner from Azkaban, the wizard prison, believed to be one of Lord Voldemort\'s old allies.',
                'author_id' => 1,
                'picture' => 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a0/Harry_Potter_and_the_Prisoner_of_Azkaban.jpg/220px-Harry_Potter_and_the_Prisoner_of_Azkaban.jpg',
                'page_count' => 480,
                'size_id' => 4,
                'script_id' => 1,
                'binding_id' => 4,
                'publisher_id' => 3,
                'publish_date' => "2014-09-27",
                'total_count' => 10,
                'category_id' => 10,
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0
            ],
            [
                'title' => 'The Bridge on the Drina',
                'isbn' => '9789004241916',
                'content' => 'The Bridge on the Drina is a historical novel by the Yugoslav writer Ivo Andrić. It revolves around the Mehmed Paša Sokolović Bridge in Višegrad, which spans the Drina River and stands as a silent witness to history from its construction by the Ottomans in the mid-16th century until its partial destruction during World War I. The story spans about four centuries and covers the Ottoman and Austro-Hungarian occupations of the region, with a particular emphasis on the lives, destinies and relations of the local inhabitants, especially Serbs and Bosnian Muslims.',
                'author_id' => 2,
                'picture' => 'https://upload.wikimedia.org/wikipedia/en/5/55/The_Bridge_on_the_Drina.jpg',
                'page_count' => 464,
                'size_id' => 4,
                'script_id' => 5,
                'binding_id' => 2,
                'publisher_id' => 8,
                'publish_date' => "1983-02-07",
                'total_count' => 10,
                'category_id' => 8,
                'genre_id' => 24,
                'checkouts_count' => 0,
                'reserved_count' => 0
            ],
            [
                'title' => 'The Mountain Wreath',
                'isbn' => '9789637326608',
                'content' => 'The Mountain Wreath is a poem and a play written by Prince-Bishop and poet Petar II Petrović-Njegoš. Njegoš wrote The Mountain Wreath during 1846 in Cetinje and published it the following year after the printing in an Armenian monastery in Vienna. It is a modern epic written in verse as a play, thus combining three of the major modes of literary expression. It is considered a masterpiece of Serbian and Montenegrin literature.',
                'author_id' => 3,
                'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Gorski_Vijenac.jpg/220px-Gorski_Vijenac.jpg',
                'page_count' => 132,
                'size_id' => 4,
                'script_id' => 5,
                'binding_id' => 5,
                'publisher_id' => 7,
                'publish_date' => "1964-10-09",
                'total_count' => 10,
                'category_id' => 8,
                'genre_id' => 24,
                'checkouts_count' => 0,
                'reserved_count' => 0
            ]
        ]);
    }
}
