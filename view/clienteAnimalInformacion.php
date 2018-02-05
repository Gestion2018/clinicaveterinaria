<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Información del animal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="./jquery-3.2.1.js"></script>
    <!--<script type="text/javascript" src="script.js"></script>-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <?php
    include '../business/encargadobusiness/encargadoBusiness.php';
    ?>

</head>

<body onload="generarTablaAnimales(' <?php echo $_GET['encargadoid']; ?> ');">

    <header>
        <h1>Información</h1>
    </header>

    <nav>
        <ul>
             <li><a href="../index.php">Inicio</a></li>
             <br>
             <li><a href="./busquedaView.php">Busqueda</a></li>
        </ul>
    </nav>

    <section id="form">
        <div id="tablaResultados"></div>
    </section>

    <footer>
    </footer>
</body>
</html>

<script>
    /*Obtien los datos que son requeridos y los asigna en una tabla de manera dinámica*/
    function generarTablaAnimales(encargadoid) {

        /*Se ordenan los datos en la tabla*/
        $.ajax({
          url: '../business/encargadobusiness/encargadoAction.php',
          type: 'POST',
          dataType: 'text',
          data: {idAnimalJSON : encargadoid}
        })
        .done(function(respuesta){
            /*Se valida si se encontro similitud con el parámetro de busqueda que ingreso el usuario*/
            if (respuesta == 'Sin coincidencias') {
                $("#tablaResultados").show();
                $("#tablaResultados").html("<strong style='color:red'> La persona no posee animales registrados </strong>");
            }else {
                $("#loadIMg").hide();//

                /*Convierte el objeto codificado en un objeto json*/
                var prod = JSON.parse(respuesta);

                var salida ="";

                salida = "<table class='table'>"+
                    "<thead>"+
                        "<tr>"+
                            "<th>Nombre del encargado</th>"+
                            "<th>Nombre animal</th>"+
                            "<th>Especie</th>"+
                            "<th>Fecha de nacimiento</th>"+
                        "</tr>"+
                    "</thead>"+
                "<tbody>";

                for (var i = 0; i < prod.Data.length; i++) {
                    salida += "<tr>"+
                        "<td>" + prod.Data[i].encargadonombrecompleto + "</td>"+
                        "<td>" + prod.Data[i].animalnombre + "</td>"+
                        "<td>" + prod.Data[i].animalfechanacimiento + "</td>"+
                        "<td>" + prod.Data[i].especienombre + "</td>"+
                    "</tr>";
                }

                salida +="</tbody></table>";

                $("#tablaResultados").html(salida);
                $('#tablaResultados').show();//delay(100).slideDown(2000);
            }
        })
        .fail( function(error, textStatus, errorThrown) {
            console.log(error.value); //Check console for output
            $("#loadIMg").hide();//#datos es un div
        });
    }
</script>
