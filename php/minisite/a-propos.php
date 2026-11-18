<?php require_once 'inc/fonctions.php';

// Petit exercice : mettez ces variables dans
// "inc/fonctions.php", dans une fonction "aPropos"
// Appelez la fonction "aPropos" ici.
// Inspirez-vous de index.php
[
    $titre,
    $css
] = aPropos();
require_once 'partiel/header.php';
?>

<h1><?= $titre ?></h1>

<?php require_once 'partiel/footer.php'; ?>