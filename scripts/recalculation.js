document.addEventListener("DOMContentLoaded", async () => {
    const queryParams = new URLSearchParams(window.location.search);
    const heroId = Number(queryParams.get("id"));
    const attributes_values = document.querySelectorAll(".attribute-value");
    const damage_values = document.querySelectorAll(".damage");
    const stats_values = document.querySelectorAll(".stats");
    const stats_B_values = document.querySelectorAll(".stats_B");
    const defence_values = document.querySelectorAll(".defence");
    const mobility_values = document.querySelectorAll(".mobility");

    if (!heroId || isNaN(heroId)) {
        console.error("ID героя отсутствует или некорректен.");
        alert("Ошибка: ID героя отсутствует.");
        return;
    }

    console.log("Полученный ID героя:", heroId);

    const recalculateButton = document.querySelector(".recalculation");
    const levelInput = document.querySelector(".lvl");
    const attributesContainer = document.querySelector(".group .args");

    const recalculateStats = async () => {
        levelInput.value = parseInt(levelInput.value);
        let level = levelInput.value;
        if (level <= 0) {
            level = 1;
            levelInput.value = 1;
        }
        if (level > 30) {
            level = 30;
            levelInput.value = 30;
        }
        if (level === "NaN") {
            level = 1;
            levelInput.value = null;
        }

        try {
            const response = await fetch(`/sections/recalculate.php?id=${heroId}`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ level: parseInt(level, 10) })
            });

            const responseText = await response.text();
            console.log(JSON.parse(responseText));

            if (response.ok) {
                const result = JSON.parse(responseText);

                Object.keys(result.attributes).forEach((key, index) => {
                    const attribute = result.attributes[key];
                    if (attributes_values[index]) {
                        const New_value = Math.round(attribute.value * 100) / 100
                        attributes_values[index].textContent = New_value;
                    }
                });

                Object.keys(result.damage).forEach((key, index) => {
                    const damage = result.damage[key];
                    if (damage_values[index]) {
                        const New_value = Math.round(damage.value * 100) / 100
                        damage_values[index].textContent = New_value;
                    }
                });

                stats_values.forEach((stat, index) => {
                    const VIT = Math.round(result.stats[1].value * 100) / 100;
                    const MANA = Math.round(result.stats[3].value * 100) / 100;
                    if (index === 0) {
                        stat.textContent = VIT;
                    } else {
                        stat.textContent = MANA;
                    }

                });

                stats_B_values.forEach((stat_B, index) => {
                    const VIT_B = Math.round(result.stats[2].value * 100) / 100;
                    const MANA_B = Math.round(result.stats[4].value * 100) / 100;
                    if (index === 0) {
                        stat_B.textContent = `+${VIT_B}`;
                    } else {
                        stat_B.textContent = `+${MANA_B}`;
                    }
                });

                Object.keys(result.defence).forEach((key, index) => {
                    const defence = result.defence[key];
                    if (defence_values[index]) {
                        const New_value = Math.round(defence.value * 100) / 100
                        defence_values[index].textContent = New_value;
                    }

                });

                Object.keys(result.mobility).forEach((key, index) => {
                    const mobility = result.mobility[key];
                    if (mobility_values[index]) {
                        const New_value = Math.round(mobility.value * 100) / 100
                        mobility_values[index].textContent = New_value;
                    }
                });

            } else {
                console.error("Ошибка сервера:", JSON.parse(responseText));
                alert("Ошибка обновления данных.");
            }
        } catch (err) {
            console.error("Ошибка запроса:", err);
            alert("Не удалось пересчитать значения.");
        }
    };

    recalculateButton.addEventListener("click", recalculateStats);

    await recalculateStats();
});
