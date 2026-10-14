const traps = [
    { id: 1, active: true },
    { id: 2, active: false },
    { id: 3, active: true },
    { id: 4, active: false },
    { id: 5, active: true },
    { id: 6, active: true },
    { id: 7, active: false },
    { id: 8, active: false },
    { id: 9, active: true },
    { id: 10, active: false },
    { id: 11, active: true },
    { id: 12, active: true }
];

// Ton code ici
function getActiveTraps(traps) {
    return traps.filter(trap => trap.active);
}

console.log(getActiveTraps(traps));
// Attendu : tableau contenant tous les pièges avec active: true (7 éléments ici)