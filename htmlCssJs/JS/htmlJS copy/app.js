document.addEventListener("DOMContentLoaded", () => {
    const taches = document.getElementById("taches");

    taches.addEventListener("click", (event) => {
        const bouton = event.target.closest("button");
        const li = bouton.closest("li");

        if (li) {
            taches.removeChild(li);
        }
    });
});