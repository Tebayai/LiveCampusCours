// Compléter ici pour sélectionner les éléments et gérer l’événement

document.addEventListener("DOMContentLoaded", () => {
    const paragraph = document.querySelector("p");
    const button = document.querySelector("button");

    button.addEventListener("click", () => {
        paragraph.textContent = "message2";
    });
});