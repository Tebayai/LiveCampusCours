// Objectif : calculer le revenu journalier à partir d'un tarif mensuel et du nombre de jours travaillés

// Données à utiliser :
// Tarif mensuel : 3000 euros
// Jours travaillés dans le mois : 20

// 1. Déclarez les variables nécessaires
const tarifMensuel = 3000;
const joursTravailles = 20;

// 2. Effectuez le calcul du revenu journalier
const revenuJournalier = tarifMensuel / joursTravailles;

// 3. Affichez le résultat dans la console
console.log(`Le revenu journalier est de ${revenuJournalier} euros.`);

// Objectif : calculer le budget hebdomadaire à partir d'un budget mensuel

// Données à utiliser :
// Budget mensuel disponible : 1200 euros
// Hypothèse : le mois compte 4 semaines

// 1. Déclarez les variables nécessaires
const budgetMensuel = 1200;
const semainesParMois = 4;

// 2. Calculez le budget hebdomadaire
const budgetHebdomadaire = budgetMensuel / semainesParMois;

// 3. Affichez le résultat dans la console
console.log(`Le budget hebdomadaire est de ${budgetHebdomadaire} euros.`);

// Objectif : calculer le panier moyen d'un client à partir des données mensuelles

// Données à utiliser :
// Chiffre d'affaires du mois : 45000 euros
// Nombre de commandes : 125

// 1. Déclarez les variables nécessaires
const chiffreAffaires = 45000;
const nombreCommandes = 125;

// 2. Calculez le panier moyen
const panierMoyen = chiffreAffaires / nombreCommandes;

// 3. Affichez le résultat dans la console
console.log(`Le panier moyen est de ${panierMoyen} euros.`);


// Objectif : calculer le prix final d'un produit après application d'une remise

// Données à utiliser :
// Prix du produit : 80 euros
// Remise appliquée : 15 %

// 1. Déclarez les variables nécessaires
const prixProduit = 80;
const remise = 15;

// 2. Calculez le montant de la remise
const montantRemise = (prixProduit * remise) / 100;

// 3. Calculez le prix final
const prixFinal = prixProduit - montantRemise;

// 4. Affichez le résultat dans la console
console.log(`Le prix final après remise est de ${prixFinal} euros.`);


// Objectif : calculer le prix final TTC après remise

// Données à utiliser :
// Prix HT : 100 euros
// TVA : 20 %
// Remise : 10 %

// 1. Déclarez les variables nécessaires
const prixHT = 100;
const tva = 20;
const remiseTTC = 10;

// 2. Calculez le prix TTC (avec TVA)
const prixTTC = prixHT + (prixHT * tva) / 100;

// 3. Calculez le montant de la remise à appliquer
const montantRemiseTTC = (prixTTC * remiseTTC) / 100;

// 4. Calculez le prix final après remise
const prixFinalTTC = prixTTC - montantRemiseTTC;

// 5. Affichez le prix final dans la console
console.log(`Le prix final TTC après remise est de ${prixFinalTTC} euros.`);


// Déclarez vos variables ici
// Exemple de notes à utiliser :
// note1 = 17
// note2 = 15

// Calculez la moyenne
const note1 = 17;
const note2 = 15;
const moyenne = (note1 + note2) / 2;

// Affichez le bon message selon la moyenne obtenue
switch (true) {
    case (moyenne >= 16):
        console.log('Excellent');
        break;
    case (moyenne >= 14):
        console.log('Bien');
        break;
    case (moyenne >= 10):
        console.log('Passable');
        break;
    default:
        console.log('Insuffisant');
        break;
}

// Données de la personne :
// age = 10
// taille = 135

// Stocker les données dans des variables
const age = 10;
const taille = 135;

