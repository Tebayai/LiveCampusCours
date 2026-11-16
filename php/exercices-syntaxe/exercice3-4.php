<?php
// Exercice 3.4 : Les boucles (foreach)

// Voici un tableau associatif :
$visage = [
    "sourcils" => "froncés",
    "cheveux" => "courts",
    "yeux" => "bleus",
    "taille" => "1m60"
];
// Les différentes cases de ce tableau sont accessibles de cette manière :
// $tableauPrenoms["sourcils"] : Renvoie "froncés"
// $tableauPrenoms["cheveux"] : Renvoie "courts"
// $tableauPrenoms["yeux"] : Renvoie "bleus"
// $tableauPrenoms["taille"] : Renvoie "1m60"

// Créez une boucle (foreach) pour afficher les valeurs séparées
// par un espace
// Rendu attendu : froncés courts bleus 1m60
// -> Pour rappel : foreach($tableau as $valeur)

// Créez une autre boucle (foreach) pour afficher le rendu suivant :
// sourcils:froncés cheveux:courts yeux:bleus taille:1m60
// -> Pour rappel : foreach($tableau as $clef => $valeur)