/*
Créer une fonction delayedCombat(player, enemies)
Le player est un objet { name, atk, hp }
enemies est un tableau d’objets { name, hp }
Le joueur attaque les ennemis un par un
Chaque attaque doit être espacée d’au moins 1 seconde
Utilise une récursion avec setTimeout pour simuler le déroulement du combat
À chaque attaque :
Affiche dans la console : You attack [enemy name] for [atk] → [HP left]
Si l’ennemi meurt → affiche Enemy [name] defeated
Quand tous les ennemis sont vaincus, affiche All enemies defeated


💡 Ce n’est pas un for avec des setTimeout dedans (sinon tout part en même temps).

Tu dois construire une fonction récursive qui traite un ennemi, puis appelle setTimeout(() => next(), 1000) pour passer au suivant.

L’ordre et le tempo comptent. */

const player = {
    name: "You",
    hp: 100,
    atk: 25
};
const enemies = [
    { name: "Goblin", hp: 20 },
    { name: "Troll", hp: 50 },
    { name: "Necromancer", hp: 40 }
];
function delayedCombat(player, enemies) {

    if(enemies.length === 0) {
        console.log(`Victory`);
        return;
    }

    const enemy = enemies[0];
    enemy.hp -= player.atk;
    console.log(`attack ${enemy.name} dmg ${player.atk} hp enemy : ${enemy.hp - player.atk}`);

    if(enemy.hp <= 0) {
        console.log(`${enemy.name} is dead`);
        enemies.shift();
    }

    setTimeout(() =>{
        delayedCombat(player, enemies);
    }, 1000);
}

delayedCombat(player, enemies);