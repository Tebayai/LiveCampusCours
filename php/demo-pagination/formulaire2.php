<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $dateNaissance = filter_input(INPUT_POST, 'dateNaissance', FILTER_SANITIZE_STRING);
    $ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_STRING);
    $formation = filter_input(INPUT_POST, 'formation', FILTER_SANITIZE_STRING);
    $note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_FLOAT);
    
    $message = '';
    $donnees = [];
    $erreursManquantes = [];

    // Vérifier s'il manque des données
    if (empty($prenom)) {
        $erreursManquantes[] = "Prénom";
    } else {
        $donnees['prenom'] = $prenom;
    }

    if (empty($nom)) {
        $erreursManquantes[] = "Nom";
    } else {
        $donnees['nom'] = $nom;
    }

    if (empty($dateNaissance)) {
        $erreursManquantes[] = "Date de naissance";
    } else {
        $donnees['dateNaissance'] = $dateNaissance;
    }

    if (empty($ville)) {
        $erreursManquantes[] = "Ville";
    } else {
        $donnees['ville'] = $ville;
    }

    if (empty($formation)) {
        $erreursManquantes[] = "Formation";
    } else {
        $donnees['formation'] = $formation;
    }

    if ($note === false || $note === null || $note === '') {
        $erreursManquantes[] = "Note";
    } else {
        // Vérifier que la note est entre 0 et 20
        if ($note < 0 || $note > 20) {
            $message = "La note doit être entre 0 et 20";
        } else {
            $donnees['note'] = $note;
        }
    }

    // S'il y a des erreurs, les afficher
    if (!empty($erreursManquantes)) {
        $message = "Données manquantes: " . implode(", ", $erreursManquantes);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <h1>Formulaire</h1>
    
    <form action="" method="post">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
        
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        
        <label for="dateNaissance">Date de naissance:</label>
        <input type="date" id="dateNaissance" name="dateNaissance" required>
        
        <label for="ville">Ville:</label>
        <input type="text" id="ville" name="ville" required>
        
        <label for="formation">Formation:</label>
        <select id="formation" name="formation" required>
            <option value="">-- Sélectionner une formation --</option>
            <option value="Bac">Bac</option>
            <option value="Licence">Licence</option>
            <option value="Master">Master</option>
            <option value="Doctorat">Doctorat</option>
            <option value="Formation Professionnelle">Formation Professionnelle</option>
        </select>
        
        <label for="note">Note /20:</label>
        <input type="number" id="note" name="note" step="0.5" min="0" max="20" required>
        
        <button type="submit">Soumettre</button>
    </form>

    <?php if($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <div class="resultat">

            <?php if (!empty($donnees) && empty($erreursManquantes)): ?>
                <h2>Vos Informations</h2>
                
                <h3>Identité</h3>
                <p>
                    <strong>Nom complet:</strong> <?= htmlspecialchars($donnees['prenom']) ?> <?= htmlspecialchars($donnees['nom']) ?>
                </p>

                <h3>Détails Personnels</h3>
                <ul>
                    <li><strong>Date de naissance:</strong> <?= htmlspecialchars($donnees['dateNaissance']) ?></li>
                    <li><strong>Ville:</strong> <?= htmlspecialchars($donnees['ville']) ?></li>
                    <li><strong>Formation:</strong> <?= htmlspecialchars($donnees['formation']) ?></li>
                    <li><strong>Note obtenue:</strong> <?= htmlspecialchars($donnees['note']) ?>/20</li>
                </ul>

                <?php
                $notes = $donnees['note'];
                ?>
                <p>
                    <strong>Note:</strong> <?= $notes ?>
                </p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</body>
</html>
