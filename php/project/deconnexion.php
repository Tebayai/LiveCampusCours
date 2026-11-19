<?php
// On ouvre la session pour pouvoir la détruire
session_start();
session_destroy();

// Retour à la page de connexion
header('Location: /index.php');
exit;
