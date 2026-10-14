const inventory = [
    { name: "gem", weight: 3 },
    { name: "bone", weight: 1 },
    { name: "scroll", weight: 2 },
    { name: "orb", weight: 4 },
    { name: "coin", weight: 1 }
];
const targetWeight = 6;

function findTriplets(inventory, targetWeight) {
    const triplets = [];
    for (let i = 0; i < inventory.length - 2; i++) {
        for (let j = i + 1; j < inventory.length - 1; j++) {
            for (let k = j + 1; k < inventory.length; k++) {
                if (inventory[i].weight + inventory[j].weight + inventory[k].weight === targetWeight) {
                    triplets.push([inventory[i], inventory[j], inventory[k]]);
                }
            }
        }
    }
    return triplets;
}

console.log(findTriplets(inventory, targetWeight));

/*
Exemple attendu :
[
    [ { name: "gem", weight: 3 }, { name: "scroll", weight: 2 }, { name: "coin", weight: 1 } ],
    [ { name: "bone", weight: 1 }, { name: "scroll", weight: 2 }, { name: "orb", weight: 4 } ]
]
(ordre flexible, mais pas de doublons inversés)
*/