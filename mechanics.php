<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./scripts/index.css">
    <link rel="stylesheet" href="./scripts/root.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Объяснение характеристик - Invoker’s Library</title>
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

            <label class="switch">
                <input type="checkbox" id="themeSwitcher">
                <span class="slider round"></span>
            </label>
        </div>

        <div class="sidebar_items">
            <a href="/index.php" class="sidebar_item">Герои</a>
            <a class="sidebar_item active">Механики</a>
            <a href="/faq.php" class="sidebar_item">О сайте</a>
<!--            <a href="/report.php" class="sidebar_item">Сообщить об ошибке</a>-->
        </div>

        <div class="rights">© 20<?= date('y') ?> Все права защищены.</div>
    </div>
    <div class="mobile_header"><a class="sidebar_item active">Механики</a></div>
</div>


<div class="global-header"><div class="nav-buttons"><a href="/" class="nav-button active">Механики</a></div></div>
<div class="header">
    <a href="/" class="logo"><div class="icon"></div>Dota2</a>

    <div class="nav-buttons">
        <a href="/" class="nav-button">Герои</a>
        <a class="nav-button active">Механики</a>
        <a href="/faq.php" class="nav-button">О сайте</a>
<!--        <a href="/report.php" class="nav-button">Сообщить об ошибке</a>-->
    </div>

    <label class="switch">
        <input type="checkbox" id="themeSwitcher">
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
                                    <div class="blur"></div>
                                    <div class="name"><?= $mechanic['name'] ?></div>
                            </div>
                        </a>
                    <?php endforeach; ?>
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
        <div class="copyright">Copyright © 20<?= date('y') ?> by Andrey. Все права защищены. Скачивание, копирование, изменение не допускается</div>
    </div>
</div>

<script src="/scripts/index.js"></script>

</body>
</html>