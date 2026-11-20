<?php
session_start();
require_once('../requestBDD.php');

$id = $_SESSION['id'];
$titre = filter_input(INPUT_POST, 'titre',FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
$create = executerRequete('creer-ticket', ['compte' => $id, 'titre' => $titre,'description' => $description, 'statut' => 'NOUVEAU', 'date_creation' => (new DateTime('now', new DateTimeZone('Europe/Paris')))->format('Y-m-d H:i:s')]);
//Récuperation date trouver sur le net avec un simple recherche

$titre = 'Creation Tickets';
$css = ['../css/style.css'];
require_once '../partiel/header.php';
?>
<h1>Creation d'un ticket</h1>

<form action="submit-ticket.php" method="post">

    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required>

    <label for="description">Description :</label>
    <textarea id="description" name="description" required></textarea>

    <button type="submit">Créer le ticket</button>
</form>


<?php require_once '../partiel/footer.php'; ?>