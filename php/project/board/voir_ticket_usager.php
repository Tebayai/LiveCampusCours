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
        <th>Statut</th>
        <th>Date Création</th>
    </tr>
    <tr>
        <td><?= $voirTicket['titre'] ?? '' ?></td>
        <td><?= $voirTicket['statut'] ?? '' ?></td>
        <td><?= $voirTicket['date_creation'] ?? '' ?></td>
    </tr>
</table>


<?php require_once '../partiel/footer.php'; ?>