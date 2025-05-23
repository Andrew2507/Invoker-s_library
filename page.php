<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$type = isset($_GET['type']) ? $_GET['type'] : null;
$ishero = $type === "hero";

if ($ishero) {
    $hero = isset($config['heroes'][$id]) ? $config['heroes'][$id] : null;

    if (!$hero) {
        header("index.php");
        exit;
    }
}

else{
    $mechanic = isset($config['mechanics'][$id]) ? $config['mechanics'][$id] : null;

    if (!$mechanic) {
        header("index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="./scripts/index.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="./scripts/root.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title><?= $ishero ? htmlspecialchars($hero['name']) : htmlspecialchars($mechanic['back']) ?></title>
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
            <?php if($ishero): ?>
                <div class="sidebar_item active">Герои</div>
                <a href="/mechanics.php" class="sidebar_item">Механики</a>
            <?php else: ?>
                <a href="/" class="sidebar_item">Герои</a>
                <div class="sidebar_item active">Механики</div>
            <?php endif; ?>
            <a href="/faq.php" class="sidebar_item">О сайте</a>
        </div>

        <div class="rights">© 20<?= date('y') ?> Все права защищены.</div>
    </div>
    <div class="mobile_header">
        <?php if($ishero): ?>
            <div class="sidebar_item active">Герои</div>
        <?php else: ?>
            <div class="sidebar_item active">Механики</div>
        <?php endif; ?>
    </div>
</div>

<div class="global-header"><div class="nav-buttons"><a href="/mechanics.php" class="nav-button active">Механики</a></div></div>
<div class="header">
    <a href="/" class="logo"><div class="icon"></div>Dota2</a>

    <div class="nav-buttons">
        <?php if($ishero): ?>
            <a class="nav-button active">Герои</a>
            <a href="/mechanics.php" class="nav-button">Механики</a>
        <?php else: ?>
            <a href="/" class="nav-button">Герои</a>
            <a class="nav-button active">Механики</a>
        <?php endif; ?>
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
        <div class="hero">
            <div class="head">
                <div class="left">
                    <?php if ($ishero): ?>
                    <div class="image" style="background-image: url('<?= htmlspecialchars($hero['image']) ?>')"></div>
                    <div class="description">
                        <div class="about" id="about"><?= htmlspecialchars($hero['name']) ?></div>
                        <div class="short"><?= htmlspecialchars($hero['short_description']) ?></div>
                    <?php else: ?>
                        <div class="image" style="background-image: url('<?= htmlspecialchars($mechanic['BG_image']) ?>'); aspect-ratio: 1/1; height: 110px"></div>
                        <div class="description" style='height: 110px'>
                            <div class="about"><?= htmlspecialchars($mechanic['name']) ?></div>
                            <div class="short"><?= htmlspecialchars($mechanic['short_description']) ?></div>
<!--                            <div class="args"></div>-->
                    <?php endif; ?>
                        <?php if ($ishero): ?>
                            <div class="args">
                                <div class="group">
                                    <div class="name">Атрибут:</div>
                                    <div class="attribute_icons" style="gap: 7px">
                                        <?php if($hero['Attribute'] == 'strength'): ?>
                                            <div class="icon" style="background-image: url('/img/icons/item1.webp')"></div>
                                        <?php endif; ?>
                                        <?php if($hero['Attribute'] == 'agility'): ?>
                                            <div class="icon" style="background-image: url('/img/icons/item2.webp')"></div>
                                        <?php endif; ?>
                                        <?php if($hero['Attribute'] == 'intelligence'): ?>
                                            <div class="icon" style="background-image: url('/img/icons/item3.webp')"></div>
                                        <?php endif; ?>
                                        <?php if($hero['Attribute'] == 'universal'): ?>
                                            <div class="icon" style="background-image: url('/img/icons/item4.webp')"></div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="group">
                                    <div class="name">Сложность:</div>
                                    <div class="complexity_icons">
                                        <?php if($hero['complexity'] == 'easy'): ?>
                                            <div class="icon" style="background-image: url('/img/icons/difficult_selected.webp');"></div>
                                            <div class="icon" style="background-image: url('/img/icons/difficult.webp');"></div>
                                            <div class="icon" style="background-image: url('/img/icons/difficult.webp');"></div>
                                        <?php endif; ?>
                                        <?php if($hero['complexity'] == 'normal'): ?>
                                            <div class="icon" style="background-image: url('/img/icons/difficult_selected.webp')"></div>
                                            <div class="icon" style="background-image: url('/img/icons/difficult_selected.webp');"></div>
                                            <div class="icon" style="background-image: url('/img/icons/difficult.webp');"></div>
                                        <?php endif; ?>
                                        <?php if($hero['complexity'] == 'hard'): ?>
                                            <div class="icon" style="background-image: url('/img/icons/difficult_selected.webp')"></div>
                                            <div class="icon" style="background-image: url('/img/icons/difficult_selected.webp');"></div>
                                            <div class="icon" style="background-image: url('/img/icons/difficult_selected.webp');"></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($ishero): ?>
                    <a href="index.php" class="button"><div class="icon"></div>К выбору героев</a>
                <?php else: ?>
                    <a href="mechanics.php" class="button"><div class="icon"></div>К выбору механик</a>
                <?php endif; ?>
            </div>

            <?php if($ishero): ?>
                <div class="router">
                    <a href="page.php?id=<?= $id ?>&type=hero&section=description" id="router1" class="router-link">Описание</a>
                    <a href="page.php?id=<?= $id ?>&type=hero&section=abilities" id="router2" class="router-link">Способности</a>
                    <a href="page.php?id=<?= $id ?>&type=hero&section=aghanims" id="router3" class="router-link">Аганимы</a>
                    <a href="page.php?id=<?= $id ?>&type=hero&section=facets" id="router4" class="router-link">Аспекты</a>
                </div>

                <?php
                $section = isset($_GET['section']) ? $_GET['section'] : 'description';
                switch ($section) {
                    case 'description':
                    default:
                        require 'sections/description.php';
                        break;
                    case 'abilities':
                        include 'sections/abilities.php';
                        break;
                    case 'aghanims':
                        include 'sections/aghanims.php';
                        break;
                    case 'facets':
                        include 'sections/facets.php';
                        break;
                }
                ?>
            <?php else: ?>
                <div class="router">
                    <?php foreach($mechanic['sections'] as $i => $section): ?>
                        <button class="router-button <?= ($i == 1) ? "active" : null ?>" id="<?= $i ?>"><?= $section['name'] ?></button>
                    <?php endforeach; ?>
                </div>
                <div class="info" style="grid-template-columns: 100% 0;">
                    <div class="main">
                        <div class="mechanic-section">
                            <!-- Здесь будет динамически добавляться содержимое -->
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="footer">
        <div class="line"></div>
        <div class="connection"><div class="icon" style="background-image: url('/img/mail_icon.svg');"></div>avvak_d.mail.ru</div>
        <div class="copyright">Copyright © 20<?= date('y') ?> by Andrey. Все права защищены. Скачивание, копирование, изменение не допускается</div>
    </div>
</div>

<script src="/scripts/index.js" defer></script>
<script src="scripts/router-link_hundler.js" defer></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const buttons = document.querySelectorAll(".router-button");
        const sectionContainer = document.querySelector(".mechanic-section");
        const sections = <?= json_encode($mechanic['sections']); ?>;

        const loadSectionContent = (sectionId) => {
            if (sections[sectionId]) {
                buttons.forEach(button => button.classList.remove('active'));
                const activeButton = document.getElementById(sectionId);
                if (activeButton) activeButton.classList.add('active');

                const sectionData = sections[sectionId];
                const titles = sectionData['detailed_descriptions']['titles'];
                const texts = sectionData['detailed_descriptions']['texts'];

                sectionContainer.innerHTML = "";

                titles.forEach((title, index) => {
                    const titleElement = document.createElement("div");
                    titleElement.className = "title";
                    titleElement.innerHTML = title;

                    const textElement = document.createElement("div");
                    textElement.className = "mechanic-text";
                    textElement.innerHTML = texts[index] || "";

                    sectionContainer.appendChild(titleElement);
                    sectionContainer.appendChild(textElement);
                });
            } else {
                console.error(`Секция с id ${sectionId} не найдена.`);
            }
        };

        if (buttons.length > 0) {
            const firstButton = buttons[0];
            const firstSectionId = firstButton.id;
            loadSectionContent(firstSectionId);
        }

        buttons.forEach(button => {
            button.addEventListener("click", () => {
                loadSectionContent(button.id);
            });
        });
    });

</script>

</body>
</html>
