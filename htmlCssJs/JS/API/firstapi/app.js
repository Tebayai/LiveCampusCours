const loadUsersButton = document.getElementById("load-users");
const userListUl = document.querySelector("ul");

userListUl.hidden = true;

loadUsersButton.addEventListener("click", () => {
    userListUl.hidden = false;
    userListUl.innerHTML = "";

    fetch("http://grippy.learn.pierre-godino.com/api/mock/dom-users")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Erreur");
            }
            return response.json();
        })
        .then((data) => {
            data.forEach((item) => {
                const newLi = document.createElement("li");
                const email = document.createElement("p");
                const name = document.createElement("p");

                email.textContent = item.email;
                name.textContent = `${item.firstName} ${item.lastName}`;

                newLi.append(email, name);
                userListUl.append(newLi);
            });
        })
        .catch((error) => {
            console.error(error);
        });
});


