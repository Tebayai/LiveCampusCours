<?php
session_start();
require_once('../requestBDD.php');

$voirTicket = executerRequete('voir-ticket-par-id', ['ticket' => $_GET['id']]);
$voirReponses = executerRequete('voir-responses-par-ticket', ['ticket' => $_GET['id']]);
$resolu = filter_input(INPUT_POST, 'resolu', FILTER_SANITIZE_SPECIAL_CHARS);
$date = (new DateTime('now', new DateTimeZone('Europe/Paris')))->format('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($voirTicket['statut'] == 'NOUVEAU' || $voirTicket['statut'] == 'NONRESOLU'){
        $historique = executerRequete('creer-reponse', ['ticket' => $_GET['id'], 'compte' => $_SESSION['id'], 'contenu' => $resolu, 'date_creation' => $date]);
        $statusResolve = executerRequete('modifier-statut-ticket', ['ticket' => $_GET['id'], 'statut' => 'RESOLU']);
    }

    header('Location: voir_ticket_dev.php?id=' . $_GET['id']);
    exit;
}


$titre = 'Ticket dev';
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
        <th>Compte ID</th>
    </tr>
    <tr>
        <td><?= $voirTicket['titre'] ?? '' ?> | </td>
        <td><?= $voirTicket['description'] ?? '' ?> | </td>
        <td><?= $voirTicket['date_creation'] ?? '' ?> | </td>
        <td><?= $voirTicket['statut'] ?? '' ?> | </td>
        <td><?= $voirTicket['compte_id'] ?? '' ?></td>
    </tr>
</table>

<h3>Historique des messages échangés</h3>
<?php if(!empty($voirReponses)): ?>
    <?php foreach($voirReponses as $message): ?>
        <p><?= $message['date_creation'] ?? '' ?> : <?= $message['contenu'] ?? '' ?></p>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun message échangé.</p>
<?php endif; ?>

<?php if($voirTicket['statut'] == 'NOUVEAU' || $voirTicket['statut'] == 'NONRESOLU'):?>
    <h3>Changer status ticket</h3>
    <form method="post" action="">
        <label for="resolu">Réponse </label>
        <textarea id="resolu" name="resolu" required></textarea>

        <button type="submit">RESOLU</button>
    </form>
<?php endif; ?>




<?php require_once '../partiel/footer.php'; ?>