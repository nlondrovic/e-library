<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute mora biti prihvaćen.',
    'accepted_if' => ':attribute mora biti prihvaćen kada :other je :value.',
    'active_url' => ':attribute nije validan URL.',
    'after' => ':attribute mora biti datum poslije :date.',
    'after_or_equal' => ':attribute mora biti istog datuma ili datuma poslije :date.',
    'alpha' => ':attribute mora samo da sadrži slova.',
    'alpha_dash' => ':attribute mora samo da sadrži slova, brojeve, crtice i donje crte.',
    'alpha_num' => ':attribute mora samo da sadrži slova i brojeve.',
    'array' => ':attribute mora biti niz.',
    'before' => ':attribute mora biti datum prije :date.',
    'before_or_equal' => ':attribute mora biti istog datuma ili datuma prije :date.',
    'between' => [
        'array' => ':attribute mora biti između :min i :max vrijednosti.',
        'file' => ':attribute mora biti izmeđ :min i :max kilobajta.',
        'numeric' => ':attribute mora biti između :min i :max.',
        'string' => ':attribute mora biti između :min i :max karaktera.',
    ],
    'boolean' => ':attribute nije uspio, mora biti tačno ili netačno.',
    'confirmed' => ':attribute potvrda se ne poklapa.',
    'current_password' => 'Neispravna lozinka.',
    'date' => ':attribute nije ispravan datum.',
    'date_equals' => ':attribute mora biti datum jednak :date.',
    'date_format' => ':attribute ne podudara se sa formatom :format.',
    'declined' => ' :attribute mora biti promijenjen.',
    'declined_if' => ':attribute mora biti promijenjen :other je :value.',
    'different' => ':attribute i :other mora biti drugačije.',
    'digits' => ':attribute mora biti :digits cifra.',
    'digits_between' => ':attribute mora biti između :min i :max cifre.',
    'dimensions' => ':attribute iima neispravnu dimenziju slike.',
    'distinct' => ':attribute polje ima duplikat vrijednosti.',
    'doesnt_start_with' => ':attribute moguće je da ne počinje sa jednim od sledećih vrijednosti: :values.',
    'email' => ':attribute mora imati ispravnu email adresu.',
    'ends_with' => ':attribute mora se završavati sa jednom od sledećih vrijednosti: :values.',
    'enum' => 'Izabrani atribut :attribute je neispravan.',
    'exists' => 'Izabrani atribut :attribute je neispravan.',
    'file' => ':attribute mora biti dokument.',
    'filled' => ':attribute polje mora imati vrijednost.',
    'gt' => [
        'array' => ':attribute mora da ima više nego :value vrijednosti.',
        'file' => ':attribute mora biti veći od :value kilobajata.',
        'numeric' => ':attribute mora biti veći od :value.',
        'string' => ':attribute mora biti veći od :value karaktera.',
    ],
    'gte' => [
        'array' => ':attribute mora imati :value vrijednosti ili više.',
        'file' => ':attribute mora biti jednak ili veći od :value kilobajta.',
        'numeric' => ':attribute mora biti jedan ili veći od :value.',
        'string' => ':attribute mora biti jednak ili veći od :value karaktera.',
    ],
    'image' => ':attribute mora biti slika.',
    'in' => 'Selektovani atribut :attribute je neispravan.',
    'in_array' => ':attribute polje ne postoji u :other.',
    'integer' => ':attribute mora biti cijeli broj.',
    'ip' => ':attribute mora imati ispravnu IP adresu.',
    'ipv4' => ':attribute mora imati ispravnu IPv4 adresu.',
    'ipv6' => ':attribute mora imati ispravnu IPv6 adresu.',
    'json' => ':attribute mora biti ispravan JSON string.',
    'lt' => [
        'array' => ':attribute mora imati manje od :value vrijednosti.',
        'file' => ':attribute mora imati manje :value kilobajta.',
        'numeric' => ':attribute mora imati manje od :value.',
        'string' => ':attribute mora imati manje od :value karaktera.',
    ],
    'lte' => [
        'array' => ':attribute ne smije imati više od :value vrijednosti.',
        'file' => ':attribute mora biti manji ili jednak :value kilobajta.',
        'numeric' => ':attribute mora biti manji ili jednak :value.',
        'string' => ':attribute mora biti manji ili jednak od :value karaktera.',
    ],
    'mac_address' => ':attribute mora imati validnu MAC adresu.',
    'max' => [
        'array' => ':attribute ne smije imati više od :max vrijednosti.',
        'file' => ':attribute ne smije biti veći od :max kilobajta.',
        'numeric' => ':attribute ne smije biti veći od :max.',
        'string' => ':attribute ne smije biti veći od :max karaktera.',
    ],
    'mimes' => ':attribute mora biti fajl tipa: :values.',
    'mimetypes' => ':attribute mora biti fajl tipa: :values.',
    'min' => [
        'array' => ':attribute mora imati makar :min vrijednosti.',
        'file' => ':attribute mora biti makar :min kilobajta.',
        'numeric' => ':attribute mora biti makar :min.',
        'string' => ':attribute mora biti makar :min karaktera.',
    ],
    'multiple_of' => ':attribute mora biti višestruko od :value.',
    'not_in' => 'Izabrani atribut :attribute je neispravan.',
    'not_regex' => ':attribute format je neispravan.',
    'numeric' => ':attribute mora biti broj.',
    'password' => [
        'letters' => ':attribute mora sadržati makar jedno slovo.',
        'mixed' => ':attribute mora sadržati makar jedno malo i jedno veliko slovo.',
        'numbers' => ':attribute mora sadržati makar jedan broj.',
        'symbols' => ':attribute mora sadržati makar jedan simbol.',
        'uncompromised' => 'Data :attribute se prikazala zbog ccurenja podataka. Molim Vas izaberite drugu :attribute.',
    ],
    'present' => ':attribute polje mora biti prisutno.',
    'prohibited' => ':attribute polje je zabranjeno.',
    'prohibited_if' => ':attribute polje je zabranjeno kada :other je :value.',
    'prohibited_unless' => ':attribute polje je zabranjeno osim ako :other je u :values.',
    'prohibits' => ':attribute polje zabranjuje :other da bude prisutno.',
    'regex' => ':attribute format je neispravan.',
    'required' => ':attribute polje je obavezno.',
    'required_array_keys' => ':attribute polje mora sadržati unos za: :values.',
    'required_if' => ':attribute polje je obavezno kada :other je :value.',
    'required_unless' => ':attribute polje je potrebno osim ako :other je u :values.',
    'required_with' => ':attribute polje je obavezno kada :values je prisutno.',
    'required_with_all' => ':attribute polj eje obavezno kada :values su prisutni.',
    'required_without' => ':attribute polj eje obavezno kada :values nije prisutno.',
    'required_without_all' => ':attribute polje je obavezno kada nijedno od vrijedonsti :values nisu prisutni.',
    'same' => ':attribute i :other moraju biti podudarni.',
    'size' => [
        'array' => ':attribute mora sadržati :size vrijednosti.',
        'file' => ':attribute mora biti :size kilobajta.',
        'numeric' => ':attribute mora biti :size.',
        'string' => ':attribute mora biti :size karaktera.',
    ],
    'starts_with' => ':attribute mora početi sa jednom od navedenih vrijednosti: :values.',
    'string' => ':attribute mora biti string.',
    'timezone' => ':attribute mora biti ispravna vremenska zona.',
    'unique' => ':attribute je zauzet.',
    'uploaded' => ':attribute nije uspjelo da se otpremi.',
    'url' => ':attribute mora imati ispravan URL.',
    'uuid' => ':attribute mora biti ispravan UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
