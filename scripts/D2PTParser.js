const puppeteer = require('puppeteer');

// Получаем имя героя из аргументов командной строки
const heroName = process.argv[2];

if (!heroName) {
    console.error('Имя героя не указано.');
    process.exit(1);
}

function waitForTimeout(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}


(async () => {
    try {
        // Запуск браузера
        const browser = await puppeteer.launch({ headless: true, args: ['--no-sandbox', '--disable-setuid-sandbox'] });
        const page = await browser.newPage();

        // Переход на страницу
        await page.goto('https://dota2protracker.com/meta?mmr=10000&position=all&period=8', {
            waitUntil: 'networkidle2',
            timeout: 60000,
        });

        // Ввод имени героя в поле поиск
        await page.type('.filter.w-full.min-w-\\[300px\\].bg-d2pt-gray-5.focus\\:outline-0.text-white\\/90.p-2.font-semibold.rounded-md', heroName);

        // Ждем обновления данных после поиска
        await waitForTimeout(200);

        // Парсинг данных из таблицы
        const heroData = await page.evaluate(() => {
            const rows = document.querySelectorAll('.border-b.border-solid.border-d2pt-gray-6.grid.grid-cols-10.gap-1.text-xs.bg-d2pt-gray-3.hover\\:bg-d2pt-gray-7.svelte-mb0zhb');
            const data = [];

            rows.forEach(row => {
                const heroNameElement = row.querySelector('a.flex.gap-1.font-normal.text-white.items-center.rounded-md.hover\\:bg-d2pt-gray-5.p-2.text-xs.text-nowrap span');
                const heroName = heroNameElement ? heroNameElement.textContent.trim() : 'Unknown Hero';

                const stats = Array.from(row.querySelectorAll('div.flex.items-center.p-1.flex-col.justify-center.svelte-mb0zhb')).map(stat => stat.textContent.trim());

                data.push({
                    hero: heroName,
                    stats: stats,
                });
            });

            return data;
        });

        console.log(heroData);

        await browser.close();
    } catch (error) {
        console.error('Произошла ошибка:', error);
    }
})();