# GameReviews

Viktor Tompoš

Študijná skupina 5ZYI32

## Stručný opis projektu
GameReviews je webová aplikácia, v ktorej hráči môžu hodnotiť počítačové hry a písať k nim recenzie.
Hráč, ktorý sa rozhoduje, či si hru kúpiť alebo zahrať, často nemá jednoduché a prehľadné miesto, kde by našiel názory iných hráčov.
V aplikácii píšu používatelia recenzie a dávajú hrám hodnotenie priamo na stránke.
Pri každej hre bude vidieť priemerné hodnotenie podľa používateľov aplikácie, zoznam recenzií a žánre, pod ktoré hra spadá.
## Role v projekte
- **Návštevník (neprihlásený)**: môže si prezerať zoznam hier, ich hodnotenie a recenzie. Nemôže však nič pridávať ani upravovať.
- **Používateľ (prihlásený)**: môže všetko čo návštevník, ale zároveň môže písať recenzie a hodnotiť hry.
Svoje recenzie môže upraviť alebo zmazať, ale cudzie recenzie nemôže ani upraviť ani zmazať.
- **Administrátor (admin)**: spravuje katalóg hier (pridáva, upravuje, maže a nahráva obrázky). Môže zmazať nevhodnú recenziu, alebo zmazať účet používateľa.

## Prípady použitia podľa rolí
**Návštevník**
- prezrie si zoznam hier, a vyhľadá si hru podľa názvu,
- vyfiltruje hry podľa žánru alebo hodnotenia,
- otvorí si konkrétnu hru, a prečíta si recenzie,
- zaregistruje sa a prihlási.

**Používateľ**
- napíše recenziu k hre a dá jej hodnotenie,
- upraví alebo zmaže svoju recenziu,
- pozrie si zoznam svojich recenzií vo svojom profile,
- odhlási sa.

**Administrátor**
- pridá novú hru vrátane obrázka, žánrov a popisu,
- upraví údaje o hre alebo hru zmaže,
- vytvorí, upraví alebo zmaže žáner,
- zmaže nevhodnú recenziu,
- spravuje použivateľov (zmena roly, zrušenie účtu).

## Plánované entity
- **User:** účet v systéme. Atribúty: id, prezývka, email, hash hesla, rola, dátum registrácie. Je autorom recenzií.
- **Game:** hra v katalógu. Atribúty: id, názov, popis, rok vydania, obrázok (cesta k súboru), dátum pridania. Jedna hra ma viacero recenzií, a môže patriť do viacerých žánrov.
- **Genre:** kategória hry (RPG, FPS, stratégia...). Atribúty: id, názov. Do jedného žánru bude patriť viacero hier.
- **Review:** názor použivateľa na hru. Atribúty: id, id hry, id použivateľa, hodnotenie, text recenzie, dátum vytvorenia a úpravy. Použivateľ môže napísať k jednej hre len jednu recenziu.
- **GameGenre (asociačná tabuľka):** prepája hry a žánre. Atribúty: id hry, id žánru.
- **Comment:** komentár ku recenzií. Atribúty: id, id recenzie, id použivateľa, text, dátum.

## Vzťahy medzi entitami
- **Game 1:N Review** - hra môže mať viac recenzií, každá recenzia patrí práve k jednej hre.
- **User 1:N Review** - user môže napísať viac recenzií (každú k inej hre).
- **Game M:N Genre** - hra patrí do viacerých žánrov a žáner obsahuje viac hier. Vzťah je cez asociačnú tabuľku GameGenre.
- **Review 1:N Comment** - recenzia môže mať viac komentárov.
- **User 1:N Comment** - použivateľ môže napísať viac komentárov.

## Hlavné stránky aplikácie
1. **Zoznam hier** - katalóg hier s vyhľadávaním, filtrovaním podľa žánru a stránkovaním.
2. **Detail hry** - popis, obrázok, žánre, priemerné hodnotenie a zoznam recenzií. 
3. **Moje recenzie (profil)** - zoznam recenzií prihláseného uživateľa s možnosťou úpravy alebo zmazania.
4. **Správa hier (admin)** - tabuľka hier s pridaním, úpravou, mazaním a nahrávaním obrázkov.
5. **Správa žánrov (admin)** - zoznam žánrov a ich úprava.
6. **Registrácia a prihlásenie** - formulár na vytvorenie účtu.
7. **Rebríček hier** - najlepšie hodnotené hry.
8. **Správa používateľov (admin)** - zoznam používateľov a zmena rolí.

## Rozdelenie funkcionality
**Základné funkcie**
- registrácia, prihlásenie a odhlásenie s bezpečným ukladaním hesiel,
- roly (návštevník, používateľ, admin) a kontrola oprávnení,
- CRUD nad hrami (admin), vrátane nahrávania obrázkov,
- správa žánrov a pridanie viacerých žánrov k hre,
- CRUD nad vlastnými recenziami (používateľ),
- výpočet a zobrazenie priemerného hodnotenia hry,
- filtrovanie, vyhľadávanie a stránkovanie zoznamu hier cez AJAX,
- odoslanie recenzie cez AJAX,
- kontrola vstupov na strane klienta aj servera a ochrana pred SQL Injection,
- responzívny dizajn,
- spustenie v Dockeri s importom ukážkových dát.

**Rozšírujúce funkcie**
- komentáre k recenziám,
- rebríček najlepšie hodnotených hier,
- správa používateľov administrátorom,
- avatar používateľa a rozšírený profil,
- hodnotenie užitočnosti recenzií (páči sa mi, nepáči, pomohla recenzia, nepomohla).