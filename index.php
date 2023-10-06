<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>

    <h1>Adivinar Número</h1>

    <?php
    $numeroAleatorio = rand(1, 2);

    if (isset($_POST['adivinar'])) {
        $numeroIngresado = $_POST['numero'];

        while ($numeroIngresado == $numeroAleatorio){

        if ($numeroIngresado != $numeroAleatorio) {
            echo "<p>Lo siento, el número no coincide. Inténtalo de nuevo.</p>";
            break;
        } else {
            echo "<p>¡Acertaste! El número es $numeroAleatorio.</p>";
        break;
        }

       }
    }
    ?>
    <form method="post">
        <label for="numero">Ingresa un número del 1 al 10:</label>
        <input type="number" name="numero" min="1" max="10" required>
        <input type="submit" name="adivinar" value="Adivinar">
    </form>
</body>
</html>