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
                'title' => 'Hari Poter i Kamen mudrosti',
                'isbn' => '074-53269-123',
                'content' => 'Hari Poter i Kamen mudrosti je prvi dio serijala o Hariju Poteru, za koji je planirano sedam knjiga. Knjige je za djecu napisala engleska književnica Džoan Ketlin Rouling. Glavni lik je dječak čarobnjak Hari Poter. Ova knjiga je prvi put izašla 30. juna 1997. godine, a izdavač je bio Blumsburi (Bloomsbury Publishing Plc) iz Londona. Knjiga je prevedena na oko 60 jezika. Po knjizi je 2001. godine snimljen i istoimeni film. Radnja počinje sa sasvim običnom britanskom porodicom Darsli. Nju čine Vernon Darsli, njegova žena Petunija i njihov sin Dadli Darsli. Darslijevi su pretjerano normalna porodica. Naime, oni ne podnose bilo šta što ima imalo veze i sa čim nevjerovatnim i iole neobičnim. Međutim, u noći 1. novembra 1981. godine, čovjek zvani Albus Dambldor pojavljuje se kod njihove kuće, a mačka koja je tu cijelog dana stajala transformiše se u ženu, Minervu Mek Gonagal.',
                'author_id' => 17,
                'picture' => '/images/books/1662236333073-Hari-Poter-i-Kamen-Mudrosti.jpg',
                'page_count' => 352,
                'size_id' => 4,
                'script_id' => 1,
                'binding_id' => 3,
                'publisher_id' => 1,
                'publish_date' => '014-09-01',
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 1,
                'reserved_count' => 1
            ],
            [
                'title' => 'Harri Poter i Dvorana tajni',
                'isbn' => '074-53849-123',
                'content' => 'Hari Poter i Dvorana tajni je knjiga Dž. K. Rouling. Drugi je dio serijala Hari Poter od sedam knjiga. Roman je objavljen 2. jula 1998. u Ujedinjenom Kraljevstvu. Po knjizi je 2002. godine snimljen istoimeni film. Harija Potera na rođendan posjeti kućni vilenjak Dobi. On ga upozorava da ove godine ne ide u Hogvorts, pošto će se strašne stvari dogoditi. Hari provodi prijatno ostatak raspusta u Ronovoj kući. Na dan polaska u školu, magična barijera koja razdvaja peron 9 i tri četvrtine od svijeta Normalaca odbija da ih propusti. Hari kasnije saznaje da je Dobi začarao pregradu da bi ga spriječio da ode na Hogvorts. ',
                'author_id' => 17,
                'picture' => '/images/books/1662236333073-Hari-Poter-i-Dvorana-Tajni.jpg',
                'page_count' => 384,
                'size_id' => 4,
                'script_id' => 1,
                'binding_id' => 3,
                'publisher_id' => 2,
                'publish_date' => '2014-09-11',
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 1,
                'reserved_count' => 1
            ],
            [
                'title' => 'Hari Poter i zatvorenik iz Askabana',
                'isbn' => '074-54215-123',
                'content' => 'Hari Poter i zatvorenik iz Askabana (engl. Harry Potter and the prisioner of the Azkaban) je treća knjiga iz serijala o Hariju Poteru britanske spisateljice Dž. K. Rouling. Knjiga je objavljena 8. jula 1999. Film temeljen na knjizi u Velikoj Britaniji premijerno je prikazan 31. maja 2004, a u SAD i ostatku svijeta 4. juna 2004. Priča počinje na Hari Poterov rođendan, 31. jula. Tog jutra Hari na televiziji čuje da je ozloglašeni kriminalac Sirijus Blek pobjegao iz zatvora. Hari iz bijesa naduva groznu sestru svoga teče kad je vrijeđala njegove roditelje. U strahu od Ministarstva magije, koje kažnjava maloljetne čarobnjake zbog izvođenja magije van škole, Hari odlazi iz kuće i bježi Noćnim viteškim autobusom, čarobnim trospratnim vozilom, u London. Kasnije ga, ipak, ne kazni Ministarstvo magije.',
                'author_id' => 17,
                'picture' => '/images/books/1662236333073-Hari-Poter-i-zatvorenik-iz-Askabana.jpg',
                'page_count' => 480,
                'size_id' => 4,
                'script_id' => 1,
                'binding_id' => 4,
                'publisher_id' => 3,
                'publish_date' => '2014-09-27',
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0
            ],
            [
                'title' => 'Na Drini ćuprija',
                'isbn' => '6-01-03056-4',
                'content' => 'Na Drini ćuprija je roman srpskog književnika i nobelovca Iva Andrića. Roman pripovjeda o građenju mosta preko rijeke Drine u bosanskom gradu Višegradu. Građenje mosta naručio je Mehmed paša Sokolović, čuveni zvaničnik Osmanskog carstva koji je bio rođeni Srbin iz Rudog. Još kao mali dječak, Bajica, odveden je sa ostalom djecom kao danak u krvi u Carigrad. Uprkos raširenom mišljenju, Andrić nije dobio Nobelovu nagradu za književnost za ovaj roman, već je, kao i svi drugi dobitnici, zvanično nagrađen za cjelokupno književno stvaralaštvo, a ne pojedinačno djelo. Radnja romana traje otprilike četiri vijeka i skup je više priča povezanih sa mostom na Drini, koji je tačka okosnica i glavni simbol naracije. Sam most predstavlja na neki način suprotnost ljudskoj sudbini koja je prolazna u odnosu na kamenu građevinu, koja je vječna. Oko njega se razvijaju priče o istorijskim ličnostima i bezimenim likovima koji su plod piščeve mašte.',
                'author_id' => 18,
                'picture' => '/images/books/1662236333074-Na-Drini-ćuprija.jpg',
                'page_count' => 464,
                'size_id' => 4,
                'script_id' => 5,
                'binding_id' => 2,
                'publisher_id' => 8,
                'publish_date' => '1983-02-07',
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 24,
                'checkouts_count' => 0,
                'reserved_count' => 0
            ],
            [
                'title' => 'Gorski vijenac',
                'isbn' => '978-63732-608',
                'content' => 'Gorski vijenac (u prvom izdanju Горскıй вıенацъ) refleksivno-herojska je poema u obliku narodne drame Petra II Petrovića Njegoša, nastala u doba srpskog romantizma. Djelo je objavljeno u Beču 1847. na srpskom narodnom jeziku i svojom pojavom predstavljalo je veliki doprinos pobedi Vukove borbe za novi književni jezik. Tema „Gorskog vijenca” je istraga, odnosno istrebljenje, poturica. Djelo je napisano poslije poeme „Luča mikrokozma” (1845), a prije poeme „Lažni car Šćepan Mali” (1847, objavljena 1851). Njegoš je, u „Gorskom vijencu”, ispleo čitavu crnogorsku istoriju, opjevao najvažnije događaje iz prošlosti, od vremena Nemanjića do početka 18. veka, naslikao svakodnevni crnogorski život, njihove praznike i skupove, dao narodne običaje, vjerovanja i shvatanja, prikazao susjedne narode, Turke i Mlečane. U stvari, u „Gorskom vijencu”, u njegovih 2819 stihova (deseteraca, izuzev jedne umetnute pjesme u devetercu i jedne tužbalice u dvanaestercu), našla su mesto tri sveta, tri civilizacije, koje su se dodirivale i preplitale na crnogorskom tlu.',
                'author_id' => 18,
                'picture' => '/images/books/1662236333073-Gorski-Vijenac.jpg',
                'page_count' => 132,
                'size_id' => 4,
                'script_id' => 5,
                'binding_id' => 1,
                'publisher_id' => 7,
                'publish_date' => '1964-10-09',
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 24,
                'checkouts_count' => 0,
                'reserved_count' => 0
            ], [
                'title' => 'Lelejska gora',
                'author_id' => 2,
                'page_count' => 599,
                'binding_id' => 2,
                'publisher_id' => 1,
                'publish_date' => '2006-01-01',
                'script_id' => 1,
                'isbn' => '86-7706-190-8',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Lelejska-Gora.jpg'
            ],
            [
                'title' => 'Tvrdica',
                'author_id' => 3,
                'page_count' => 98,
                'binding_id' => 2,
                'publisher_id' => 3,
                'publish_date' => '1998-01-01',
                'script_id' => 2,
                'isbn' => '86-09-00133-4',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333074-Tvrdica.jpg'
            ],
            [
                'title' => 'Rani jadi',
                'author_id' => 4,
                'page_count' => 114,
                'binding_id' => 1,
                'publisher_id' => 2,
                'publish_date' => '1998-01-01',
                'script_id' => 2,
                'isbn' => '148-08124-989',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333074-Rani-jadi.jpg'
            ],
            [
                'title' => 'Primjeri čojstva i junaštva',
                'author_id' => 5,
                'page_count' => 217,
                'binding_id' => 1,
                'publisher_id' => 3,
                'publish_date' => '1976-01-01',
                'script_id' => 2,
                'isbn' => '488-85443-575',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333074-Primjeri-čojstva-i-junaštva.jpg'
            ],
            [
                'title' => 'Gospoda Glembajevi',
                'author_id' => 6,
                'page_count' => 177,
                'binding_id' => 1,
                'publisher_id' => 4,
                'publish_date' => '1974-01-01',
                'script_id' => 2,
                'isbn' => '290-06016-551',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Gospoda-Glembajevi.jpg'
            ],
            [
                'title' => 'Don Kihot',
                'author_id' => 7,
                'page_count' => 788,
                'binding_id' => 2,
                'publisher_id' => 1,
                'publish_date' => '2004-01-01',
                'script_id' => 1,
                'isbn' => '86-7706-037-5',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Don-Kihot.jpg'
            ],
            [
                'title' => 'Seobe',
                'author_id' => 8,
                'page_count' => 796,
                'binding_id' => 2,
                'publisher_id' => 1,
                'publish_date' => '2004-01-01',
                'script_id' => 1,
                'isbn' => '86-7706-060-X',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333074-Seobe.jpg'
            ],
            [
                'title' => 'Ana Karenjina',
                'author_id' => 9,
                'page_count' => 830,
                'binding_id' => 2,
                'publisher_id' => 1,
                'publish_date' => '2004-01-01',
                'script_id' => 1,
                'isbn' => '86-7706-059-6',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Ana-Karenjina.jpg'
            ],
            [
                'title' => 'Nečista krv',
                'author_id' => 10,
                'page_count' => 214,
                'binding_id' => 2,
                'publisher_id' => 3,
                'publish_date' => '1998-01-01',
                'script_id' => 2,
                'isbn' => '86-09-00251-9',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333074-Nečista-krv.jpg'
            ],
            [
                'title' => 'Revizor',
                'author_id' => 11,
                'page_count' => 132,
                'binding_id' => 2,
                'publisher_id' => 3,
                'publish_date' => '1986-01-01',
                'script_id' => 2,
                'isbn' => '218-18235-689',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333074-Revizor.jpg'
            ],
            [
                'title' => 'Romeo i Julija',
                'author_id' => 12,
                'page_count' => 199,
                'binding_id' => 2,
                'publisher_id' => 3,
                'publish_date' => '1987-01-01',
                'script_id' => 2,
                'isbn' => '86-09-0072-9',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333074-Romeo-i-Julija.jpg'
            ],
            [
                'title' => 'Cigani',
                'author_id' => 13,
                'page_count' => 256,
                'binding_id' => 1,
                'publisher_id' => 5,
                'publish_date' => '1997-01-01',
                'script_id' => 2,
                'isbn' => '86-427-0632-5',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Cigani.jpg'
            ],
            [
                'title' => 'Gilgameš',
                'author_id' => 1,
                'page_count' => 93,
                'binding_id' => 1,
                'publisher_id' => 5,
                'publish_date' => '1997-01-01',
                'script_id' => 2,
                'isbn' => '86-427-0608-2',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Gilgameš.jpg'
            ],
            [
                'title' => 'Derviš i smrt',
                'author_id' => 15,
                'page_count' => 426,
                'binding_id' => 1,
                'publisher_id' => 5,
                'publish_date' => '1997-01-01',
                'script_id' => 2,
                'isbn' => '86-427-0642-2',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Derviš-i-smrt.jpg'
            ],
            [
                'title' => 'Starac i more',
                'author_id' => 16,
                'page_count' => 106,
                'binding_id' => 2,
                'publisher_id' => 6,
                'publish_date' => '1990-01-01',
                'script_id' => 1,
                'isbn' => '86-01-01639-1',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333074-Stranac-i-more.jpg'
            ],
            [
                'title' => 'Čiča Gorio',
                'author_id' => 19,
                'page_count' => 314,
                'binding_id' => 2,
                'publisher_id' => 7,
                'publish_date' => '2005-01-01',
                'script_id' => 1,
                'isbn' => '86-7706-124-x',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333074-Čiča-Gorio.jpg'
            ],
            [
                'title' => 'Ilijada',
                'author_id' => 20,
                'page_count' => 287,
                'binding_id' => 2,
                'publisher_id' => 7,
                'publish_date' => '2005-01-01',
                'script_id' => 2,
                'isbn' => '86-7706-106-1',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Ilijada.jpg'
            ],
            [
                'title' => 'Hamlet',
                'author_id' => 12,
                'page_count' => 219,
                'binding_id' => 2,
                'publisher_id' => 8,
                'publish_date' => '2007-01-01',
                'script_id' => 1,
                'isbn' => '978-86-7712-2',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Hamlet.jpg'
            ],
            [
                'title' => 'Proces',
                'author_id' => 21,
                'page_count' => 191,
                'binding_id' => 2,
                'publisher_id' => 6,
                'publish_date' => '1987-01-01',
                'script_id' => 1,
                'isbn' => '717-05001-441',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333074-Proces.jpg'
            ],
            [
                'title' => 'Dekameron',
                'author_id' => 22,
                'page_count' => 285,
                'binding_id' => 1,
                'publisher_id' => 9,
                'publish_date' => '1998-01-01',
                'script_id' => 2,
                'isbn' => '848-91291-125',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Dekameron.jpg'
            ],
            [
                'title' => 'Kanconijer',
                'author_id' => 23,
                'page_count' => 124,
                'binding_id' => 1,
                'publisher_id' => 11,
                'publish_date' => '1996-01-01',
                'script_id' => 2,
                'isbn' => '86-7058-037-3',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Kanconijer.jpg'
            ],
            [
                'title' => 'Antigona',
                'author_id' => 24,
                'page_count' => 101,
                'binding_id' => 2,
                'publisher_id' => 6,
                'publish_date' => '1990-01-01',
                'script_id' => 1,
                'isbn' => '86-01-01695-2',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333073-Antigona.jpg'
            ],
            [
                'title' => 'Stranac',
                'author_id' => 25,
                'page_count' => 127,
                'binding_id' => 2,
                'publisher_id' => 6,
                'publish_date' => '1991-01-01',
                'script_id' => 1,
                'isbn' => '354-04584-476',
                'content' => '',
                'size_id' => 1,
                'total_count' => rand(4, 15),
                'category_id' => rand(1, 10),
                'genre_id' => 1,
                'checkouts_count' => 0,
                'reserved_count' => 0,
                'picture' => '/images/books/1662236333074-Stranac.jpg'
            ]
        ]);
    }
}
