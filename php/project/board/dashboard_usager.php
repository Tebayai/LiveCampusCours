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
    <?php if (isset($_SESSION['id'])): ?>
        <a href="/board/create-ticket.php">Créer un ticket</a>
    <?php endif; ?>
</div>

<?php if (isset($_SESSION['id']) && isset($hist)): ?>
    <h2>Historique des tickets</h2>

    <table>
        <tr>
            <th>Titre</th>
            <th>Statut</th>
            <th>Date Création</th>
        </tr>

        <tr>
            <?php foreach ($hist as $ticket): ?>
                <td><?php echo $ticket['titre']; ?></td>
                <td><?php echo $ticket['statut'] ?></td>
                <td><?php echo $ticket['date_creation']; ?></td>
                <td><a href="/board/voir_ticket_usager.php?id=<?php echo $ticket['id']; ?>">Voir</a></td>
            <?php endforeach; ?>
        </tr>
    </table>
<?php endif; ?>

<?php require_once '../partiel/footer.php'; ?>
