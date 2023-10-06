<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manzana</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Genera las manzanas</h1>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adivinar'])) {
        $numeroIngresado = (int)$_POST['numero'];
        $contador = 0;
        $fruta = "wasap.png";
        while ($contador < $numeroIngresado) {
            echo "<img src='$fruta' alt='fruta'>";
            $contador++;
        }
    }
}
?>
<form method="post">
    <label for="numero">Ingresa un número del 1 al 100:</label>
    <input type="number" name="numero" min="1" max="100" required>
    <input type="submit" name="adivinar" value="generar">
</form>
</body>
</html>

</html>