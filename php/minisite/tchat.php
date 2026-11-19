<?php require_once 'inc/fonctions.php';

// Pas de pseudo : on renvoie vers la page pseudo
if(!isset($_SESSION['pseudo'])){
    header('Location: pseudo.php');
    exit();
}

[
    $titre,
    $css
] = tchat();

if(!isset($_SESSION['messages'])){
    $_SESSION['messages'] = [];
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
    $_SESSION['messages'][] = "[" . $_SESSION['pseudo'] . "] : " . $message;
}

require_once 'partiel/header.php';
?>

<h1><?= $titre ?></h1>

<?php foreach($_SESSION['messages'] as $msg): ?>
    <p><?= $msg ?></p>
<?php endforeach; ?>

<form method="POST">
    <textarea name="message" required></textarea>

    <button type="submit">Envoyer</button>
</form>

<?php require_once 'partiel/footer.php'; ?>
