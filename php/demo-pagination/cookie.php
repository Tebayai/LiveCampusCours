<?php
$getLang = filter_input(INPUT_GET,'lang',FILTER_VALIDATE_INT);

if($getLang){
    if($getLang == 1){
        setcookie('lang', 'fr');
        $lang = 'fr';
    }else{
        setcookie('lang', 'en');
        $lang = 'en';
    }
}else{
    $langCookie = filter_input(INPUT_COOKIE, 'lang');
    if(!$langCookie) {
        setcookie('lang', 'fr');
        $lang = 'fr';
    } else {
        $lang = $langCookie;
    }
}
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="cookie.php?lang=1">FR</a>
    <a href="cookie.php?lang=2">EN</a>

    <p>Bonjour</p>
</body>
</html>