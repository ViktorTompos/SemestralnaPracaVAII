<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Tournament[] $tournaments */
?>

<div class="container">
    <h1>Turnaje</h1>

    <p>
        <a href="<?= $link->url('tournament.create') ?>" class="btn">Pridať turnaj</a>
    </p>

    <?php if (count($tournaments) == 0) { ?>
        <p>Zatiaľ nie sú pridané žiadne turnaje.</p>
    <?php } else { ?>
        <div class="tournaments-list">
            <table class="tournaments-table">
                <thead>
                <tr>
                    <th>Názov</th>
                    <th>Hra</th>
                    <th>Začiatok</th>
                    <th>Miesto</th>
                    <th>Max. tímov</th>
                    <th>Odmena</th>
                    <th>Akcie</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tournaments as $tournament) { ?>
                    <tr>
                        <!-- e je jedna z ochran pred XSS aby sa nespustali skripty kedze to je formular -->
                        <td><?= e($tournament->getName()) ?></td>
                        <td><?= e($tournament->getGame()) ?></td>
                        <td><?= e(date('d.m.Y', strtotime($tournament->getStartDate()))) ?></td>
                        <td><?= e($tournament->getLocation()) ?></td>
                        <td><?= e($tournament->getMaxTeams()) ?></td>
                        <td><?= e($tournament->getPrize()) ?> €</td>
                        <td class="tournaments-actions">
                            <a href="<?= $link->url('tournament.edit', ['id' => $tournament->getId()]) ?>"
                               class="btn">Upraviť</a>
                            <form action="<?= $link->url('tournament.delete') ?>" method="post">
                                <input type="hidden" name="id" value="<?= e($tournament->getId()) ?>">
                                <button type="submit" class="btn">Zmazať</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>
