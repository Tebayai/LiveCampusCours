<?php

require_once('requestBDD.php');
/* 
foreach([
executerRequete('recuperer-compte-par-identifiant', ['identifiant' => 'alice']),
executerRequete('creer-ticket', ['compte' => 2, 'titre' => 'Test',
'description' => 'Desc', 'statut' => 'NOUVEAU', 'date_creation' => '2026-01-01 09:00:00']),
executerRequete('voir-tickets-par-compte', ['compte' => 2]),
executerRequete('voir-ticket-par-id', ['ticket' => 1]),
executerRequete('creer-reponse', ['ticket' => 1, 'compte' => 1, 'contenu' => 'OK', 'date_creation' => '2026-01-01 09:15:00']),
executerRequete('modifier-statut-ticket', ['ticket' => 1, 'statut' => 'RESOLU']),
executerRequete('creer-reponse', ['ticket' => 1, 'compte' => 2, 'contenu' => 'Pas résolu', 'date_creation' => '2026-01-01 09:30:00']),
executerRequete('modifier-statut-ticket', ['ticket' => 1, 'statut' => 'NONRESOLU']),
executerRequete('creer-reponse', ['ticket' => 1, 'compte' => 1, 'contenu' => 'OK2', 'date_creation' => '2026-01-01 09:45:00']),
executerRequete('modifier-statut-ticket', ['ticket' => 1, 'statut' => 'RESOLU']),
executerRequete('modifier-statut-ticket', ['ticket' => 1, 'statut' => 'CLOS']),
executerRequete('voir-tickets-en-cours'),
executerRequete('voir-responses-par-ticket', ['ticket' => 1])
] as $res) {
var_dump($res);
}
 */

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password');
    $error = '';

    $compte = executerRequete('recuperer-compte-par-identifiant', ['identifiant' => $id]);
    /* var_dump($compte); */

    if ($compte == null){
        $error = 'Identifiant incorrect';
    }else{
        if($compte['mot_de_passe'] !== $password){
            $error = 'Mot de passe incorrect';
        }else{
            if($compte['role'] === 'dev'){
                header('Location: board/devBoard.php');
                exit;
            }else{
                header('Location: board/UserBoard.php');
                exit;
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets YEG.org</title>
</head>
<body>
    <h1>Gestion des tickets YEG inc</h1>
    <div class="bg-white p-4">
        <h2>Connexion</h2>

        <form action="" method="post">
            <label for="id">Identifiant :</label>
            <input type="text" id="id" name="id">

            <label for="password">Mot de passe :</label>
            <input type="text" id="password" name="password">

            <button type="submit">Se connecter</button>
        </form>
        <?php if($error !== ''):?> <p><?= $error ?></p> <?php endif; ?>
    </div>
</body>
</html>