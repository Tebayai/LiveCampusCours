<?php
session_start();
require_once('../requestBDD.php');

$id = $_SESSION['id'];
$hist = executerRequete('voir-tickets-par-compte', ['compte' => $id]);

$titre = 'Tickets Utilisateur YEG inc';
$css = ['../css/style.css'];
require_once '../partiel/header.php';
?>

<div class="container-title">
    <h1>Tableau de bord Utilisateur</h1>
    <a href="/create-ticket.php">Créer un ticket</a>
</div>

<?php if (isset($_SESSION['id']) && isset($hist)): ?>
    <h2>Historique des tickets</h2>
    <ul>
        <?php foreach ($hist as $ticket): ?>
            <li><?php echo $ticket['titre']; ?> | <?php echo $ticket['statut'] ?> | <?php echo $ticket['date_creation']; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require_once '../partiel/footer.php'; ?>
