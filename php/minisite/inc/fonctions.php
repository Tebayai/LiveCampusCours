<?php

// Ceci est un exemple d'organisation, on peut tout
// à fait faire autrement.
// Cet exemple est :
// - Une fonction par "page"
// - Une variable déclarée par variable utilisée
// - Un tableau qui renvoie toutes ces variables.
function accueil() {
    // On crée les variables qui nous intéressent
    $titre = "Mon mini-site";
    $titrePrincipal = "Ceci est mon super site";
    $para1 = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime veritatis ratione, consequuntur quam fugit exercitationem reprehenderit, perspiciatis omnis soluta a cumque at aspernatur. Maxime ipsam exercitationem quo eos culpa repudiandae.";
    $competences = ['HTML', 'CSS', 'JavaScript', 'PHP'];
    $ilPleut = rand(0, 1);
    
    $css = [
        'global.css',
        'index.css'
    ];

    // On les renvoie toutes dans un tableau.
    return [
        $titre, 
        $titrePrincipal,
        $para1,
        $competences,
        $ilPleut,
        $css
    ];
}

// function balise($nomBalise) {
//     echo "<" . $nomBalise . ">";
// }

function aPropos() {
    $titre = 'A propos de nous';
    $css = [
        'global.css'
    ];
    return [
        $titre,
        $css
    ];
}