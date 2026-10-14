const potions = 23;
const party = ["Lina", "Thorg", "Milo", "Nyx"];

function distributePotions(potions, party) {
    const potionsPerMember = Math.floor(potions / party.length);
    const leftovers = potions % party.length;
    const number = {};

    for (const member of party) {
        number[member] = potionsPerMember;
    }

    number.leftovers = leftovers;
    return number;
}
console.log(distributePotions(potions, party));
/* Attendu :
{
    Lina: 5,
    Thorg: 5,
    Milo: 5,
    Nyx: 5,
    leftovers: 3
}
*/