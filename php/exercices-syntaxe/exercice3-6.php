<?php
// Exercice 3.5 : Les boucles (foreach) et le HTML

// Voici un tableau associatif :
// Les clefs représentent des couleurs comprises par CSS
// Les valeurs représentent un texte à afficher
$tableauTextes = [
    "red" => "Force rouge !", 
    "blue" => "Force bleue !", 
    "green" => "Force verte !"
];
// Les différentes cases de ce tableau sont accessibles de cette manière :
// $tableauTextes["red"] : Renvoie "Force rouge !"
// $tableauTextes["blue"] : Renvoie "Force bleue !"
// $tableauTextes["green"] : Renvoie "Force verte !"

// Créez une boucle (foreach) et "echo" pour créer le code HTML
// suivant :
// <p style="color: red">Force rouge !</p>
// <p style="color: blue">Force bleue !</p>
// <p style="color: green">Force verte !</p>