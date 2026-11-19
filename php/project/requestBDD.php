<?php
// lit le fichier .env à la racine du repo (deux dossiers au-dessus)
$env = parse_ini_file(__DIR__ . '/../../.env');
define('USER_BDD', $env['USER_BDD']);
define('MDP_BDD', $env['MDP_BDD']);

function executerRequete(string $key, ?array $params = null)
{
    $requetes = [
        'recuperer-compte-par-identifiant' => 'SELECT * FROM comptes WHERE identifiant = :identifiant',
        'voir-tickets-par-compte' => 'SELECT * FROM tickets WHERE compte_id = :compte',
        'voir-ticket-par-id' => 'SELECT * FROM tickets WHERE id = :ticket',
        'voir-responses-par-ticket' => 'SELECT * FROM messages WHERE ticket_id = :ticket',
        'creer-ticket' => 'INSERT INTO tickets (compte_id, titre, description, statut, date_creation) VALUES(:compte, :titre, :description, :statut, :date_creation)',
        'modifier-statut-ticket' => 'UPDATE tickets SET statut = :statut WHERE id = :ticket',
        'creer-reponse' => 'INSERT INTO messages (compte_id, ticket_id, contenu, date_creation) VALUES(:compte, :ticket, :contenu, :date_creation)',
        'voir-tickets-en-cours' => 'SELECT * FROM tickets WHERE statut != "CLOS"'
    ];

    if (!isset($requetes[$key])) {
        throw new Exception('La requête n\'existe pas');
    }

    $sql = $requetes[$key];
    $pdo = new PDO('mysql:host=localhost;dbname=lc_tickets', USER_BDD, MDP_BDD);
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute($params);
    if (!str_starts_with($sql, 'SELECT')) {
        return $result;
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (str_contains($sql, 'WHERE id')) {
        return empty($rows) ? null : $rows[0];
    }
    return $rows;
}