function refresh_heroes(heroes, query, complexity){
    hasVisibleHero = false;
        heroes.forEach((hero) => {
            const searchText = hero.getAttribute("data-search").toLowerCase();
            const att = hero.getAttribute("att").toLowerCase();
            const comp = hero.getAttribute("comp").toLowerCase();
            if ((searchWordInText(query, searchText) && (attributes_choosed.includes(att) || attributes_choosed.length === 0) && complexity.includes(comp))) {
                hero.style.display = "block";
                hasVisibleHero = true;
            } else {
                hero.style.display = "none";
            }
        });
        if (hasVisibleHero) {
            globalMessage.style.display = "none";
        } else {
            globalMessage.style.display = "block";
            console.log("noHero")
        }
}

function normalizeWord(word) {
    return word.replace(/[^a-zA-Zа-яА-ЯёЁ]/g, '').toLowerCase();
}

function searchWordInText(word, text) {
    const normalizedWord = normalizeWord(word);
    const normalizedText = normalizeWord(text);

    return normalizedText.includes(normalizedWord);
}

let attributes_choosed = [];
let hasVisibleHero = false;
let globalMessage;

document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector(".search-input");
    const attributeButtons = document.querySelectorAll(".attribute_icons .icon");
    const complexityButtons = document.querySelectorAll(".complexity_icons .icon");
    globalMessage = document.querySelector(".no-results-global-message");
    let last_complexity = "easy normal hard";
    let selected = false;
    hasVisibleHero = false;
    let lastQuery = "";
    //const globalMessage = document.querySelector(".no-results-global-message");
    //const heroesGrid = document.querySelector(".grid");
    const heroes = document.querySelectorAll(".item");
    refresh_heroes(heroes, lastQuery, last_complexity);

    function toggleAttribute(button) {
        const attribute = button.id;
        if (attributes_choosed.includes(attribute)) {
            attributes_choosed = attributes_choosed.filter(attr => attr !== attribute);
            button.classList.add("selected")
        } else {
            attributes_choosed.push(attribute);
            button.classList.remove("selected")
        }
        refresh_heroes(heroes, lastQuery, last_complexity);
    }

    attributeButtons.forEach(button => {
        button.addEventListener("click", () => {
            toggleAttribute(button);
        });
    });

    function toggleComplexity(button) {
        const complexity = button.id;

        if(last_complexity !== complexity || selected === false) {
            if (complexity === "easy") {
                complexityButtons[0].style = "background-image: url('/img/icons/difficult_selected.webp');";
                complexityButtons[1].style = "background-image: url('/img/icons/difficult.webp');";
                complexityButtons[2].style = "background-image: url('/img/icons/difficult.webp');";
            }
            if (complexity === "normal") {
                complexityButtons[0].style = "background-image: url('/img/icons/difficult_selected.webp');";
                complexityButtons[1].style = "background-image: url('/img/icons/difficult_selected.webp');";
                complexityButtons[2].style = "background-image: url('/img/icons/difficult.webp');";
            }
            if (complexity === "hard") {
                complexityButtons[0].style = "background-image: url('/img/icons/difficult_selected.webp');";
                complexityButtons[1].style = "background-image: url('/img/icons/difficult_selected.webp');";
                complexityButtons[2].style = "background-image: url('/img/icons/difficult_selected.webp');";
            }
            last_complexity = complexity;
            selected = true;
            refresh_heroes(heroes, lastQuery, complexity);
        }
        else{
            complexityButtons[0].style = "background-image: url('/img/icons/difficult.webp');";
            complexityButtons[1].style = "background-image: url('/img/icons/difficult.webp');";
            complexityButtons[2].style = "background-image: url('/img/icons/difficult.webp');";
            selected = false;
            last_complexity = "easy normal hard";
            refresh_heroes(heroes, lastQuery, last_complexity);
        }
    }

    complexityButtons.forEach(button => {
        button.addEventListener("click", () => {
            toggleComplexity(button);
        });
    });

    if (searchInput) {
        searchInput.addEventListener("input", () => {
            const query = searchInput.value.toLowerCase();
            if (query === lastQuery && query !== "" && query !== '') return;

            lastQuery = query;
            refresh_heroes(heroes, query, last_complexity);
        });
    }
});
