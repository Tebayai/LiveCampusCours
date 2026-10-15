const modeSelect = document.getElementById("mode-select");
const jokeButton = document.getElementById("get-joke");
const jokeContainer = document.getElementById("joke-container");

jokeButton.addEventListener("click", () => {
    jokeContainer.innerHTML = "";

    fetch(`https://blague-api.vercel.app/api?mode=${modeSelect.value}`)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Erreur");
            }
            return response.json();
        })
        .then((data) => {
            const question = document.createElement("p");
            const answer = document.createElement("p");

            question.textContent = data.blague;
            answer.textContent = data.reponse;

            jokeContainer.append(question, answer);
        })
        .catch((error) => {
            console.error(error);
        });
});
