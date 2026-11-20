<?php
session_start();
require_once('../requestBDD.php');

$voirTicket = executerRequete('voir-ticket-par-id', ['ticket' => $_GET['id']]);
$statusResolve = executerRequete('modifier-statut-ticket', ['ticket' => $_GET['id'], 'statut' => 'RESOLU']);


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
        <td><?= $voirTicket['titre'] ?? '' ?> | </td>
        <td><?= $voirTicket['description'] ?? '' ?> | </td>
        <td><?= $voirTicket['date_creation'] ?? '' ?> | </td>
        <td><?= $voirTicket['statut'] ?? '' ?> | </td>
    </tr>
</table>

<h3>Historique des messages échangés</h3>

<?php if($voirTicket['statut'] == 'NOUVEAU' || $voirTicket['statut'] == 'NON RESOLU'):?>
    <h3>Changer status ticket</h3>
    <button type="submit">RESOLU</button>
<?php endif; ?>




<?php require_once '../partiel/footer.php'; ?>