<?php
session_start();
require_once('../requestBDD.php');

$voirTicket = executerRequete('voir-ticket-par-id', ['ticket' => $_GET['id']]);
$non_resolu = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
$date = (new DateTime('now', new DateTimeZone('Europe/Paris')))->format('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($voirTicket['statut'] != 'CLOS') {
        $statusResolve = executerRequete('modifier-statut-ticket', ['ticket' => $_GET['id'], 'statut' => 'CLOS']);
    }elseif($voirTicket['statut'] == 'RESOLU'){
        $historique = executerRequete('creer-reponse', ['ticket' => $_GET['id'], 'compte' => $_SESSION['compte_id'], 'contenu' => $non_resolu, 'date_creation' => $date]);
        $statusResolve = executerRequete('modifier-statut-ticket', ['ticket' => $_GET['id'], 'statut' => 'RESOLU']);
    }else{
        $error = 'Impossible de changer le statut du ticket';
    }
    header('Location: voir_ticket_usager.php?id=' . $_GET['id']);
    exit;
}

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

<h3>Changer status ticket</h3>
<?php if(isset($historique)): ?>
    <?php foreach($hist as $historique): ?>
        <span><?= $non_resolu ?></span>
    <?php endforeach; ?>
<?php endif; ?>

<p>Fermer le ticket ?</p>
<form method="post" action="">
    <button type="submit">CLOS</button>
</form>

<p>Renvoyer une demande de modification</p>
<?php if($voirTicket['statut'] == 'RESOLU'):?>
    <form method="post" action="">
        <label for="non_resolu">Description </label>
        <textarea id="non_resolu" name="non_resolu"></textarea>

        <button type="submit">NON RESOLU</button>
    </form>
<?php endif; ?>

<?php if(isset($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>




<?php require_once '../partiel/footer.php'; ?>