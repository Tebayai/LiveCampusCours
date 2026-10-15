const checkForm = document.getElementById("check-form");
const emailInput = document.getElementById("email");
const result = document.getElementById("result");

checkForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const email = emailInput.value.trim().toLowerCase();
    result.innerHTML = "";

    fetch("https://grippy.learn.pierre-godino.com/api/mock/dom-user-base")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Erreur");
            }
            return response.json();
        })
        .then((data) => {
            const user = data.find((item) => item.email.toLowerCase() === email);

            if (user) {
                const name = document.createElement("p");
                const userEmail = document.createElement("p");

                name.textContent = `${user.firstName} ${user.lastName}`;
                userEmail.textContent = user.email;

                result.append(name, userEmail);
            } else {
                const message = document.createElement("p");
                message.textContent = "Rien";
                result.append(message);
            }
        })
        .catch((error) => {
            console.error(error);
        });
});
