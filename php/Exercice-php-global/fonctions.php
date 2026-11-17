<?php
// fonctions.php
function input($message) {
    echo ($message . "\n");
    return rtrim(fgets(STDIN));
}

?>