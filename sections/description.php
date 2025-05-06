<!DOCTYPE html>
<html lang="ru">
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$mechanic = isset($config['mechanics'][$id]) ? $config['mechanics'][$id] : null;
?>
<?php if($ishero): ?>
<div class="info" style="grid-template-columns: 60% 40%;">
    <div class="main">
        <div class="title">Описание</div>
        <div class="description-section">
            <div class="descript-header">
                <div class="descript-name">Позиции</div>
            </div>
            <div class="positions-block">
                <?php foreach($hero['description']['positions'] as $position): ?>
                    <div class="positions"><?= $position ?></div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="description-section">
            <div class="descript-header">
                <div class="descript-name">Роли в игре</div>
            </div>
            <div class="roles-block">
                <?php foreach($hero['description']['roles'] as $role): ?>
                    <div class="roles"><?= $role ?></div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="description-section">
            <div class="descript-header">
                <div class="descript-name">История героя</div>
            </div>
            <div class="history"><?= $hero['description']['history'] ?></div>
        </div>
    </div>
    <div class="characters">
        <div class="chars">Характеристики</div>
        <div class="group">
            <div class="name">Атрибуты</div>
            <div class="args">
                <div class="arg">
                    <div class="icon" style="background-image: url('/img/icons/item1.webp')"></div>
                    <div class="attribute-value"> <?= $hero['attributes'][1]['value'] ?></div>
                    <div class="attribute-increment">+<?= $hero['attributes'][1]['increment'] ?></div>
                </div>
                <div class="arg">
                    <div class="icon" style="background-image: url('/img/icons/item2.webp')"></div>
                    <div class="attribute-value"> <?= $hero['attributes'][2]['value'] ?></div>
                    <div class="attribute-increment">+<?= $hero['attributes'][2]['increment'] ?></div>
                </div>
                <div class="arg">
                    <div class="icon" style="background-image: url('/img/icons/item3.webp')"></div>
                    <div class="attribute-value"> <?= $hero['attributes'][3]['value'] ?></div>
                    <div class="attribute-increment">+<?= $hero['attributes'][3]['increment'] ?></div>
                </div>
            </div>
        </div>
        <div class="group">
            <div class="name">Атака</div>
            <div class="args">
                <div class="arg">
                    <div class="name">Урон: </div>
                    <div class="damage"> <?= $hero['damage'][1]['value'] ?> </div>
                </div>
                <div class="arg">
                    <div class="name">Скорость атаки: </div>
                    <div class="damage"> <?= $hero['damage'][2]['value'] ?> </div>
                </div>
                <div class="arg">
                    <div class="name">Базовое время атаки: </div>
                    <div class="damage"> <?= $hero['damage'][3]['value'] ?> </div>
                </div>
                <div class="arg">
                    <div class="name">Атак в секунду: </div>
                    <div class="damage"> <?= $hero['damage'][4]['value'] ?> </div>
                </div>
                <div class="arg">
                    <div class="name">Дальность атаки: </div>
                    <div class="damage"> <?= $hero['damage'][5]['value'] ?> </div>
                </div>
            </div>
        </div>
        <div class="group">
            <div class="name">Характеристики</div>
            <div class="args">
                <div class="arg">
                    <div class="name">Запас здоровья: </div>
                    <div class="stats"> <?= $hero['stats'][1]['value'] ?> </div>
                    <div class="stats_B"> +<?= $hero['stats'][2]['value'] ?> </div>
                </div>
                <div class="arg">
                    <div class="name">Запас маны: </div>
                    <div class="stats"> <?= $hero['stats'][3]['value'] ?> </div>
                    <div class="stats_B"> +<?= $hero['stats'][4]['value'] ?> </div>
                </div>
            </div>
        </div>
        <div class="group">
            <div class="name">Броня</div>
            <div class="args">
                <div class="arg">
                    <div class="name">Броня: </div>
                    <div class="defence"> <?= $hero['defence'][1]['value'] ?> </div>
                </div>
                <div class="arg">
                    <div class="name">Сопротивление магии: </div>
                    <div class="defence"> <?= $hero['defence'][2]['value'] ?></div>%
                </div>
                <div class="arg">
                    <div class="name">Блок урона: </div>
                    <div class="defence"> <?= $hero['defence'][3]['value'] ?> </div>
                </div>
            </div>
        </div>
        <div class="group">
            <div class="name">Мобильность</div>
            <div class="args">
                <div class="arg">
                    <div class="name">Скорость передвижения: </div>
                    <div class="mobility"> <?= $hero['mobility'][1]['value'] ?> </div>
                </div>
                <div class="arg">
                    <div class="name">Скорость поворота: </div>
                    <div class="mobility"> <?= $hero['mobility'][2]['value'] ?> </div>
                </div>
                <div class="arg">
                    <div class="name">Дальность обзора (день): </div>
                    <div class="mobility"> <?= $hero['mobility'][3]['value'] ?> </div>
                </div>
                <div class="arg">
                    <div class="name">Дальность обзора (ночь): </div>
                    <div class="mobility"> <?= $hero['mobility'][4]['value'] ?> </div>
                </div>
            </div>
        </div>

        <div class="select-group">
            <label for="level-select">Уровень героя:</label>
            <input type="text" class="lvl" placeholder=<?= $hero['Level'] ?>>
            <button class="recalculation">Пересчитать</button>
        </div>
    </div>
</div>

<?php endif; ?>
<script src="/scripts/recalculation.js"></script>
</html>