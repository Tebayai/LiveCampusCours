<?php

require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('fr_FR');

$results = [];
for ($i = 0; $i < 10; $i++) {
    $results[] = [
        'titre' => $faker->sentence,
        'contenu' => $faker->paragraph,
        'date-creation' => $faker->date
    ];
}

var_export($results);
?>