<!DOCTYPE html>
<html>

<head>
    <title>Generador de Manzanas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/manza.css">
</head>

<body>
    <div class="container text-center mt-5">
        <button class="btn btn-primary" id="generar">Generar</button>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <div class="image-grid" id="izquierda"></div>
            </div>
            <div class="col-md-4">
                <div class="image-grid">
                    <img src="mas.png" style="width: 120px; margin-top: 50px;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="image-grid" id="derecha"></div>
            </div>
        </div>
        <div class="form-group mt-6">
            <input type="text" class="form-control" id="suma" placeholder="Ingrese la suma" style="font-size: 30px; margin-top: 50px; margin-bottom: 50px;">
        </div>
        <button class="btn btn-primary mt-2" id="comprobar">Comprobar</button>
        <div class="mt-3" id="resultado" style="font-size: 30px;"></div>
        <div class="mt-3" id="colorMensaje" style="font-size: 30px;"></div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        var colorSuma;

        document.getElementById("generar").addEventListener("click", function() {
            $('#suma').val('');
            $('#colorMensaje').text('');
            $('#resultado').text('');
            $.ajax({
                url: 'generar_imagenes.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#izquierda').html('');
                    $('#derecha').html('');

                    if (data.imagenesIzquierda && data.imagenesDerecha && data.coloresIzquierda && data.coloresDerecha) {
                        for (var i = 0; i < data.imagenesIzquierda.length; i++) {
                            $('#izquierda').append('<img src="' + data.imagenesIzquierda[i] + '" alt="Manzana ' + data.coloresIzquierda[i] + '" class="img-fluid card-img">');
                        }
                        for (var i = 0; i < data.imagenesDerecha.length; i++) {
                            $('#derecha').append('<img src="' + data.imagenesDerecha[i] + '" alt="Manzana ' + data.coloresDerecha[i] + '" class="img-fluid card-img">');
                        }
                    } else {
                        console.log('Error: Datos faltantes en la respuesta.');
                        return;
                    }

                    if (data.colorSuma) {
                        colorSuma = data.colorSuma.trim();
                        $('#colorMensaje').text('Debes sumar el color: ' + colorSuma);
                    } else {
                        console.log('Error: Color de suma faltante en la respuesta.');
                    }
                },
                error: function(error) {
                    console.log('Error al generar imágenes: ' + error);
                }
            });
        });

        document.getElementById("comprobar").addEventListener("click", function() {
            var sumaIngresada = parseInt($('#suma').val().trim());

            var sumaVerdes = $('#izquierda img[alt^="Manzana verde"]').length + $('#derecha img[alt^="Manzana verde"]').length;
            var sumaRojas = $('#izquierda img[alt^="Manzana roja"]').length + $('#derecha img[alt^="Manzana roja"]').length;

            if (colorSuma) {
                colorSuma = colorSuma.trim();
            } else {
                console.log('Error: Color de suma no definido.');
                return;
            }

            if ((sumaIngresada === sumaVerdes && colorSuma === 'verde') || (sumaIngresada === sumaRojas && colorSuma === 'roja')) {
                $('#resultado').text('¡Correcto! Acertaste.');
            } else {
                $('#resultado').text('¡Incorrecto! La suma es incorrecta.');
            }
        });
    </script>

</body>

</html>