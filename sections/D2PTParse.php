<?php

set_time_limit(120);

if (isset($_POST['heroName'])) {
    $heroName = escapeshellarg($_POST['heroName']);

    $command = "node /var/www/avvak_ru_usr/data/www/avvak.ru/scripts/D2PTParser.js $heroName";

    $output = shell_exec($command);

    echo $output;
} else {
    echo "Имя героя не было передано.";
}