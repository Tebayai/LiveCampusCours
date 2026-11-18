<?php 
// include : PHP essaye de charger le fichier
//     S'il existe pas, PHP met un warning
// require : PHP essaye de charger le fichier
//     S'il existe pas, PHP crashe
// Si on ajoute "_once" : on peut pas l'importer
//     plusieurs fois dans le cours de la génération
//     du HTML. PHP ignore si on essaye de le faire
require_once 'inc/fonctions.php';
// On appelle la fonction "accueil"
// Je peux appeler cette fonction parce que j'ai
// déjà importé le fichier fonctions.php avant,
// et c'est ce fichier-là qui contient la fonction
// "accueil". Si j'inverse les lignes, ça marche plus.

// Ce tableau là, est un peu différent de la
// déclaration d'une variable. Ce qu'on dit à PHP,
// c'est : "cette fonction renvoie un tableau. Chaque
// case que le tableau renvoie, ben tu crées une
// variable avec le nom que j'ai dit ($titre, $titrePrincipal, ...),
// et tu mets dans ces variables les cases correspondantes
// du tableau qu'on te renvoie.
// On parle parfois de "déstructuration".
[
    $titre, 
    $titrePrincipal,
    $para1,
    $competences,
    $ilPleut,
    $css
] = accueil();

// On importe le "haut" de la page
require_once 'partiel/header.php'; 

// Au milieu, c'est le code spécifique à la page

$prenom = filter_input(INPUT_POST, 'prenom');
$nom = filter_input(INPUT_POST, 'nom');
?>

<h1><?= $titrePrincipal ?></h1>
<p><?= $para1 ?></p>

<h2>Voici mes compétences</h2>
<ul>
    <?php foreach ($competences as $competence): ?>
        <li><?= $competence ?></li>
    <?php endforeach; ?>

    <?php if($ilPleut): ?>
        <p>Il pleut</p>
    <?php else: ?>
        <p>Il pleut pas</p>
    <?php endif; ?>
</ul>

<section> 
    <h2>Contactez-moi</h2>
    <form method="POST"> 
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <button type="submit">Envoyer</button>
    </form>
</section>

<?php 
// On importe le "bas" de la page
require_once 'partiel/footer.php'; ?>