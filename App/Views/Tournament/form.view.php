<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Tournament $tournament */
/** @var string|null $error */
?>

<div class="container">
    <!-- ak turnaj ma id, opravujeme existujuci inak pridavame novy-->
    <h1><?= $tournament->getId() === null ? 'Pridať turnaj' : 'Upraviť turnaj' ?></h1>

    <?php if (!empty($error)) { ?>
        <p class="form-error"><?= e($error) ?></p>
    <?php } ?>

    <form action="<?= $link->url('tournament.store') ?>" method="post" class="tournament-form">
        <input type="hidden" name="id" value="<?= e($tournament->getId()) ?>">

        <label for="name">Názov turnaja</label>
        <input type="text" id="name" name="name" maxlength="200" required
               value="<?= e($tournament->getName()) ?>">

        <label for="game">Hra</label>
        <input type="text" id="game" name="game" maxlength="100" required
               value="<?= e($tournament->getGame()) ?>">

        <label for="start_date">Dátum začiatku</label>
        <input type="date" id="start_date" name="start_date" required
               value="<?= e($tournament->getStartDate()) ?>">

        <label for="location">Miesto</label>
        <input type="text" id="location" name="location" maxlength="100" required
               value="<?= e($tournament->getLocation()) ?>">

        <label for="max_teams">Maximálny počet tímov</label>
        <input type="number" id="max_teams" name="max_teams" min="2" required
               value="<?= e($tournament->getMaxTeams()) ?>">

        <label for="prize">Odmena (€)</label>
        <input type="number" id="prize" name="prize" min="0" required
               value="<?= e($tournament->getPrize()) ?>">

        <div class="tournament-form-buttons">
            <button type="submit" class="btn">Uložiť</button>
            <a href="<?= $link->url('tournament.index') ?>" class="btn">Zrušiť</a>
        </div>
    </form>
</div>


