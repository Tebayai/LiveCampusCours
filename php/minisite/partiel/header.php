<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>

    <?php foreach($css as $file): ?>
    <link href="/css/<?= $file ?>" rel="stylesheet" media="all" />
    <?php endforeach; ?>
</head>
<body>