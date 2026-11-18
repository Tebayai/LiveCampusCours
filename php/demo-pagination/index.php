<?php
$articles = [
    [
        'titre' => 'Temporibus suscipit ut et placeat repudiandae qui.',
        'contenu' => 'Veritatis laborum et qui distinctio quis voluptate ratione. Quia id perspiciatis veritatis placeat deserunt. Ad autem nesciunt eaque. Tempore sequi voluptatem illo.',
        'date-creation' => '1976-10-02',
    ],
    [
        'titre' => 'Quos ex aut dolorum voluptatem consequuntur.',
        'contenu' => 'Et quia repellat et ipsam amet quasi eum. Ipsa dolores neque est ab cupiditate enim natus. Dolore eveniet incidunt magnam unde exercitationem.',
        'date-creation' => '2005-08-07',
    ],
    [
        'titre' => 'Cumque labore molestiae rerum voluptatem officia sed.',
        'contenu' => 'Nesciunt atque architecto sequi qui ipsum aut. Et pariatur sequi optio aut aut ipsam. Vel in distinctio architecto alias quis quam.',
        'date-creation' => '1991-04-11',
    ],
    [
        'titre' => 'Officia atque iste ducimus officiis voluptatem aut expedita.',
        'contenu' => 'Nihil laudantium quaerat repudiandae et deserunt et modi. Cupiditate quae recusandae voluptas eligendi repellendus consequatur. Nobis cum excepturi deserunt illum.',
        'date-creation' => '1995-08-16',
    ],
    [
        'titre' => 'Velit qui unde earum doloribus.',
        'contenu' => 'Libero voluptas voluptatem ipsam non perferendis ut. A perferendis ipsum aut et ipsum voluptas omnis doloribus. Voluptatum perferendis ut laboriosam voluptas hic eum.',
        'date-creation' => '2009-11-05',
    ],
    [
        'titre' => 'Qui molestiae quod quisquam rem laudantium.',
        'contenu' => 'Facere non iusto sit perspiciatis. Aperiam distinctio ipsam et in ut. Ratione voluptatem eos fugiat dolor omnis est et sequi.',
        'date-creation' => '2013-02-02',
    ],
    [
        'titre' => 'Ea expedita sunt totam esse.',
        'contenu' => 'Delectus tempora a perferendis. Impedit soluta excepturi qui delectus quos. Corporis suscipit similique temporibus. Vitae quo in voluptatem et ut.',
        'date-creation' => '1999-06-26',
    ],
    [
        'titre' => 'Officia quibusdam quod omnis.',
        'contenu' => 'Qui nobis voluptas dicta dolorem. Ratione excepturi et fugiat modi iure perspiciatis repellendus. Atque sit dolorem sint expedita enim assumenda. Consequatur numquam autem tempora quam tempora.',
        'date-creation' => '1989-10-06',
    ],
    [
        'titre' => 'Lorem ipsum dolor sit amet.',
        'contenu' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'date-creation' => '2024-06-15',
    ],
    [
        'titre' => 'Nouveau article exemple.',
        'contenu' => 'Ceci est un exemple de contenu pour le nouvel article.',
        'date-creation' => '2024-06-16',
    ],
    [
        'titre' => 'Nouveau article exemple.zzezrr',
        'contenu' => 'Ceci est un exemple de contenu pour le nouvel article.qrzrqrr',
        'date-creation' => '2024-06-10',
    ],
    [
        'titre' => 'Nouveau article qrzrqrzqrzqrzrexemple.',
        'contenu' => 'Ceci est un exemple de cRZQrzrrontenu pour le nouvel article.',
        'date-creation' => '2024-06-14',
    ],

];

$numeroPage = filter_input(INPUT_GET, 'page');
$nombreArticlesParPage = 5;

$articleMini = ($numeroPage - 1) * $nombreArticlesParPage;
$articleMax = $articleMini + $nombreArticlesParPage;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
</head>
<body>
    <h1>Liste des articles</h1>

        <?php for($i = $articleMini; $i < $articleMax; $i++): ?>
        <?php $article = $articles[$i]; ?>
            <article>
                <h2><?= $article['titre'] ?></h2>
                <p><?= $article['contenu'] ?></p>
                <small>Créé le <?= $article['date-creation'] ?></small>
            </article>
        <?php endfor; ?>
</body>
</html>