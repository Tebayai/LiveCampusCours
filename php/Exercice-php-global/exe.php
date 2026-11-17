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

//Demander un nb de cartes de visite et calc le cout O.4 de 0 a 100 O.3 de 100 a 200 et O.2 au delà
$nb = input("Nombre de cartes de visite :");
if ($nb <= 100) {
    $cout = $nb * 0.4;
} elseif ($nb <= 200) {
    $cout = $nb * 0.3;
} else {
    $cout = $nb * 0.2;
}
echo("Le coût total est $cout\n");
?>