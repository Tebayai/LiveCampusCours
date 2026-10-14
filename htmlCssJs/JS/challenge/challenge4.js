const inventory = [
    { name: "bone", weight: 1 },
    { name: "gem", weight: 3 },
    { name: "scroll", weight: 2 },
    { name: "coin", weight: 1 }
];
const limit = 4;
function getValidCombinations(inventory, limit) {
    const combinations = [];
    for (let i = 0; i < inventory.length; i++) {
        for (let j = i + 1; j < inventory.length; j++) {
            if (inventory[i].weight + inventory[j].weight <= limit) {
                combinations.push([inventory[i], inventory[j]]);
            }
        }
    }
    return combinations;
}
console.log(getValidCombinations(inventory, limit));
/* Exemple attendu (ordre flexible) :
[
    [ { name: "bone", weight: 1 }, { name: "gem", weight: 3 } ],
    [ { name: "bone", weight: 1 }, { name: "scroll", weight: 2 } ],
    [ { name: "bone", weight: 1 }, { name: "coin", weight: 1 } ],
    [ { name: "scroll", weight: 2 }, { name: "coin", weight: 1 } ]
]
*/