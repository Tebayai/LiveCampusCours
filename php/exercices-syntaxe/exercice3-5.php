<?php
// Exercice 3.5 : Les boucles (foreach) et le HTML

// Voici un tableau indexé :
$tableauTextes = [
    "Paragraphe 1 : Bonjour les amis", 
    "Paragraphe 2 : Comment ça va ?", 
    "Paragraphe 3 : Moi ça va", 
    "Paragraphe 4 : Je n'ai toujours pas d'inspiration"
];
// Les différentes cases de ce tableau sont accessibles de cette manière :
// $tableauTextes[0] : Renvoie "Paragraphe 1 : Bonjour les amis"
// $tableauTextes[1] : Renvoie "Paragraphe 2 : Comment ça va ?"
// $tableauTextes[2] : Renvoie "Paragraphe 3 : Moi ça va"
// $tableauTextes[3] : Renvoie "Paragraphe 4 : Je n'ai toujours pas d'inspiration"

// Créez une boucle (foreach) et "echo" pour créer le code HTML
// suivant :
// <p>Paragraphe 1 : Bonjour les amis</p>
// <p>Paragraphe 2 : Comment ça va ?</p>
// <p>Paragraphe 3 : Moi ça va</p>
// <p>Paragraphe 4 : Je n'ai toujours pas d'inspiration</p>
// -> Pour rappel : foreach($tableau as $valeur)