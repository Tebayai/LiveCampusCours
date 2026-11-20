<?php
session_start();
require_once('../requestBDD.php');

if(!isset($_SESSION['id']) || $_SESSION['role'] !== 'usager'){
    header('Location: /index.php');
    exit;
}

$voirTicket = executerRequete('voir-ticket-par-id', ['ticket' => $_GET['id']]);
$voirReponses = executerRequete('voir-responses-par-ticket', ['ticket' => $_GET['id']]);
$button = filter_input(INPUT_POST, 'button', FILTER_SANITIZE_SPECIAL_CHARS);
$non_resolu = filter_input(INPUT_POST, 'non_resolu', FILTER_SANITIZE_SPECIAL_CHARS);
$date = (new DateTime('now', new DateTimeZone('Europe/Paris')))->format('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($button == 'CLOS') {
        $statusResolve = executerRequete('modifier-statut-ticket', ['ticket' => $_GET['id'], 'statut' => 'CLOS']);
    }elseif($button == 'NONRESOLU' && $voirTicket['statut'] == 'RESOLU'){
        $historique = executerRequete('creer-reponse', ['ticket' => $_GET['id'], 'compte' => $_SESSION['id'], 'contenu' => $non_resolu, 'date_creation' => $date]);
        $statusResolve = executerRequete('modifier-statut-ticket', ['ticket' => $_GET['id'], 'statut' => 'NONRESOLU']);
    }

    header('Location: voir_ticket_usager.php?id=' . $_GET['id']);
    exit;
}

$titre = 'Ticket usager';
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
<?php if(!empty($voirReponses)): ?>
    <?php foreach($voirReponses as $message): ?>
        <p><?= $message['date_creation'] ?? '' ?> : <?= $message['contenu'] ?? '' ?></p>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun message échangé.</p>
<?php endif; ?>

<h3>Changer status ticket</h3>

<p>Fermer le ticket ?</p>
<form method="post" action="">
    <button type="submit" name="button" value="CLOS">CLOS</button>
</form>

<p>Renvoyer une demande de modification</p>
<?php if($voirTicket['statut'] == 'RESOLU'):?>
    <form method="post" action="">
        <label for="non_resolu">Description </label>
        <textarea id="non_resolu" name="non_resolu" required></textarea>

        <button type="submit" name="button" value="NONRESOLU">NON RESOLU</button>
    </form>
<?php endif; ?>

<?php require_once '../partiel/footer.php'; ?>