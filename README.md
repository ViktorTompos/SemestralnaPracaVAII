# ArenaManager

Viktor Tompoš

Študijná skupina 5ZYI32

## Stručný opis projektu
ArenaManager je webová aplikácia, ktorá slúži ako portál pre amatérske a polo-profesionálne e-športové turnaje.
Organizátori turnajov všetko riešia ručne a cez sociálne siete (oznamovanie turnaja, zbieranie prihlášok, zapisovanie výsledkov) a hráči a tímy nemajú jedno prehľadné miesto, kde by našli, aké turnaje sa kedy a kde konajú.
Aplikácia zhromažďuje turnaje na jednom mieste.
Návštevník vidí zoznam nadchádzajúcich turnajov (názov, hra, dátum, miesto) a môže ich filtrovať.
Prihlásený hráč si môže vytvoriť tím alebo požiadať o vstup do existujúceho a kapitán tímu môže tím prihlásiť na turnaj.
Organizátor turnaje vytvára, schvaľuje prihlášky tímov, zverejňuje oznamy a zapisuje výsledky.
Aplikácia je určená hráčom, tímom a organizátorom turnajov.
Je vypracovaná ako semestrálna práca z predmetu VAII v jazyku PHP s frameworkom VAJKO a architektúrou MVC.

## Role v projekte
- **Návštevník (neprihlásený)**: môže si prezerať zoznam turnajov, detail turnaja, zoznam tímov a výsledky. Nemôže nič pridávať ani upravovať. Môže sa zaregistrovať alebo prihlásiť
- **Používateľ (prihlásený)**: môže všetko čo návštevník, ale zároveň si môže vytvoriť tím alebo požiadať o vstup do tímu a upravovať si svoj profil. 
Ak je kapitánom tímu, môže tím upravovať, schvalovať žiadosti o vstup, odstranovať členov a prihlásiť tím na turnaj.
Cudzie tímy upravovať nemôže
- **Administrátor (organizátor)**: spravuje turnaje (vytvára, maže, upravuje), schvaľuje alebo zamieta prihlášky tímov na turnaj, zverejňuje oznamy ku turnajom a zapisuje si výsledky
Môže zmazať nevhodný obsah
- Rola je v databáze uložená ako stĺpec pri použivateľovi. Kapitán v tíme je uložený pri členstve tímu, nie ako samostatná globálna rola

## Prípady použitia podľa rolí
**Návštevník**
- otvorí úvodnú stránku a vidí najbližšie turnaje,
- vyhľadá turnaj a vyfiltruje ho podľa hry alebo dátumu,
- otvorí detail turnaja a pozrie si informácie, prihlásené tímy, oznamy a výsledky
- zaregistruje sa a prihlási.

**Používateľ**
- upraví svoj profil (prezývka, vek),
- vytvorí si vlastný tím a nahrá všetky informácie o ňom (meno tímu, logo, hlavná hra),
- ako hráč pošle žiadosť o vstup do existujúceho tímu,
- ako hráč si pozrie stav svojich žiadostí o vstup,
- ako kapitán schváli alebo zamietne žiadosť o vstup,
- ako kapitán odstráni člena z tímu alebo tím upraví či zmaže,
- ako kapitán prihlási tím na turnaj,
- odhlási sa.

**Administrátor**
- vytvorí turnaj vrátane banneru, hry, dátumu, miesta a deadline pre prihlášky,
- upraví alebo zmaže turnaj,
- schváli alebo zamietne prihlášku tímu na turnaj,
- zverejní oznam k turnaju (napr. zmena času),
- zapíše výsledné umiestnenie tímov po skončení turnaja,
- zmaže nevhodný tím (napr. s nevhodným názvom alebo logom)

## Plánované entity
- **User:** účet v systéme. <br>
Atribúty: id, prezývka, email, hash hesla, vek, rola, dátum registrácie.
- **Game:** hra, v ktorej sa turnaje hrajú. <br>
Atribúty: id, názov.
- **Tournament:** samotný turnaj. <br>
Atribúty: id, názov, popis, id hry, dátum začiatku, uzávierka prihlášok, miesto (alebo online), maximálny počet tímov, odmena, banner (cesta k súboru), id organizátora.
- **Team:** tím. <br> 
Atribúty: id, názov, popis, id hry, logo (cesta k súboru), dátum vytvorenia.
- **Announcement:** oznam organizátora k turnaju. <br>
Atribúty: id, id turnaja, id autora, nadpis, text, dátum.
- **TeamMember (spojovacia tabuľka):** členstvo hráča v tíme. <br>
Atribúty: id tímu, id používateľa, pozícia, rola v tíme (kapitán alebo člen), dátum vstupu.
- **JoinRequest:** žiadosť hráča o vstup do tímu. <br>
Atribúty: id, id používateľa, id tímu, stav (čaká, schválená, zamietnutá), dátum.
- **Registration (spojovacia tabuľka):** prihláška tímu na turnaj. <br>
Atributy: id turnaja, id tímu, stav (čaká, schválená, zamietnutá), umiestnenie, dátum prihlásenia.

