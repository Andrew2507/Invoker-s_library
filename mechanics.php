<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="./scripts/index.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="./scripts/root.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Объяснение характеристик - Invoker’s Library</title>
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
            <a href="/index.php" class="sidebar_item">Герои</a>
            <div class="sidebar_item active">Механики</div>
            <a href="/faq.php" class="sidebar_item">О сайте</a>
        </div>

        <div class="rights">© 20<?= date('y') ?> Все права защищены.</div>
    </div>
    <div class="mobile_header"><div class="sidebar_item active">Механики</div></div>
</div>


<div class="global-header"><div class="nav-buttons"><a href="/" class="nav-button active">Механики</a></div></div>
<div class="header">
    <a href="/" class="logo"><div class="icon"></div>Dota2</a>

    <div class="nav-buttons">
        <a href="/" class="nav-button">Герои</a>
        <div class="nav-button active">Механики</div>
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
        <div class="mechanics">
            <div class="alert">
                <div class="title">Механики</div>
                <div class="description">Механика Является Внутренней Работой Dota 2. Следующий Список Представляет Темы Механики. Нажмите На Каждую Тему Для Просмотра Того Как Они Рассчитываются, Каков Их Принцип Действия, А Также Как Они Взаимодействуют С Другими Элементами Механики.</div>
            </div>

            <div class="scroll-block">

                <div class="arrow-left"></div>

                <div class="blocks">
                    <?php foreach ($config['mechanics'] as $id => $mechanic): ?>
                        <a href="page.php?id=<?= $id?> &type=mechanic">
                            <div class="block" style="background-image: url(<?= $mechanic['BG_image'] ?>)">
                                    <div class="name"><?= $mechanic['name'] ?></div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                    <div class="block" style="background-image: url(/img/mechanics/gold.webp)">
                        11222
                    </div>
                    <div class="block" style="background-image: url(/img/mechanics/gold.webp)">
                        11222
                    </div>
                    <div class="block" style="background-image: url(/img/mechanics/gold.webp)">
                        11222
                    </div>
                    <div class="block" style="background-image: url(/img/mechanics/gold.webp)">
                        11222
                    </div>
                    <div class="block" style="background-image: url(/img/mechanics/gold.webp)">
                        11222
                    </div>
                    <div class="block" style="background-image: url(/img/mechanics/gold.webp)">
                        11222
                    </div>
                </div>

                <div class="arrow-right"></div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const scrollBlock = document.querySelector('.scroll-block');
            const blocksContainer = scrollBlock.querySelector('.blocks');
            const arrowLeft = scrollBlock.querySelector('.arrow-left');
            const arrowRight = scrollBlock.querySelector('.arrow-right');

            function calculateStep() {
                if (window.innerWidth >= 1100) {
                    return (window.innerHeight * 0.3) + 20;
                } else {
                    return (window.innerWidth * 0.2225) + 20;
                }
            }

            let step = calculateStep();

            window.addEventListener('resize', function () { step = calculateStep(); });
            arrowLeft.addEventListener('click', function () { blocksContainer.scrollLeft -= step; });
            arrowRight.addEventListener('click', function () { blocksContainer.scrollLeft += step; });
        });
    </script>


    <div class="footer">
        <div class="line"></div>
        <div class="connection"><div class="icon" style="background-image: url('/img/mail_icon.svg');"></div>avvak_d.mail.ru</div>
        <div class="copyright">Copyright © 20<?= date('y') ?> by Andrey. Все права защищены. Скачивание, копирование, изменение не допускается</div>
    </div>
</div>

<script src="/scripts/index.js" defer>></script>

</body>
</html>