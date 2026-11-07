<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= App\Configuration::APP_NAME ?></title>
    <!-- viewport + description -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Stránka pre semestrálnu prácu">
    <meta name="author" content="Viktor Tompoš">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= $link->asset('css/styl.css') ?>">
</head>
<body>
    <!-- Navigacia -->
    <header>
        <nav class="navbar">
            <!--Logo a nazov-->
            <div class="nav-brand">
                <img src="<?= $link->asset('images/logo.svg') ?>" title="<?= App\Configuration::APP_NAME ?>" alt="ArenaManager Logo">
                <a href="<?= $link->url('home.index') ?>" class="app-title">ArenaManager</a>
            </div>
            <!--Stred teda hlavne menu-->
            <ul class="nav-links">
                <li><a href="<?= $link->url('tournament.index') ?>">Turnaje</a></li>
                <li><a href="#">Tímy</a></li>
                <li><a href="#">Môj tím</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Správa turnajov</a></li>
                <li><a href="#">Správa prihlášok</a></li>
            </ul>
            <!--Prihlasenie registracia-->
            <div class="nav-auth">
                <a href="#" class="btn">Prihlásiť sa</a>
                <a href="#" class="btn">Registrácia</a>
            </div>
        </nav>
    </header>
    <main>
        <?= $contentHTML ?>
    </main>
    <footer>
        <div class="footer-name">
            © ArenaManager - semestrálna práca z predmetu VAII
        </div>
        <div class="footer-contacts">
            <span>Viktor Tompoš</span>
            <span>5ZYI32</span>
        </div>
    </footer>
</body>
</html>
