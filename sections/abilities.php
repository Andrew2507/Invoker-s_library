<!DOCTYPE html>
<html lang="ru">
<div class="info" style="grid-template-columns: 80% 100%;">
    <div class="main">
        <div class="title">Способности</div>
        <?php foreach($hero['abilities'] as $id => $ability): ?>
            <div class="ability-section">
                <div class="ability-header">
                    <div class="ability-image" style="background-image: url(<?= $ability['img'] ?>)"></div>
                    <div class="ability-name"><?=$ability['name']?></div>
                </div>
                <h3>Описание</h3>
                <div class="ability-text"><?=$ability['description']?></div>
                <h3>Характеристики</h3>
                <div class="stats-block">
                    <?php foreach($ability['stats'] as $stat): ?>
                        <div class="ability-stats"><?= $stat ?></div>
                    <?php endforeach; ?>
                </div>
                <h3>Особенности</h3>
                <div class="ability-notes">
                    <ul>
                        <?php foreach($ability['notes'] as $note): ?>
                            <?php if($note): ?>
                                <li> <?= $note ?> </li>
                            <?php endif ?>
                        <?php endforeach; ?>
                    <ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</html>