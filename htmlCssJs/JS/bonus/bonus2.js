const player = { name: "You", hp: 100, atk: 25 };
const enemies = [
    { name: "Shadow1", hp: 30 },
    { name: "Shadow2", hp: 40 },
    { name: "Shadow3", hp: 50 }
];

function fightAll(player, enemies) {
    const log = [];
    let turn = 1;
    while (enemies.some(enemy => enemy.hp > 0)) {
        const target = enemies.find(enemy => enemy.hp > 0);
        target.hp -= player.atk;
        log.push({
            turn: turn,
            attacker: player.name,
            target: target.name,
            damage: player.atk,
            result: target.hp > 0 ? "hit" : "killed"
        });
        turn++;
    }
    return log;
}

const log = fightAll(player, enemies);
console.table(log);

/*
Exemple attendu :
[
  { attacker: "You", target: "Shadow1", damage: 25, result: "hit" },
  { attacker: "You", target: "Shadow1", damage: 25, result: "killed" },
  { attacker: "You", target: "Shadow2", damage: 25, result: "hit" },
  ...
]
*/
