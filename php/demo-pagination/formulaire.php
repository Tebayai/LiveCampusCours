<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $number1 = filter_input(INPUT_POST,'number1',FILTER_VALIDATE_FLOAT);
    $number2 = filter_input(INPUT_POST,'number2',FILTER_VALIDATE_FLOAT);
    $operation = filter_input(INPUT_POST,'selectOperation',FILTER_SANITIZE_STRING);
    $message = '';

    if($number1 !== false && $number2 !== false && $operation !== false){
        switch($operation) {
            case 'addition':
                $res = $number1 + $number2;
                $message = "Resultat: $res";
                break;
            case 'soustraction':
                $res = $number1 - $number2;
                $message = "Resultat: $res";
                break;
            case 'multiplication':
                $res = $number1 * $number2;
                $message = "Resultat: $res";
                break;
            case 'division':
                if($number2 != 0) {
                    $res = $number1 / $number2;
                    $message = "Resultat: $res";
                } else {
                    $message = "Division par zéro impossible";
                }
                break;
            default:
                $message = "Opération invalide";
                break;
        }
    }else{
        $message = "Nombre invalide";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form calculator</h1>
    <form action="" method="post">
        <label for="number1">Numéro 1:</label>
        <input type="number" id="number1" name="number1" required>
        <br>
        <label for="number2">Numéro 2:</label>
        <input type="number" id="number2" name="number2" required>
        <br>
        <label for="selectOperation">Opération:</label>
        <select id="selectOperation" name="selectOperation" required>
            <option value="addition">Addition</option>
            <option value="soustraction">Soustraction</option>
            <option value="multiplication">Multiplication</option>
            <option value="division">Division</option>
        </select>
        <br>
        <button type="submit">Calculer</button>
    </form>

    <h2>Résultat</h2>
    <?php if ($message !== ''): ?>
        <p><?= $message ?></p>
    <?php endif; ?>
</body>
</html>