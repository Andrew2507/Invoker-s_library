<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="preload" href="./fonts/ComicSansMS.woff2" as="font" crossorigin="anonymous">
    <link rel="preload" href="./fonts/Garamond.woff2" as="font" crossorigin="anonymous">

    <link rel="preload" href="./scripts/index.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="./scripts/root.css" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Invoker’s Library - справочник по Dota 2</title>
    <meta name="description" content="Современный справочник по Dota 2">
</head>
<body>

<div class="mobile" style="display: none">
    <div class="open_menu">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="sidebar">
        <div class="logo">
            <div class="left"><div class="icon"></div>Dota2</div>

            <label for="theme1Switcher" class="switch">
                <input type="checkbox" id="theme1Switcher">
                <label for="theme1Switcher" style="display: none;"></label>
                <span class="slider round"></span>
            </label>
        </div>

        <div class="sidebar_items">
            <div class="sidebar_item active">Герои</div>
            <a href="/mechanics.php" class="sidebar_item">Механики</a>
            <a href="/faq.php" class="sidebar_item">О сайте</a>
        </div>

        <div class="rights">© 20<?= date('y') ?> Все права защищены.</div>
    </div>
    <div class="mobile_header"><div class="sidebar_item active">Герои</div></div>
</div>

<div class="global-header"></div>
<div class="header">
    <a href="/" class="logo"><div class="icon"></div>Dota2</a>

    <div class="nav-buttons">
        <div class="nav-button active">Герои</div>
        <a href="/mechanics.php" class="nav-button">Механики</a>
        <a href="/faq.php" class="nav-button">О сайте</a>
    </div>

    <label for="themeSwitcher" class="switch">
        <input type="checkbox" id="themeSwitcher">
        <label for="themeSwitcher" style="display: none;"></label>
        <span class="slider round"></span>
    </label>
</div>

<div class="app">
    <div class="content">
        <div class="index">
            <div class="alert">
                <div class="title">ВЫБЕРИТЕ ГЕРОЯ</div>
                <div class="description">Список Героев В Dota 2 Огромен И Безгранично Разнообразен: Здесь Вы Встретите И Магов-Тактиков, И Свирепых Громил, И Хитроумных Негодяев. Их Невероятные Способности И Сокрушительные Ульты Непременно Приведут Вас К Победе.</div>
            </div>

            <div class="search">
                <div class="info">Найди героя</div>

                <div class="group">
                    <div class="name">АТРИБУТЫ</div>

                    <div class="attribute_icons" style="gap: 7px">
                        <div class="icon selected" id="strength" style="background-image: url('/img/icons/item1.webp')"></div>
                        <div class="icon selected" id="agility"  style="background-image: url('/img/icons/item2.webp')"></div>
                        <div class="icon selected" id="intelligence" style="background-image: url('/img/icons/item3.webp')"></div>
                        <div class="icon selected" id="universal" style="background-image: url('/img/icons/item4.webp')"></div>
                    </div>
                </div>

                <div class="group">
                    <div class="name">СЛОЖНОСТЬ</div>

                    <div class="complexity_icons">
                        <div class="icon" id="easy" style="background-image: url('/img/icons/difficult.webp');"></div>
                        <div class="icon" id="normal" style="background-image: url('/img/icons/difficult.webp');"></div>
                        <div class="icon" id="hard" style="background-image: url('/img/icons/difficult.webp');"></div>
                    </div>
                </div>

                <input type="text" class="search-input" name="search" placeholder="поиск...">
            </div>

            <div class="no-results-global-message" style="display: none;">
                Герои, соответствующие вашему запросу, не найдены
            </div>

            <div class="grid" id="heroesGrid">
                <?php foreach ($config['heroes'] as $id => $hero): ?>
                    <?php if (!isset($hero['name'], $hero['Attribute'], $hero['complexity'])) continue; ?>
                    <div class="item" data-search="<?= implode(' ', $hero['search']) ?>" att="<?= $hero['Attribute'] ?>" comp="<?= $hero['complexity'] ?>">
                        <a href="page.php?id=<?= $id?>&type=hero&section=description">
                            <div class="icon" style="background-image: url(<?= $hero['image'] ?>)"></div>
                            <div class="name"><?= $hero['name'] ?></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="line"></div>
        <div class="connection"><div class="icon" style="background-image: url('/img/mail_icon.svg');"></div>avvak_d.mail.ru</div>
        <div class="copyright">Copyright © 20<?= date('y') ?> by Andrey. Все права защищены. Скачивание, копирование, изменение не допускается</div>
    </div>
</div>

<script src="/scripts/index.js" defer></script>
<script src="/scripts/search_heroes.js" defer></script>

</body>
</html>
