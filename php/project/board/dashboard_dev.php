<?php
session_start();
require_once('../requestBDD.php');

if(!isset($_SESSION['id']) || $_SESSION['role'] !== 'dev'){
    header('Location: /index.php');
    exit;
}

$id = $_SESSION['id'];
$hist = executerRequete('voir-tickets-en-cours');

$titre = 'Tickets dev YEG inc';
$css = [];
require_once '../partiel/header.php';
?>

<h1>Tableau de bord Dev</h1>

<?php if (isset($_SESSION['id']) && isset($hist)): ?>
    <h3>Tickets en cours</h3>
    <table>
        <tr>
            <th>Titre</th>
            <th>Date Création</th>
            <th>Statut</th>
        </tr>

        <?php foreach ($hist as $ticket): ?>
            <tr>
                <td><?php echo $ticket['titre']; ?></td>
                <td><?php echo $ticket['date_creation']; ?></td>
                <td><?php echo $ticket['statut']; ?></td>
                <td><a href="/board/voir_ticket_dev.php?id=<?php echo $ticket['id']; ?>">Voir</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php require_once '../partiel/footer.php'; ?>
