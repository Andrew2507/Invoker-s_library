<!DOCTYPE html>
<html lang="ru">
<div class="info" style="grid-template-columns: 80% 100%;">
    <div class="main">
        <div class="title">Способности</div>
        <?php foreach($hero['aghanims'] as $id => $aghanim): ?>
            <div class="ability-section">
                <div class="ability-header">
                    <div class="ability-image" style="background-image: url(<?= $aghanim['img'] ?>)"></div>
                    <div class="ability-name"><?=$aghanim['name']?></div>
                </div>
                <div class="ability-text"><?=$aghanim['description']?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</html>