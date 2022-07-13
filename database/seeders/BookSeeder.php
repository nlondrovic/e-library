<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('books')->insert([
            [
                'title' => 'Romeo i juliA',
                'ISBN' => '123',
                'content' => 'Vilijam Šekspir bio je jedan od najvećih pisaca i dramaturga na engleskom jeziku. Ono što ga ?ini velikim piscem i
                jednim od najboljih pisaca svih vremena je to što su njegove drame bogate politi?kim, moralnim i društvenim temama. Njegovi junaci su nosioci
                viših moralnih ideja, a u svojim delima Šekspir razmatra pitanja koja se ti?u stvaralaštva, umetnosti, sveta i njegovog na?ina
                funkcionisanja.',
                'author_id' => 1
            ],
            [
                'title' => 'Bozanstvena Komedija',
                'ISBN' => '456',
                'content' => 'Dante je veliki italijanski pesnik, zalagao se za pisanje na narodnom jeziku i bio osniva? strofe od tri stiha, tzv.
                tercine. Dante se ?esto naziva ,,ocem italijanskog jezika“ i u Italiji ga oslovljavaju sa Il Sommo Poeta (vrhovni pesnik). Dante je jedan od
                najve?ih pisaca zbog svog velikog uticaja na kasnije pesnike, kao što su ?oser i Milton.',
                'author_id' => 2
            ],
            [
                'title' => 'Na drini cuprija',
                'ISBN' => '789',
                'content' => 'Ivo Andrc? je nesumnjivo jedan od najboljih pisac ikada. ?injenica da je dobio Nobelovu nagradu 1961. godine to potvr?uje,
                ali to nije jedini razlog. Njegovo stvaralaštvo je zna?ajno po mnogo ?emu, ali u srpskoj književnosti izdvaja ga to što je na izvanredan na?in
                uspeo da prikaže one neizrecive nagone u coveku koji su izvan njegove svesti i volje. Prikazao je kako ti nagoni pritiskaju coveka i zbog toga
                ga nazivaju modernim psihoanaliti?arem u našoj savremenoj književnosti.',
                'author_id' => 3
            ]
        ]);
    }
}
