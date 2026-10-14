const player = { name: "You", hp: 100, atk: 25 };
const enemies = [
    { name: "Shadow1", hp: 30 },
    { name: "Shadow2", hp: 40 },
    { name: "Shadow3", hp: 50 }
];

function fightAll(player, enemies) {
    while (enemies.some(enemy => enemy.hp > 0)) {
        const target = enemies.find(enemy => enemy.hp > 0);
        target.hp -= player.atk;
        if (target.hp > 0) {
        console.log(`${player.name} hits ${target.name} for ${player.atk}. Remaining HP: ${target.hp}`);
        } else {
        console.log(`${player.name} hits ${target.name} for ${player.atk}. ${target.name} is defeated.`);
        }
    }
}

fightAll(player, enemies);
/*
Exemple d'affichage :
You hits Shadow1 for 25. Remaining HP: 5
You hits Shadow1 for 25. Shadow1 is defeated.
You hits Shadow2 for 25. Remaining HP: 15
...
*/

function fightAllWithLog(player, enemies) {
    const log = [];
    while (enemies.some(enemy => enemy.hp > 0)) {
        const target = enemies.find(enemy => enemy.hp > 0);
        target.hp -= player.atk;
        const result = target.hp > 0 ? "hit" : "killed";
        log.push({ attacker: player.name, target: target.name, damage: player.atk, result });
        if (target.hp > 0) {
            console.log(`${player.name} hits ${target.name} for ${player.atk}. Remaining HP: ${target.hp}`);
        } else {
            console.log(`${player.name} hits ${target.name} for ${player.atk}. ${target.name} is defeated.`);
        }
    }
    console.table(log);
    return log;
}