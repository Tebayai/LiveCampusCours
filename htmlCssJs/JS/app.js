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


