<?php
// Exercice 2.2 : Les conditions
// Changez la valeur de la variable ci-dessous par le nombre entier
// de votre choix :
$nombre = 10; // Peut-être 0, -150, 10000... A votre convenance

// Créez une condition avec if / else
// - Si le nombre est positif (supérieur ou égal à 0), affichez le
//   texte "Le nombre est positif"
// - Si le nombre est négatif (inférieur à 0), affichez le texte
//   "Le nombre est négatif"

if($nombre >= 0){
    echo("Le nombre est positif");
}else{
    echo("Le nombre est négatif");
}