// Tester les conditions d'accès et afficher le bon message
if (age < 12 && taille < 140) {
    console.log('Accès refusé : âge et taille insuffisants')
} else if (age < 12){
    console.log('Accès refusé : trop jeune ');
} else if (taille < 140){
    console.log('Accès refusé : taille insuffisante');
}else{
    console.log('Accès autorisé');
}


// Code saisi par l'utilisateur :
// codeSaisi = "Super2025"

// Stockez ce code dans une variable
const codeSaisi = "Super2025";

// Comparez-le à la valeur attendue ("SUPER2025") de façon stricte
if(codeSaisi === "SUPER2025"){
    console.log('Code valide');
} else {
    console.log('Code invalide');
}

// Affichez un message selon la validité du code

// Montant du panier :
// montantCommande = 28.50

// Stockez ce montant dans une variable
const cartCmd = 50;

// Évaluez les frais selon les tranches définies
if(cartCmd >= 28.50){
    console.log('Livraison gratuite')
} else if(cartCmd >= 30){
    console.log("Livraison à 5 €")
} else{
    console.log('Livraison à 9 €')
}

// Affichez le montant des frais dans la console

// Données du client :
// estAbonne = true
// montantCommande = 120

// Déclarez les variables
const estAbonne = true;
const montantCommande = 120;

// Vérifiez si le client a droit à la réduction
let reduction = 0;
if(estAbonne && montantCommande >= 100){
    reduction = montantCommande * 0.1;
}

// Affichez un message adapté
if(reduction > 0){
    console.log('Réduction appliquée : -10 %');
} else {
    console.log('Réduction non applicable');
}

// Données du candidat :
// age = 22
// experience = 1

// Analyse du profil : conditions multiples selon âge et expérience

// Affichez un message personnalisé dans la console
const ageCandidat = 22;
const experience = 1;

if(ageCandidat < 18){
    console.log('Profil non éligible : âge minimum requis');
} else if(ageCandidat >= 18 && ageCandidat <= 25){
    if(experience > 2){
        console.log('Jeune talent prometteur');
    } else {
        console.log('Profil junior à accompagner');
    }
} else {
    if(experience > 5){
        console.log('Expert confirmé');
    } else {
        console.log('Profil en cours de consolidation');
    }
}

// Donnée client :
// age = 65

// Utilisez une suite de if / else if pour déterminer la tranche tarifaire
const ageConducteur = 65;
if(ageConducteur < 18){
    console.log('Assurance refusée : âge minimum non atteint');
} else if(ageConducteur >= 18 && ageConducteur <= 24){
    console.log('Tarif jeune conducteur : 1200 €/an');
} else if(ageConducteur >= 25 && ageConducteur <= 60){
    console.log('Tarif standard : 850 €/an');
} else {
    console.log('Tarif senior : 950 €/an');
}

// Initialisation
let somme = 0;

// Ajouter ici une boucle for pour parcourir les nombres de 1 à 100
for(let i = 1; i <= 100; i++){
    if(i % 2 !== 0){
        somme += i * i;
    }
}
console.log('Somme des carrés des nombres impairs entre 1 et 100 :', somme);

// Initialisation
let total = 0;
let compteur = 1;

// Ajouter ici une boucle while pour accumuler jusqu’à dépasser 200
while(total <= 200){
    total += compteur;
    compteur++;
}
console.log('compteur :', compteur - 1);

// Initialisation
let totalPair = 0;
let totalImpair = 0;

// Ajouter ici une boucle for de 1 à 30
for(let i = 1; i <= 30; i++){
    if(i % 2 === 0){
        totalPair += i;
    } else {
        totalImpair += i;
    }
}

// Puis afficher le plus grand total à la fin
if(totalPair > totalImpair){
    console.log('Pair plus élevé :', totalPair);
} else if(totalImpair > totalPair){
    console.log('Impair plus élevé :', totalImpair);
} else {
    console.log('égaux :', totalPair);
}



// Initialisation


// Compléter ici la boucle do...while
// Alterner Ping et Pong 5 fois chacun