document.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll(".router-link");

    window.addEventListener("load", (event) => {
        const currentPage = window.location.href.split('&section=')[1];
        console.log(currentPage);
        if (currentPage === "description" || currentPage === undefined) {
            links.forEach(l => {
                if (l.id === "router1") {
                    l.classList.add("active");
                } else {
                    l.classList.remove("active")
                }
            });
        }
        if (currentPage === "abilities") {
            links.forEach(l => {
                if (l.id === "router2") {
                    l.classList.add("active");
                } else {
                    l.classList.remove("active")
                }
            });
        }
        if (currentPage === "aghanims") {
            links.forEach(l => {
                if (l.id === "router3") {
                    l.classList.add("active");
                } else {
                    l.classList.remove("active")
                }
            });
        }
        if (currentPage === "stats") {
            links.forEach(l => {
                if (l.id === "router4") {
                    l.classList.add("active");
                } else {
                    l.classList.remove("active")
                }
            });
        }
    });
});
