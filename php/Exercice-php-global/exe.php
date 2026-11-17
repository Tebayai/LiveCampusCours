<?php
require_once 'fonctions.php';




//Echange les valeurs de deux variables
$a = input("a :");
$b = input("b :");
$temp = $a;
$a = $b;
$b = $temp;
echo("Après échange : a = $a, b = $b\n");

//Demande nom et prénom
$nom = input("Entrez votre nom :");
$prenom = input("Entrez votre prénom :");
echo("Bonjour $prenom $nom\n");

//Carré de deux nombres
$a = input("a :");
$b = input("b :");
$res = ($a + $b)**2;
echo("Le résultat de ($a + $b)^2 est $res\n");

//2 nombres et afficher le plus grand
$a = input("a :");
$b = input("b :");
if ($a > $b) {
    echo("Le plus grand est $a\n");
} elseif ($b > $a) {
    echo("Le plus grand est $b\n");
} else {
    echo("Les deux nombres sont égaux\n");
}

//Nb de cartes de visite et calc le cout O.4 de 0 a 100 O.3 de 100 a 200 et O.2 au delà
$nb = input("Nombre de cartes de visite :");
if ($nb <= 100) {
    $cout = $nb * 0.4;
} elseif ($nb <= 200) {
    $cout = $nb * 0.3;
} else {
    $cout = $nb * 0.2;
}
echo("Le coût total est $cout\n");

// Entier entre 1 et 9 afficher la table de multiplication
$n = input("Entrez un entier entre 1 et 9 :");
if ($n >= 1 && $n <= 9) {
    for ($i = 1; $i <= 10; $i++) {
        echo("$n x $i = " . ($n * $i) . "\n");
    }
} else {
    echo("Nombre invalide\n");
}

//Somme nb 1 a entier x
$n = input("Entre entier ");
$rez = 0;
for ($i = 1; $i <= $n; $i++){
    $rez += $i;
}
echo("$rez\n");

//FizzBuzz
for ($i = 1; $i < 100; $i++){
    if ($i %3 == 0){
        echo("Fizz ");
    }else if($i %5 == 0){
        echo("Buzz ");
    }else if($i %15 == 0){
        echo("FizzBuzz ");
    }else if($i %10 == 9){
        echo("$i Bonus ");
    }else{
        echo("$i ");
    }
}

//Afficher les tables de multiplication de 1 à 9
for ($i = 1; $i <= 9; $i++){
    for ($j = 1; $j <= 10; $j++){
        echo("$i * $j = " . ($i * $j) . " ");
    }
    echo("\n");
}

//N affichage 1 12 123 ...
$n = input("Entrez un entier N :");
for ($i = 1; $i <= $n; $i++){
    for ($j = 1; $j <= $i; $j++){
        echo($j);
    }
    echo("\n");
}

//Algo 10 notes dans un tableau ensuite demander l'index de la note
$notes = [];
for ($i = 0; $i < 10; $i++) {
    $notes[] = input("Entrez la note " . ($i + 1) . " :");
}
$index = input("Entrez l'index de la note souhaitée (0-9) :");
if ($index >= 0 && $index < 10) {
    echo("La note à l'index $index est " . $notes[$index] . "\n");
} else {
    echo("Index invalide\n");
}

//Algo d'avant mais pour 10note dans 3 matières
$matieres = ["x", "y", "z"];
$notes = [];
foreach ($matieres as $matiere) {
    $notes[$matiere] = [];
    for ($i = 0; $i < 10; $i++) {
        $notes[$matiere][] = input("Entrez la note " . ($i + 1) . " pour $matiere :");
    }
}
$matiere = input("Entrez la matière (x, y, z) :");
$index = input("Entrez l'index de la note souhaitée (0-9) :");
if (in_array($matiere, $matieres) && $index >= 0 && $index < 10) {
    echo("La note à l'index $index pour $matiere est " . $notes[$matiere][$index] . "\n");
} else {
    echo("Matière ou index invalide\n");
}
?>