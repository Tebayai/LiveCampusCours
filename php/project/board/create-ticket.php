<?php
session_start();
require_once('../requestBDD.php');

if(!isset($_SESSION['id']) || $_SESSION['role'] !== 'usager'){
    header('Location: /index.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_SESSION['id'];
    $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    //Récuperation date trouver sur le net avec un simple recherche
    $date = (new DateTime('now', new DateTimeZone('Europe/Paris')))->format('Y-m-d H:i:s');
    $create = executerRequete('creer-ticket', ['compte' => $id, 'titre' => $titre,'description' => $description, 'statut' => 'NOUVEAU', 'date_creation' => $date]);

    header('Location: dashboard_usager.php');
    exit;
}

$titre = 'Creation Tickets';
$css = ['../css/style.css'];
require_once '../partiel/header.php';
?>
<h1>Creation d'un ticket</h1>

<form action="create-ticket.php" method="post">

    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required>

    <label for="description">Description :</label>
    <textarea id="description" name="description" required></textarea>

    <button type="submit">Créer le ticket</button>
</form>


<?php require_once '../partiel/footer.php'; ?>