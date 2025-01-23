<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['level']) || !is_numeric($input['level'])) {
        http_response_code(400);
        echo json_encode(["error" => "Некорректный уровень героя."]);
        exit;
    }

    $heroId = isset($_GET['id']) ? (int)$_GET['id'] : null;
    $level = (int)$input['level'];

    require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

    if (!isset($config['heroes'][$heroId])) {
        http_response_code(404);
        echo json_encode(["error" => "Герой с указанным ID не найден."], $heroId);
        exit;
    }

    $hero = $config['heroes'][$heroId];

    $hero['Level'] = $level;

    if (isset($hero['damage'], $hero['attributes'])) {
        $dmg = &$hero['damage'][1];
        $AS = &$hero['damage'][2];
        $BAT = &$hero['damage'][3];
        $APS = &$hero['damage'][4];
        $AR = &$hero['damage'][5];
        $VIT = &$hero['stats'][1];
        $VIT_B = &$hero['stats'][2];
        $MANA = &$hero['stats'][3];
        $MANA_B = &$hero['stats'][4];
        $ARM = &$hero['defence'][1];
        $MAGRES = &$hero['defence'][2];
        $DMGBLOCK = &$hero['defence'][3];
        $SPEED = &$hero['mobility'][1];
        $R_SPEED = &$hero['mobility'][2];
        $D_VIS = &$hero['mobility'][3];
        $N_VIS = &$hero['mobility'][4];
        foreach ($hero['attributes'] as $key => &$attribute) {
            $attribute['value'] = $attribute['starting_value'] + $attribute['increment'] * ($hero['Level'] - 1);
            if ($attribute['main'] === true && $hero['Attribute'] !== "universal") {
                $dmg['value'] = $dmg['starting_value'] + $attribute['value'];
            }
            if ($attribute['name'] === "Agility") {
                $AS['value'] = $AS['starting_value'] + $attribute['value'];
                $ARM['value'] = $ARM['starting_value'] + $attribute['value'] * 0.17;
            }
            if ($attribute['name'] === "Strength") {
                $VIT['value'] = $VIT['starting_value'] + $attribute['value'] * 22;
                $VIT_B['value'] = $VIT_B['starting_value'] + $attribute['value'] * 0.1;
            }
            if ($attribute['name'] === "Intelligence") {
                $MANA['value'] = $MANA['starting_value'] + $attribute['value'] * 12;
                $MANA_B['value'] = $MANA_B['starting_value'] + $attribute['value'] * 0.05;
                $MAGRES['value'] = $MAGRES['starting_value'] + $attribute['value'] * 0.1;
            }
        }
        $APS['value'] = round((($AS['value'] * 0.01) / $BAT['value']) * 100) / 100;
        $AR['value'] = $AR['starting_value'];
        $SPEED['value'] = $SPEED['starting_value'];
        $R_SPEED['value'] = $R_SPEED['starting_value'];
        $D_VIS['value'] = $D_VIS['starting_value'];
        $N_VIS['value'] = $N_VIS['starting_value'];
        if ($hero['Attribute'] === "universal") {
            $strength = $hero['attributes'][1]['value'];
            $agility = $hero['attributes'][2]['value'];
            $intelligence = $hero['attributes'][3]['value'];
            $dmg['value'] = $dmg['starting_value'] + ($strength + $agility + $intelligence) * 0.7;
        }

        echo json_encode($hero);
        exit;
    }

    http_response_code(405);
    echo json_encode(["error" => "Неверный метод запроса."]);
}
