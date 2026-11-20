<?php
session_start();
require_once('../requestBDD.php');

$voirTicket = executerRequete('voir-ticket-par-id', ['ticket' => 1]);


$titre = 'Creation Tickets';
$css = ['../css/style.css'];
require_once '../partiel/header.php';
?>

<h1> Ticket : <?= $_GET['id'] ?? '' ?></h1>


<?php require_once '../partiel/footer.php'; ?>