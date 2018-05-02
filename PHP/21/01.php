<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php 
        $suma = 0;
        $riba = 100;
        echo "Skaičiai nuo 1 iki $riba: <br>";
        for ($x = 1; $x <= $riba; $x++) {
            $suma += $x;
            echo "Sumuojame skaičius: $x <br>";
        }
        echo 'Suma: ' . $suma . '<br>';
        echo 'Vidurkis: ' . $suma/$riba;
    ?>
    <footer>Paskutinis taisymas <?php echo date("Y"); ?> m.</footer>
</body>
</html>