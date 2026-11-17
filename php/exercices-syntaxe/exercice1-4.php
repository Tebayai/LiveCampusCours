<?php
// Exercice 1.4 : Variables scalaires et echo
// Voici quelques variables :
$titre = "Mon CV";
$soustitre1 = "Formations";
$contenu1 = "<p><strong>Ma Grande Ecole</strong> : Formation en informatique</p>";
$soustitre2 = "Loisirs";
$contenu2 = "<p>Mes loisirs</p>";

// Utilisez "echo" et les variables ci-dessus pour créer le code HTML
// suivant :
//  <h1>Mon CV</h1>
//  <h2>Formations</h2>
//  <p><strong>Ma Grande Ecole</strong> : Formation en informatique</p>
//  <h2>Loisirs</h2>
//  <p>Mes loisirs</p>

echo "<h1>$titre</h1>";
echo "<h2>$soustitre1</h2>";
echo "$contenu1";
echo "<h2>$soustitre2</h2>";
echo "$contenu2";