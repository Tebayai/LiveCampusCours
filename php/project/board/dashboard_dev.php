<?php
// Code pour gérer le tableau de bord de l'utilisateur
session_start();
require_once('../requestBDD.php');

$id = $_SESSION['id'];
$hist = executerRequete('voir-tickets-par-compte', ['compte' => $id]);

$titre = 'Tickets dev YEG inc';
$css = [];
require_once '../partiel/header.php';
?>

<h1>Tableau de bord Dev</h1>

<?php if (isset($_SESSION['id']) && isset($hist)): ?>
    <h3>Tickets en cours</h3>
    <ul>
        <?php foreach ($hist as $ticket): ?>
            <li><?php echo $ticket['titre']; ?> | <?php echo $ticket['statut']; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require_once '../partiel/footer.php'; ?>