Tímy nemajú vlastné tabuľky. Každý tím je len riadok v tabuľke Team a jeho členovia sú riadky v tabuľke TeamMember.
## Vzťahy medzi entitami
- **Game 1:N Tournament** - pre jednu hru sa koná viac turnajov, každý turnaj patrí jednej hre.
- **Game 1:N Team** - tím hrá jednu hru, pre jednu hru existuje viac tímov.
- **User (admin) 1:N Tournament** - organizátor vytvorí viac turnajov.
- **User (admin) 1:N Announcement** - organizátor napíše viac oznamov.
- **Tournament 1:N Announcement** - turnaj môže mať viac oznamov.
- **User M:N Team** - hráč môže byť v tíme (alebo vo viacerých tímoch) a tím má viac hráčov. Vzťah je cez tabuľku TeamMember.
- **Tournament M:N Team** - na turnaj sa prihlási viac tímov a tím sa môže prihlásiť na viac turnajov. Vzťah je cez tabuľku Registration.
- **User 1:N JoinRequest a Team 1:N JoinRequest** - hráč môže poslať viac žiadostí a tím môže dostať viac žiadostí.

## Hlavné stránky aplikácie
1. **Úvodná stránka a zoznam turnajov** - najbližšie turnaje (názov, hra, dátum, miesto), vyhľadávanie, filtrovanie podľa hry a stránkovanie.
2. **Detail turnaja** - informácie o turnaji, prihlásené tímy, oznamy, výsledky a tlačidlo na prihlásenie tímu.
3. **Zoznam tímov a detail tímu** - zoznam tímov, súpiska a tlačidlo „Požiadať o vstup“.
4. **Môj tím** - vytvorenie a správa tímu pre kapitána: úprava tímu a loga, zoznam členov s odstránením, žiadosti o vstup.
5. **Správa turnajov (admin)** - tabuľka turnajov s pridaním, úpravou, mazaním a nahrávaním banneru a pridávanie oznamov.
6. **Správa prihlášok (admin)** - zoznam prihlášok tímov na turnaje so schvaľovaním a zamietaním, zapisovanie výsledného umiestnenia.
7. **Profil používateľa** - úprava profilu a prehľad stavu vlastných žiadostí o vstup.
8. **Registrácia a prihlásenie** - formuláre na vytvorenie účtu a prihlásenie.

## Rozdelenie funkcionality
**Základné funkcie**
- registrácia, prihlásenie a odhlásenie s bezpečným ukladaním hesiel,
- roly (návštevník, používateľ, admin) a kontrola oprávnení (napr. kapitán upravuje len svoj tím),
- CRUD (Create, Read, Update, Delete) nad turnajmi (admin) vrátane nahrávania banneru,
- CRUD nad tímami (používateľ) vrátane nahrávania loga, administrátor môže zmazať nevhodný tím,
- žiadosť o vstup do tímu, jej schválenie alebo zamietnutie kapitánom a odstránenie člena,
- úprava profilu a prehľad stavu žiadostí o vstup,
- prihlásenie tímu na turnaj (len kapitán, len pred uzávierkou, len na turnaj hry ktorú hrá, bez duplicitnej prihlášky, s ohľadom na kapacitu),
- schvaľovanie prihlášok organizátorom,
- oznamy k turnajom,
- zapísanie výsledného umiestnenia tímov po skončení turnaja,
- úvodná stránka s najbližšími turnajmi,
- filtrovanie, vyhľadávanie a stránkovanie zoznamu turnajov cez AJAX,
- schvaľovanie prihlášok priamo v tabuľke cez AJAX,
- kontrola vstupov na strane klienta aj servera a ochrana pred SQL Injection,
- responzívny dizajn,
- spustenie v Dockeri s importom ukážkových dát.

**Rozšírujúce funkcie**
- zápasy turnaja zadávané ručne (tabuľka Match),
- automatické generovanie turnajových pavúkov a skupín,
- správy medzi tímami (jednoduchá schránka správ, neskôr chat),
- pozvánky do tímu od kapitána,
- štatistiky hráčov a tímov,
- samostatná rola organizátora, ktorý spravuje len svoje turnaje,
- prepojenie profilu s externými hernými účtami,
- externé API (napr. údaje o hrách).