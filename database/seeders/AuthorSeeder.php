<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        DB::table('authors')->insert([
            [
                'name' => 'Nema autora',
                'about' => 'Ovaj autor se dodjeljuje knjizi koja iz bilo kojeg razloga nema autora.',
                'picture' => '/assets/img/user.jpg'
            ],
            [
                'name' => 'Mihailo Lalić',
                'about' => 'Mihailo Lalić (7. oktobar 1914. - 30. decembar 1992.) je crnogorski pisac poznat po nizu romana koji su opisivali partizansku borbu za vrijeme drugog svetskog rata u Crnoj Gori. Započeo je knjigom pesama Stazama slobode (1948), ali se brzo okrenuo prozi, koja će postati isključiva forma umetničkog sagledavanja vremena, događaja i ljudskih sudbina. Prema njegovom scenariju snimljen je film "Svadba" 1973. u režiji Radomira Šaranovića, takođe izvršena je ekranizacija njegovog romana "Lelejska gora" 1968.',
                'picture' => '/images/authors/1662235215053-Mihailo-Lalic.jpg'
            ],
            [
                'name' => 'Molijer',
                'about' => 'Molijer je jedan od najpoznatijih francuskih komediografa i uz Korneja i Rasina, najbolji predstavnik "zlatnog veka" francuske drame koja je svoj vrhunac doživela u 17. veku. Osim kao književnik Molijer je delovao i kao scenarista i doprineo mnogo razvoju humorističke satire. Molijer je rođen kao Žan-Baptist Pokelin 15. februara 1622. godine u Parizu. Još je kao mladić odlučio da neće nastaviti karijeru pravnika, nego se umesto toga posvetiti teatru gde će kao glumac, pisac, reditelj i direktor glumačke družine raditi sve do kraja svog života, a tako je na kraju i bilo.',
                'picture' => '/images/authors/1662235215053-Molijer.jpg'
            ],
            [
                'name' => 'Danilo Kiš',
                'about' => 'Danilo Kiš je bio srpski romanopisac, pisac pripovetki, esejista i prevodilac. Rođen je 22. februara 1935. godine u Subotici, a umro je 15. oktobra 1989. godine u Parizu. Bio je dopisni član SANU. Danilo Kiš se smatra jednim od najznačajnijih pisaca jugoslovenske i srpske književnosti. Svoje prve radove objavio je 1953. godine u časopisima i listovima, i to: ,,Oproštaj s majkom“, ,,Sjutra“ – Pjesma o Jevrejki, ,,Odjek iz djetinjstva“, ,,Susret s majkom u jesen“, „Kraju mog djetinjstva“, ,,Crveni bik“.',
                'picture' => '/images/authors/1662235215053-Danilo-Kis.jpg'
            ],
            [
                'name' => 'Marko Miljanov Popović',
                'about' => 'Marko Miljanov Popović Drekalović (Medun, 25. april 1833 — Herceg Novi, 2. februar 1901) bio je srpski (po etničkoj pripadnosti), odnosno brdski (po zavičajnoj pripadnosti) i crnogorski (po regionalnoj pripadnosti) književnik i vojvoda iz plemena Kuči. U mladosti je bio perjanik kod kneza Crne Gore Danila I Petrovića. Vojvodske oznake mu je dao crnogorski knjaz Nikola I Petrović, s kojim se kasnije razišao zbog političkih nesporazuma. Nakon oslobođenja Podgorice (1878) Marko Miljanov bio je jedno vrijeme gradonačelnik.',
                'picture' => '/images/authors/1662235215053-Marko-Miljanov.jpg'
            ],
            [
                'name' => 'Miroslav Krleža',
                'about' => 'Miroslav Krleža je bio hrvatski pisac i enciklopedista. Rođen je 07. jula 1893. godine u Zagrebu, gdje je i umro 29. decembra 1981. godine. Smatra se piscem najznačajnijih tekstova u hrvatskoj književnosti 20. vijeka. Pokrenuo je mnoge kulturne inicijative, a sa ciljem kritičkog osvještavanja hrvatskog društva.',
                'picture' => '/images/authors/1662235215053-Miroslav-Krleza.jpg'
            ],
            [
                'name' => 'Migel Servantes',
                'about' => 'Migel de Servantes Saavedrabio je španski pesnik, dramaturg i iznad svega prozni pisac. Smatra se jednom od najvećih figura španske književnosti. Prema svojim delima, pripada kako renesansi, tako i baroku i Zlatnom veku španske književnosti i na neki način predstavlja sintezu ova dva pravca. U svetu je poznat kao autor prvog modernog romana i najprevođenije knjige posle Biblije, Veleumnog plemića, Don Kihota od Manče.Bio je svedok vrhunca moći i početka opadanja velike španske imperije koja se u to doba prostirala na tri kontinenta.',
                'picture' => '/images/authors/1662235215053-Migel-Servantes.jpg'
            ],
            [
                'name' => 'Miloš Crnjanski',
                'about' => 'Miloš Crnjanski je bio srpski književnik i jedan od najznačajnijih stvaralaca srpske literature XX veka. Istakao se kao pesnik, pripovedač, romansijer i publicista. Bavio se i likovnom kritikom. Prvu pesmu „Sudba“ Crnjanski je objavio u somborskom dečjem listu „Golub“ 1908. godine. 1912. u sarajevskoj „Bosanskoj vili“ štampane je njegova pesma „U početku beše sjaj“.',
                'picture' => '/images/authors/1662235215053-Milos-Crnjanski.jpg'
            ],
            [
                'name' => 'Lav Tolstoj',
                'about' => 'Lav Nikolajevič Tolstoj (rus. Лев Николаевич Толстой; Jasna Poljana, 9. septembar 1828 — Astapovo, 20. novembar 1910) bio je grof, ruski pisac svrstan u najveće ruske realiste toga doba. Poznat po svoja dva najveća dela, Ana Karenjina i Rat i mir, koja oslikavaju duboku, psihološku i društvenu pozadinu Rusije i njenog društva u 19. vijeku.',
                'picture' => '/images/authors/1662235215053-Lav-Tolstoj.jpg'
            ],
            [
                'name' => 'Borisav Stanković',
                'about' => 'Borisav Bora Stanković bio je srpski pripovedač, romansijer, dramatičar. Njegovo stvaralaštvo uglavnom se svrstava u realizam, ali ima osobine koje naginju ka naturalizmu. Novija kritika svrstava ga u začetnike moderne srpske književnosti. Njegovi romani i pripovetke oslikavaju život ljudi sa juga Srbije. Pripada grupi pripovedača koji su se pojavili na prelazu u 20. vek, Ivi Ćipiku, Petru Kočiću, Milutinu Uskokoviću i drugima.',
                'picture' => '/images/authors/1662235215052-Borisav-Stankovic.jpg'
            ],
            [
                'name' => 'Nikolaj V. Gogolj',
                'about' => 'Nikolaj Vasiljevič Gogolj je bio ruski pisac rođen u Ukrajini. U svojim delima je pokazivao duboko razumevanje i poštovanje za ljude, mentalitet, istoriju i kulturu Ukrajine i Rusije. Hronološki je prvi među plejadom velikih ruskih realista, pisao je pripovetke, romane i komedije. U njegovim radovima je prisutan i uticaj prethodne epohe nacionalnog romantizma. Gogolj je imao veliki uticaj na kasnije ruske realiste.',
                'picture' => '/images/authors/1662235215053-Nikolaj-Gogolj.jpg'
            ],
            [
                'name' => 'Vilijam Šekspir',
                'about' => 'Vilijam Šekspir bio je engleski pesnik i dramski pisac, koji se, prema više različitih izvora, smatra za najvećeg pisca na engleskom jeziku i dramaturga svetskog glasa. Opus Šekspirovih dela koja su sačuvana do danas sastoji se od 38 pozorišnih komada, 154 soneta, dve duge narativne i nekoliko drugih poema. Njegovi pozorišni komadi su prevedeni na mnoge žive jezike i prikazuju se svuda u svetu češće nego bilo koji drugi.',
                'picture' => '/images/authors/1662235215053-Vilijam-Sekspir.jpg'
            ],
            [
                'name' => 'Aleksandar Sergejevič Puškin',
                'about' => 'Aleksandar Sergejevič Puškin je bio ruski književnik. Mnogi ga smatraju za najboljeg ruskog pesnika i oca moderne ruske književnosti. Puškin je među prvima u Rusiji počeo da piše narodnim jezikom i distancirao se od romantičarske književnosti popularne u zapadnoj Evropi. Napravio je stil koji je mešao satiru, romantiku i dramu. U ranom detinjstvu o Puškinu su se starale dadilje i učitelji francuskog jezika. Znanje jezika je razvijao među članovima nižih slojeva. 1811. godine je primljen u elitnu gimnaziju u Carskom selu, koju je pohađao do 1817. godine.',
                'picture' => '/images/authors/1662235215052-Aleksandar-Sergejevic-Puskin.jpg'
            ],
            [
                'name' => 'Meša Selimović',
                'about' => 'Mehmed Meša Selimović bio je bosanskohercegovački i srpski pisac. Rođen je u Tuzli 26. aprila 1910. godine, a umro je u Beogradu 11. jula 1982. godine. Meša Selimović bio je značajan pisac čiji je roman ,,Derviš i smrt“  jedan od najvažnijih književnih dijela poslijeratnog perioda. Neke od glavnih tema u njegovim djelima su odnosi između pojedinca i vlasti, života i smrti, te drugih egzistencijalnih pitanja.',
                'picture' => '/images/authors/1662235215053-Mesa-Selimovic.jpg'
            ],
            [
                'name' => 'Ivo Andrić',
                'about' => 'Ivo Andrić (Dolac, kod Travnika, 9. oktobar 1892 — Beograd, 13. mart 1975) bio je srpski i jugoslovenski književnik i diplomata Kraljevine Jugoslavije. Godine 1961.(10. decembra) dobio je Nobelovu nagradu za književnost „za epsku snagu kojom je oblikovao teme i prikazao sudbine ljudi tokom istorije svoje zemlje”. Njegova najpoznatija dela su pored romana Na Drini ćuprija i Travnička hronika, Prokleta avlija, Gospođica i Jelena, žena koje nema. ',
                'picture' => '/images/authors/1662235215052-Ivo-Andric.jpg'
            ],
            [
                'name' => 'Ernest Hemingvej',
                'about' => 'Ernest Miler Hemingvej bio je američki pisac i novinar. Bio je pripadnik pariskog udruženja izgnanika dvadesetih godina dvadesetog veka i jedan od veterana Prvog svetskog rata, koji su kasnije bili poznati kao „izgubljena generacija“, kako ih je nazvala Gertruda Stajn. Dobio je Pulicerovu nagradu 1953. godine za svoj roman Starac i more, kao i Nobelovu nagradu za književnost 1954. godine. Svojim posebnim načinom pisanja koji karakterišu kratke rečenice, nasuprot stilu njegovog književnog suparnika Vilijama Foknera, Hemingvej je značajno uticao na razvoj lepe književnosti dvadesetog veka. Mnogi njegovi romani se danas smatraju klasičnim delima američke književnosti.',
                'picture' => '/images/authors/1662235215053-Ernest-Hemingvej.jpg'
            ],
            [
                'name' => 'J. K. Rowling',
                'about' => 'Joanne Rowling (rođena 31 Jula 1965), takođe poznata pod pseudonimom J. K. Rowling, je engleska književnica. Napisala je 7 serijala romana, Hari Poter, izdaih od 1997 do 2007. Serijal se prodao u preko 500 miliona izdanja, preveden na najmanje 70 jezika, i iznjedrio globalnu medijsku franšizu uključujući filmove i video igrice. Upražnjeno mjesto (2012) bio je njen prvi roman za odrasle. Sledeća knjiga koju je Roulingova napisala bila je kriminalistički roman Zov kukavice. Objavila ju je u aprilu 2013, pod pseudonimom Robert Galbrejt.',
                'picture' => '/images/authors/1662235215053-JK-Rowling.jpg'
            ],
            [
                'name' => 'Petar II Petrović-Njegoš',
                'about' => 'Petar II Petrović Njegoš (Njeguši (Cetinje) 13. novembar 1813 — Cetinje 31. oktobar 1851) bio je crnogorski vladar, vladika, pjesnik i filozof. Njegova se djela svrstavaju u red najznačajnijih dijelova crnogorske i srpske književnosi. Rođen je kao kao Radoje „Rade” Tomov Petrović, obrazovao se u nekoliko manastira u Crnoj Gori i postao je duhovni i svjetovni vođa Crne Gore nakon smrti svog strica Petra I. Njegoš je poštovan kao pjesnik i filozof, a najpoznatiji je po svojoj epskoj poemi „Gorski vijenac“, koja se smatra za remek-djelo srpske i južnoslovenske književnosti. Druga njegova važna djela su „Luča mikrokozma“, „Ogledalo srpsko“ i „Lažni car Šćepan Mali“.',
                'picture' => '/images/authors/1662235215053-Njegos-II.jpg'
            ],
            [
                'name' => 'Onore de Balzak',
                'about' => 'Onore de Balzak (Honore de Balzac) bio je francuski romanopisac i dramski pisac. Rođen je 20. maja 1799. godine u mjestu Tur u Francuskoj, a umro 18. avgusta 1850. godine u Parizu. Smatra se ključnim autorom realizma. Poznat je po složenosti svojih likovima; čak su mu i sporedni likovi moralno dvosmisleni. Njegov literarni rad uticao je na mnoge poznate pisce, kao što su romanopisci Emil Zola (Emile Zola), Čarls Dikens (Charles Dickens), Gustav Flaubert (Gustave Flaubert), Džek Keruak (Jack Kerouac) i Henri Džejms (Henry James), te važne filozofe kao što je Fridrih Engels (Friedrich Engels). Po mnogim Balzakovim djelima snimljeni su filmovi. Balzak je tokom cijelog života imao zdravstvene probleme, vjerovatno izazvane intenzivnim rasporedom pisanja. Često je bio u napetim odnosima sa porodicom. Godine 1850. oženio je Evelinu Hansku (Ewelina Hanska), poljsku aristokratkinju i njegovu dugogodišnju ljubav; umro je u Parizu samo pet mjeseci kasnije.',
                'picture' => '/images/authors/1662235215053-Onore-de-Balzak.jpg'
            ],
            [
                'name' => 'Homer',
                'about' => 'Radi se o pjesniku za kojeg se ne može točno reći kada je živio, no pretpostavlja se kako je to bilo negdje u 7. i 8. st. pr. Kr., jer su tada dovršeni epovi "Ilijada" i "Odiseja". Homera se oduvijek zamišljalo starim i slijepim pjesnikom, no zbog živopisnog opisivanja koje je iznosio u svojim djelima, malo je bilo vjerojatno da se radi o slijepom pjesniku. Jezik koji je Homer koristio bio je umjetan i nikada se nije koristio u narodu. Radi se o starom jonskom dijalektu, u kojem ima i novojonskih i eolskih elemenata, ali isto tako i atičkih dijalektizama.',
                'picture' => '/images/authors/1662235215053-Homer.jpg'
            ],
            [
                'name' => 'Franc Kafka',
                'about' => 'Franc Kafka je češki pisac jevrejskog porekla. Smatra se jednim od najvećih pisaca 20. veka. Rođen je u Pragu 3. jula 1883. godine. Preminuo je 3. juna 1924. godine u sanatorijumu Kirling blizu Beča. Pripadao je avangardnom stilu pisanja, pravcu iz srednje faze modernizma. U delima je tematizovao alijenacije ličnosti, misticizam, brutalnost i sukobe različitih ličnosti. Najpoznatija njegova dela su romani „Proces“ i Dvorac“, te pripovetka „Preobražaj“. Pisao je pripovetke, romane, dnevnike, aforizme, i pisma. Sve ove književne vrste sjedinio je kroz tematski spiritualno iskustvo.',
                'picture' => '/images/authors/1662235215053-Franc-Kafka.jpg'
            ],
            [
                'name' => 'Đovani Bokačo',
                'about' => 'Đovani Bokačo je bio italijanski pisac. Smatra se jednim od najznačajnijih pisaca humanizma. Isto tako, bio je aktivan učesnik političkog i kulturnog života svoga vremena. Rođen je 16. juna 1313. godine u Čertaldu, gde je i umro 21. decembra 1375. godine. Kroz svoje stvaralaštvo uzvisio je sposobnost življenja, spontani prirodni nagon, iskrenost, ljudski razum i kulturu. Njegova najvažnija dela su: pustolovno-ljubavni roman „Filokolo“, realistični i psihološki roman „Elegija gospe Fijamete“, novela u stihovima „Fijezolanska priča o nimfama“, remek-delo novelistike i Bokačovo najpoznatije delo „Dekameron“, rasprava u pohvali Dantea „Život Danteov“.',
                'picture' => '/images/authors/1662235215053-Djovani-Bokaco.jpg'
            ],
            [
                'name' => 'Frančesto Petrarka',
                'about' => 'Frančesko Petrarka rođen je u Arecu u Toskani. Sin je Pjetra di Parence, beležnika u Firenci koji je sebe prozvao Petrako, i majke Elete Kaniđani. Detinjstvo je proveo u Inčizi, Avinjonu i Pizi. Studirao je pravo na univerzitetu u Monpeljeu i u Bolonji. U Avinjonu je kasnije radio kao dvorski savetnik, a na papskom dvoru uspeo je da se istakne naročito svojom rečitošću, odličnim poznavanjem klasične kulture i svojim prvim pesmama na toskanskom narodnom jeziku. Za njegov boravak na dvoru vezuje se i susret sa Laurom. Godine 1330. postao je kanonik što ga je obavezivalo na celibat, ali nije morao da se zaredi, ali to ga nije sprečilo da ima dvoje dece. Putovao je, učestvovao u javnom životu, a uz to se bavio i književnošću. Bio je izaslanik pape i mnogih važnih ljudi svoga doba, a bavio se i diplomatijom. Bio je i kulturno-politički posrednik između dva najvažnija politička centra toga doba u Italiji, između Venecije i Milana. Osmog aprila godine 1341. krunisan je lovorovim vencem na Kapitolu u Rimu. Bio je poeta laureatus pre nego što je napisao mnoga dela po kojima je kasnije postao poznat. Veoma teške godine za Petrarku bile su četrdesete godine kada su preminuli neki za njega veoma važni ljudi, među njima i Laura (1348). Umro je u Arkvi 1374. godine.',
                'picture' => '/images/authors/1662235215053-Francesko-Petrarka.jpg'
            ],
            [
                'name' => 'Sofokle',
                'about' => 'Sofokle (495.-406. godine p.n.e.) je rođen u Kolonu, gradu blizu Atine i potiče iz bogate porodice. Bio je starogrčki dramaturg. Takođe, on je jedan od trojice velikih tragičara, zajedno sa Eshilom i Euripidom. Iako je bio poznat pesnik, bavio se aktivno i državničkim poslovima. Napisao je više od stotinu tragedija, ali sačuvano ih je samo sedam. Tako su poznate tragedije: “Antigona”, “Elektra”, “Kralj Edip”, “Trahinjanke”, “Ajant”, “Filoktet”, “Edip na Kolonu”. Sačuvan je i samo deo drame “Sledbenici”. Uneo je neke novitete nakon Eshila. Tako on uvodi trećeg glumca, povećava broj osoba u horu pa ih više nema 12 nego 15, no hor sada samo prati radnju. Čovek mu je u prvom planu, delovanje i životne strasti. Isto tako napustio je mitski, grčki svet.',
                'picture' => '/images/authors/1662235215053-Sofokle.jpg'
            ],
            [
                'name' => 'Alber Kami',
                'about' => 'Alber Kami (Albert Camus) je bio francuski pisac i filozof. Rođen je u Mondovi u Alžiru, 07. novembra 1913. godine, a umro je u Vilblevenu u Francuskoj, 04. januara 1960. godine. Nobelovu nagradu za književnost Kami je dobio 1957. godine. Sva djela ovog pisca baziraju se na osnovnoj ideji apsurda ljudskog postojanja. Polazi od negativnog stava prema današnjem, modernom čovjeku, a nasuprot njega idealizuje stare Grke. U eseju „Pobunjeni čovjek“ iznosi neke svoje lične stavove. Njegova religioznost bila je predmet mnogih rasprava, a s tim u vezi, on je napisao „Ne vjerujem u boga i nisam ateist“. Nije imao poveznice sa ideologijama, što je potvrdio u intervjuu.',
                'picture' => '/images/authors/1662235215052-Alber-Kami.jpg'
            ],
        ]);
    }
}
