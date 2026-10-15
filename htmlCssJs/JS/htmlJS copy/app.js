// Sélectionner les éléments à modifier et ajouter la classe CSS lors du clic

document.addEventListener("DOMContentLoaded", () => {
    const paragraphs = document.querySelectorAll("p");
    const button = document.querySelector("button");

    button.addEventListener("click", () => {
        paragraphs.forEach(paragraph => {
            paragraph.classList.add("highlight");
        });
    });
});