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
                'name' => 'Nema autora',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Mihailo Lalić',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Molijer',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Danilo Kiš',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Marko Miljanov Popović',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Miroslav Krleža',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Migel Servantes',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Miloš Crnjanski',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Lav Tolstoj',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Borisav Stanković',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Nikolaj V. Gogolj',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Vilijem Šekspir',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Aleksandar Sergejevič Puškin',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Meša Selimović',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Ivo Andrić',
                'about' => 'Ivo Andrić (Dolac, kod Travnika, 9. oktobar 1892 — Beograd, 13. mart 1975) bio je srpski i jugoslovenski književnik i diplomata Kraljevine Jugoslavije. Godine 1961.(10. decembra) dobio je Nobelovu nagradu za književnost „za epsku snagu kojom je oblikovao teme i prikazao sudbine ljudi tokom istorije svoje zemlje”. Njegova najpoznatija dela su pored romana Na Drini ćuprija i Travnička hronika, Prokleta avlija, Gospođica i Jelena, žena koje nema. ',
                'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/S._Kragujevic%2C_Ivo_Andric%2C_1961.jpg/220px-S._Kragujevic%2C_Ivo_Andric%2C_1961.jpg'
            ],
            [
                'name' => 'Ernest Hemingvej',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'J. K. Rowling',
                'about' => 'Joanne Rowling (rođena 31 Jula 1965), takođe poznata pod pseudonimom J. K. Rowling, je engleska književnica. Napisala je 7 serijala romana, Hari Poter, izdaih od 1997 do 2007. Serijal se prodao u preko 500 miliona izdanja, preveden na najmanje 70 jezika, i iznjedrio globalnu medijsku franšizu uključujući filmove i video igrice. Upražnjeno mjesto (2012) bio je njen prvi roman za odrasle. Sledeća knjiga koju je Roulingova napisala bila je kriminalistički roman Zov kukavice. Objavila ju je u aprilu 2013, pod pseudonimom Robert Galbrejt.',
                'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/J._K._Rowling_2010.jpg/220px-J._K._Rowling_2010.jpg'
            ],
            [
                'name' => 'Petar II Petrović-Njegoš',
                'about' => 'Petar II Petrović Njegoš (Njeguši (Cetinje) 13. novembar 1813 — Cetinje 31. oktobar 1851) bio je crnogorski vladar, vladika, pjesnik i filozof. Njegova se djela svrstavaju u red najznačajnijih dijelova crnogorske i srpske književnosi. Rođen je kao kao Radoje „Rade” Tomov Petrović, obrazovao se u nekoliko manastira u Crnoj Gori i postao je duhovni i svjetovni vođa Crne Gore nakon smrti svog strica Petra I. Njegoš je poštovan kao pjesnik i filozof, a najpoznatiji je po svojoj epskoj poemi „Gorski vijenac“, koja se smatra za remek-djelo srpske i južnoslovenske književnosti. Druga njegova važna djela su „Luča mikrokozma“, „Ogledalo srpsko“ i „Lažni car Šćepan Mali“.',
                'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Petar_II_Petrovic-Njegos.jpg/220px-Petar_II_Petrovic-Njegos.jpg'
            ],
            [
                'name' => 'Onore de Balzak',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Homer',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Franc Kafka',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Đovani Bokačo',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Frančesto Petrarka',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Sofokle',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Alber Kami',
                'about' => '0123456789',
                'picture' => '/assets/img/user.jpg'
            ],
        ]);
    }
}
