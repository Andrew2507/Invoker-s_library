<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./scripts/index.css">
    <link rel="stylesheet" href="./scripts/root.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>О сайте - Invoker’s Library</title>
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
            <a href="/mechanics.php" class="sidebar_item">Механики</a>
            <a class="sidebar_item active">О сайте</a>
<!--            <a href="/report.php" class="sidebar_item">Сообщить об ошибке</a>-->
        </div>

        <div class="rights">© 20<?= date('y') ?> Все права защищены.</div>
    </div>
    <div class="mobile_header"><a class="sidebar_item active">О сайте</a></div>
</div>

<div class="global-header"><div class="nav-buttons"><a href="/" class="nav-button active">О сайте</a></div></div>
<div class="header">
    <a href="/" class="logo"><div class="icon"></div>Dota2</a>

    <div class="nav-buttons">
        <a href="/" class="nav-button">Герои</a>
        <a href="/mechanics.php" class="nav-button">Механики</a>
        <a class="nav-button active">О сайте</a>
<!--        <a href="/report.php" class="nav-button">Сообщить об ошибке</a>-->
    </div>

    <label class="switch">
        <input type="checkbox" id="themeSwitcher">
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
                    <div class="photo" style="background-image: url('/img/photos/1.png')"></div>
                    <div class="photo" style="background-image: url('/img/photos/2.png')"></div>
                    <div class="photo" style="background-image: url('/img/photos/3.png')"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="line"></div>
        <div class="copyright">Copyright © 20<?= date('y') ?> by Andrey. Все права защищены. Скачивание, копирование, изменение не допускается</div>
    </div>
</div>

<script src="/scripts/index.js"></script>

</body>
</html>