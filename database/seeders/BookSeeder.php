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
                'isbn' => '0747532699123',
                'content' => 'Hari Poter i Kamen mudrosti je prvi dio serijala o Hariju Poteru, za koji je planirano sedam knjiga. Knjige je za djecu napisala engleska književnica Džoan Ketlin Rouling. Glavni lik je dječak čarobnjak Hari Poter. Ova knjiga je prvi put izašla 30. juna 1997. godine, a izdavač je bio Blumsburi (Bloomsbury Publishing Plc) iz Londona. Knjiga je prevedena na oko 60 jezika. Po knjizi je 2001. godine snimljen i istoimeni film. Radnja počinje sa sasvim običnom britanskom porodicom Darsli. Nju čine Vernon Darsli, njegova žena Petunija i njihov sin Dadli Darsli. Darslijevi su pretjerano normalna porodica. Naime, oni ne podnose bilo šta što ima imalo veze i sa čim nevjerovatnim i iole neobičnim. Međutim, u noći 1. novembra 1981. godine, čovjek zvani Albus Dambldor pojavljuje se kod njihove kuće, a mačka koja je tu cijelog dana stajala transformiše se u ženu, Minervu Mek Gonagal.',
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
                'title' => 'Harri Poter i Dvorana tajni',
                'isbn' => '0747538492123',
                'content' => 'Hari Poter i Dvorana tajni je knjiga Dž. K. Rouling. Drugi je dio serijala Hari Poter od sedam knjiga. Roman je objavljen 2. jula 1998. u Ujedinjenom Kraljevstvu. Po knjizi je 2002. godine snimljen istoimeni film. Harija Potera na rođendan posjeti kućni vilenjak Dobi. On ga upozorava da ove godine ne ide u Hogvorts, pošto će se strašne stvari dogoditi. Hari provodi prijatno ostatak raspusta u Ronovoj kući. Na dan polaska u školu, magična barijera koja razdvaja peron 9 i tri četvrtine od svijeta Normalaca odbija da ih propusti. Hari kasnije saznaje da je Dobi začarao pregradu da bi ga spriječio da ode na Hogvorts. ',
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
                'title' => 'Hari Poter i zatvorenik iz Askabana',
                'isbn' => '0747542155123',
                'content' => 'Hari Poter i zatvorenik iz Askabana (engl. Harry Potter and the prisioner of the Azkaban) je treća knjiga iz serijala o Hariju Poteru britanske spisateljice Dž. K. Rouling. Knjiga je objavljena 8. jula 1999. Film temeljen na knjizi u Velikoj Britaniji premijerno je prikazan 31. maja 2004, a u SAD i ostatku svijeta 4. juna 2004. Priča počinje na Hari Poterov rođendan, 31. jula. Tog jutra Hari na televiziji čuje da je ozloglašeni kriminalac Sirijus Blek pobjegao iz zatvora. Hari iz bijesa naduva groznu sestru svoga teče kad je vrijeđala njegove roditelje. U strahu od Ministarstva magije, koje kažnjava maloljetne čarobnjake zbog izvođenja magije van škole, Hari odlazi iz kuće i bježi Noćnim viteškim autobusom, čarobnim trospratnim vozilom, u London. Kasnije ga, ipak, ne kazni Ministarstvo magije.',
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
                'title' => 'Na Drini ćuprija',
                'isbn' => '9789004241916',
                'content' => 'Na Drini ćuprija je roman srpskog književnika i nobelovca Iva Andrića. Roman pripovjeda o građenju mosta preko rijeke Drine u bosanskom gradu Višegradu. Građenje mosta naručio je Mehmed paša Sokolović, čuveni zvaničnik Osmanskog carstva koji je bio rođeni Srbin iz Rudog. Još kao mali dječak, Bajica, odveden je sa ostalom djecom kao danak u krvi u Carigrad. Uprkos raširenom mišljenju, Andrić nije dobio Nobelovu nagradu za književnost za ovaj roman, već je, kao i svi drugi dobitnici, zvanično nagrađen za cjelokupno književno stvaralaštvo, a ne pojedinačno djelo. Radnja romana traje otprilike četiri vijeka i skup je više priča povezanih sa mostom na Drini, koji je tačka okosnica i glavni simbol naracije. Sam most predstavlja na neki način suprotnost ljudskoj sudbini koja je prolazna u odnosu na kamenu građevinu, koja je vječna. Oko njega se razvijaju priče o istorijskim ličnostima i bezimenim likovima koji su plod piščeve mašte.',
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
                'title' => 'Gorski vijenac',
                'isbn' => '9789637326608',
                'content' => 'Gorski vijenac (u prvom izdanju Горскıй вıенацъ) refleksivno-herojska je poema u obliku narodne drame Petra II Petrovića Njegoša, nastala u doba srpskog romantizma. Djelo je objavljeno u Beču 1847. na srpskom narodnom jeziku i svojom pojavom predstavljalo je veliki doprinos pobedi Vukove borbe za novi književni jezik. Tema „Gorskog vijenca” je istraga, odnosno istrebljenje, poturica. Djelo je napisano poslije poeme „Luča mikrokozma” (1845), a prije poeme „Lažni car Šćepan Mali” (1847, objavljena 1851). Njegoš je, u „Gorskom vijencu”, ispleo čitavu crnogorsku istoriju, opjevao najvažnije događaje iz prošlosti, od vremena Nemanjića do početka 18. veka, naslikao svakodnevni crnogorski život, njihove praznike i skupove, dao narodne običaje, vjerovanja i shvatanja, prikazao susjedne narode, Turke i Mlečane. U stvari, u „Gorskom vijencu”, u njegovih 2819 stihova (deseteraca, izuzev jedne umetnute pjesme u devetercu i jedne tužbalice u dvanaestercu), našla su mesto tri sveta, tri civilizacije, koje su se dodirivale i preplitale na crnogorskom tlu.',
                'author_id' => 3,
                'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Gorski_Vijenac.jpg/220px-Gorski_Vijenac.jpg',
                'page_count' => 132,
                'size_id' => 4,
                'script_id' => 5,
                'binding_id' => 1,
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
