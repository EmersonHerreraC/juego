<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Contador de Caracteres numericos</h1>
    <?php
if (isset($_POST['submit'])) {
    $texto = $_POST['texto'];
    $contador = 0;
    $letras = 0;
    
    while ($letras < strlen($texto)) {
        $caracter = $texto[$letras];
        
        if (is_numeric($caracter)) {
            $contador++;
        }
        
        $letras++;
    }

    echo "<p>has ingresado  $contador números.</p>";
}
?>
    <form method="post">
        <label for="inputText">Ingresa una cadena de palabras:</label>
        <input type="number" name="texto" required>
        <input type="submit" name="submit" value="Contar Caracteres">
    </form>
</body>

</html>