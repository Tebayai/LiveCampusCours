const housesContainer = document.querySelector("#houses-container");
const detailsContainer = document.querySelector("#details");

fetch("https://anapioficeandfire.com/api/houses")
    .then(response => {
        if(!response.ok){
            throw new Error("Erreur")
        }
        return response.json();
    })
    .then(data => {
        data.forEach(item => {
            const house = document.createElement("div");
            house.textContent = item.name;
            house.classList.add("house");
            house.addEventListener("click",() => {
                detailsContainer.innerHTML = "";
                const lordX = document.createElement("p");
                const membersX = document.createElement("p");
                detailsContainer.append(lordX, membersX);

                if(item.currentLord){
                    lordX.textContent = "Seigneur : ";
                    fetch(item.currentLord)
                        .then(response => response.json())
                        .then(lord => {
                            const lordName = lord.name || "Inconnu";
                            lordX.textContent = "Seigneur : " + lordName;
                        })
                        .catch(error => {
                            console.log("Erreur :", error)
                        });
                } else {
                    lordX.textContent = "Seigneur : aucun";
                }
                if(item.swornMembers.length === 0){
                    membersX.textContent = "Aucun vassal";
                } else {
                    membersX.textContent = "Vassaux : chargement...";
                    Promise.all(item.swornMembers.map(url => fetch(url).then(response => response.json())))
                        .then(members => {
                            const names = members.map(member => member.name);
                            membersX.textContent = "Vassaux : " + names.join(", ");
                        })
                        .catch(error => {
                            console.log("Erreur :", error)
                        })
                }
            });
            housesContainer.append(house);
        });
    })
    .catch(error => {
        console.log("Erreur :", error)
    })