<?php require_once 'inc/fonctions.php';
[
    $titre,
    $css
] = pseudo();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
    $_SESSION['pseudo'] = $pseudo;
}

require_once 'partiel/header.php';
?>

<h1><?= $titre ?></h1>

<form method="POST">
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required>

    <button type="submit">Envoyer</button>
</form>

<?php require_once 'partiel/footer.php'; ?>
