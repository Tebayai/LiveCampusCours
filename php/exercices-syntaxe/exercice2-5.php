<?php
// Exercice 2.5 : Les conditions et le HTML
// Voici une couleur comprise par CSS (#000, blue, ...) qui colorera notre texte :
$couleur = "red";
// Et un texte qu'il faudra afficher :
$texte = "Mon texte";

// Choisissez si vous souhaitez colorier votre page ou pas
// en changeant cette valeur par true ou false
$mettreCouleur = true;

// Créez une condition avec if / else
// - Si $mettreCouleur est définie comme true, utilisez echo pour générer ce code HTML :
// <p style="color: red">Mon texte</p>
// - Si $mettreCouleur est définie comme false, utilisez echo pour générer ce code HTML :
// <p>Mon texte</p>
// Vérifiez que votre code se comporte comme prévu en changeant les valeurs
// des variables $couleur et $texte