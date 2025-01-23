document.addEventListener("DOMContentLoaded", function () {
    const openMenus = document.querySelectorAll('.open_menu');
    const menu = document.querySelector('.sidebar');

    openMenus.forEach(openMenu => {
        openMenu.addEventListener('click', () => {
            if (openMenu.classList.contains('open')) {
                openMenu.classList.remove('open');
                menu.classList.remove('active');
            } else {
                openMenu.classList.add('open');
                menu.classList.add('active');
            }
        });
    });

    const root = document.documentElement;
    const themeSwitchers = document.querySelectorAll("#themeSwitcher");

    const isSystemDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
    const userTheme = localStorage.getItem("theme");

    if (userTheme) {
        root.classList.toggle("light-theme", userTheme === "light");
        themeSwitchers.forEach(themeSwitcher => {
            themeSwitcher.checked = userTheme === "dark";
        });
    } else {
        root.classList.toggle("light-theme", !isSystemDark);
        themeSwitchers.forEach(themeSwitcher => {
            themeSwitcher.checked = isSystemDark;
        });
    }

    themeSwitchers.forEach(themeSwitcher => {
        themeSwitcher.addEventListener("change", function () {
            if (this.checked) {
                root.classList.remove("light-theme");
                localStorage.setItem("theme", "dark");
            } else {
                root.classList.add("light-theme");
                localStorage.setItem("theme", "light");
            }
        });
    });
});
