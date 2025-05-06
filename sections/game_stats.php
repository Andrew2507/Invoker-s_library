<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/page.php');
?>

<!DOCTYPE html>
<html lang="ru">
<div class="info">
    <div class="main">
        <div class="title">Hi!</div>

        <div class="about" id="about" style = "display: none"><?= $hero['name'] ?></div>

        <div class="loading_and_stats">
            <div class="loading" id="loading">
                <div class="container">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>

            <div class="result" id="result">

            </div>

            <svg width="0" height="0" class="svg">
                <defs>
                    <filter id="uib-jelly-ooze">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur" />
                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="ooze" />
                        <feBlend in="SourceGraphic" in2="ooze" />
                    </filter>
                </defs>
            </svg>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const loading = document.getElementById('loading');
        const heroName = document.getElementById('about').innerText; // Получаем имя героя
        const resultDiv = document.getElementById('result');

        console.log("Имя героя:", heroName);

        // Проверяем, есть ли данные в кеше
        const cachedData = localStorage.getItem('cachedHeroData');
        const cacheTimestamp = localStorage.getItem('cachedHeroDataTimestamp');

        // Если данные в кеше и не прошло 20 минут, проверяем, есть ли информация о текущем герое
        console.log(Date.now() - cacheTimestamp)
        if (cachedData && cacheTimestamp && (Date.now() - cacheTimestamp < 20 * 60 * 1000)) {
            let cachedHeroes;

            try {
                // Пытаемся распарсить данные как массив
                cachedHeroes = JSON.parse(cachedData);

                // Если данные не являются массивом, создаем новый массив
                if (!Array.isArray(cachedHeroes)) {
                    console.warn("Данные в кеше повреждены. Создаем новый массив.");
                    cachedHeroes = [];
                }
            } catch (error) {
                console.error("Ошибка при парсинге данных из кеша:", error);
                cachedHeroes = [];
            }

            // Ищем данные для текущего героя
            const cachedHeroInfo = cachedHeroes.find(hero => hero.heroName === heroName);

            if (cachedHeroInfo) {
                console.log("Данные загружены из кеша");
                resultDiv.innerHTML = cachedHeroInfo.data;
                return;
            }
        }

        console.log("Начало парсинга");

        // Показываем индикатор загрузки
        loading.style.display = 'block';
        resultDiv.innerHTML = '';

        // Отправляем запрос на сервер
        fetch('/sections/D2PTParse.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `heroName=${encodeURIComponent(heroName)}`,
        })
            .then(response => {
                console.log("Ответ получен, статус:", response.status); // Логируем статус ответа
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                console.log("Ответ от сервера:", data); // Логируем ответ
                loading.style.display = 'none';
                resultDiv.innerHTML = data;

                // Получаем текущий кеш
                let cachedHeroes;

                try {
                    cachedHeroes = JSON.parse(localStorage.getItem('cachedHeroData')) || [];
                    if (!Array.isArray(cachedHeroes)) {
                        console.warn("Данные в кеше повреждены. Создаем новый массив.");
                        cachedHeroes = [];
                    }
                } catch (error) {
                    console.error("Ошибка при парсинге данных из кеша:", error);
                    cachedHeroes = [];
                }

                // Ищем индекс текущего героя в кеше
                const heroIndex = cachedHeroes.findIndex(hero => hero.heroName === heroName);

                // Если герой уже есть в кеше, обновляем его данные
                if (heroIndex !== -1) {
                    cachedHeroes[heroIndex].data = data;
                } else {
                    // Если героя нет в кеше, добавляем его
                    cachedHeroes.push({
                        heroName: heroName,
                        data: data,
                    });
                }

                // Сохраняем обновленный кеш
                localStorage.setItem('cachedHeroData', JSON.stringify(cachedHeroes));
                localStorage.setItem('cachedHeroDataTimestamp', Date.now());
            })
            .catch(error => {
                console.error("Ошибка при выполнении запроса:", error); // Логируем ошибку
                loading.style.display = 'none';
                resultDiv.innerHTML = `<p style="color: red;">Произошла ошибка: ${error.message}</p>`;
            });
    });
</script>

</html>