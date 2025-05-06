<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="./scripts/index.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="./scripts/root.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>О сайте - Invoker’s Library</title>
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
            <a href="/mechanics.php" class="sidebar_item">Механики</a>
            <div class="sidebar_item active">О сайте</div>
<!--            <a href="/report.php" class="sidebar_item">Сообщить об ошибке</a>-->
        </div>

        <div class="rights">© 20<?= date('y') ?> Все права защищены.</div>
    </div>
    <div class="mobile_header"><div class="sidebar_item active">О сайте</div></div>
</div>

<div class="global-header"><div class="nav-buttons"><a href="/" class="nav-button active">О сайте</a></div></div>
<div class="header">
    <a href="/" class="logo"><div class="icon"></div>Dota2</a>

    <div class="nav-buttons">
        <a href="/" class="nav-button">Герои</a>
        <a href="/mechanics.php" class="nav-button">Механики</a>
        <div class="nav-button active">О сайте</div>
    </div>

    <label for="themeSwitcher" class="switch">
        <input type="checkbox" id="themeSwitcher">
        <label for="themeSwitcher" style="display: none;"></label>
        <span class="slider round"></span>
    </label>
</div>

<div class="app">
    <div class="content">
        <div class="faq">
            <div class="alert">
                <div class="title"><div class="icon"></div>Dota2</div>
                <div class="description">Защищая Этот Проект Можно Расжать Ведь Он Идеален.</div>
            </div>

            <div class="info">
                <div class="name">Над проектом работали:</div>

                <div class="photos">
                    <div class="photo" style="background-image: url('/img/photos/1.webp')"></div>
                    <div class="photo" style="background-image: url('/img/photos/2.webp')"></div>
                    <div class="photo" style="background-image: url('/img/photos/3.webp')"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="line"></div>
        <div class="copyright">Copyright © 20<?= date('y') ?> by Andrey. Все права защищены. Скачивание, копирование, изменение не допускается</div>
    </div>
</div>

<script src="/scripts/index.js" defer>></script>

</body>
</html>