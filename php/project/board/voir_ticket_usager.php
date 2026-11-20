<?php
session_start();
require_once('../requestBDD.php');

$voirTicket = executerRequete('voir-ticket-par-id', ['ticket' => $_GET['id']]);


$titre = 'Creation Tickets';
$css = ['../css/style.css'];
require_once '../partiel/header.php';
?>

<h1> Ticket : <?= $_GET['id'] ?? '' ?></h1>

<h3>Information ticket : </h3>

<table>
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Date Création</th>
        <th>Statut</th>
    </tr>
    <tr>
        <td><?= $voirTicket['titre'] ?? '' ?></td>
        <td><?= $voirTicket['description'] ?? '' ?></td>
        <td><?= $voirTicket['date_creation'] ?? '' ?></td>
        <td><?= $voirTicket['statut'] ?? '' ?></td>
    </tr>
</table>

<h3>Historique des messages échangés</h3>




<?php require_once '../partiel/footer.php'; ?>