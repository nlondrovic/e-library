# Ime tima i projekat: __En Passant__
##### Admin panel za elektronsku biblioteku, napravljen koristeći Laravel framework + MYSQL + blade.
#
#
#### Glavni hosting: [https://tim3.ictcortex.me][df1]
#### Alternativni hosting na Heroku: [https://e-library-me.herokuapp.com][df2]
#### Github projekat: [https://github.com/jasamguli/e-library][df3]
###
##### Članovi našeg tima su:
- Nikola Londrović
- Boris Vojinović
- Nikola Kapor
- Kristijan Vuković

##### **Mentor: Marko Lekić (Fleka)**
#
#
##### Requirements:
- [Git][df4]
- [PHP][df5]
- [XAMPP][df6]
- [Composer][df7]
#
Kredencijali za aplikaciju (lozinka svakog korisnika je "password"):
- email: admin@gmail.com
- password: password

##### Kako se projekat pokreće lokalno?
Potrebno je instalirati pomenute programe i napraviti lokalnu MySQL bazu pod imenom "tim3_elibrary".
Nakon toga pokrenuti sljedeće komande u terminalu:
```
composer global require laravel/installer
git clone https://github.com/jasamguli/e-libarary
cd e-libarary
copy .env.example .env
php artisan key:generate
composer install
php artisan serve
php artisan migrate:fresh --seed
```
Projekat će biti prikazan na: `http://localhost:8000`
###

Fokusirali smo se na izradu admin panela, koji bi koristili biliotekari, ne korisnici biblioteke.
Učenici ili korisnici bi dolazili lično u biblioteku i uzimali ili rezervisali knjige.
Postoji i logika za zahtjeve za rezervaciju knjiga na admin panelu, ali za sad još nijesmo napravili dio za korisnika gdje bi on slao te zahtjeve. Nijesmo znali da li se to očekuje od nas.
U svakom slučaju poenta svega ovoga je da se olakša evidencija knjiga i iznajmljivanja u svim bibliotekama gdje se do sad to radilo na papiru.

[df1]: <https://tim3.ictcortex.me>
[df2]: <https://e-library-me.herokuapp.com>
[df3]: <https://github.com/jasamguli/e-library>
[df4]: <https://git-scm.com/downloads>
[df5]: <https://www.php.net/downloads.php>
[df6]: <https://www.apachefriends.org/download.html>
[df7]: <https://getcomposer.org/download>
   
