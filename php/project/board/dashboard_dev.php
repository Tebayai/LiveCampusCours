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
$css = ['../css/style.css'];
require_once '../partiel/header.php';
?>

<div class="global-container"> 
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
                    <td data-label="Titre"><?php echo $ticket['titre']; ?></td>
                    <td data-label="Date de création"><?php echo $ticket['date_creation']; ?></td>
                    <td data-label="Statut"><?php echo $ticket['statut']; ?></td>
                    <td><a href="/board/voir_ticket_dev.php?id=<?php echo $ticket['id']; ?>">Voir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<?php require_once '../partiel/footer.php'; ?>
