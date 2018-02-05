<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Busqueda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="./jquery-3.2.1.js"></script>
    <!--<script type="text/javascript" src="script.js"></script>-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <?php
    include '../business/encargadobusiness/encargadoBusiness.php';
    ?>

</head>

<body>

    <header>
        <h1>Busqueda</h1>
    </header>

    <nav>
        <ul>
             <li><a href="../index.php">Inicio</a></li>
             <br>
             <li><a href="./encargadoView.php">Cliente</a></li>
        </ul>
    </nav>

    <section id="form">
        <table>
            <tr>
                <th>Nombre de cliente</th>
                <th>Pueblo</th>
                <th>Especie</th>
            </tr>
            <tr>
                <form method="post" action="">
                    <td><input type="button" value="Buscar por nombre" name="buscarPorNombre" id="buscarPorNombre" onclick="mostrarCamposDeTexto('buscarPorNombre');" /></td>
                    <td><input type="button" value="Buscar por pueblo" name="buscarPorPueblo" id="buscarPorPueblo" onclick="mostrarCamposDeTexto('buscarPorPueblo');" /></td>
                    <td><input type="button" value="Buscar por especie" name="buscarPorEspecie" id="buscarPorEspecie" onclick="mostrarCamposDeTexto('buscarPorEspecie');" /></td>
                    <td><input type="button" value="Limpiar campos de texto" name="Limpiar" id="limpiar" onclick="clean();" /></td>
                </form>
            </tr>
        </table>
        <br><br>

        <!-- <div id='tablaBusqueda'></div> -->

        <table id="tableNombre">
            <tr>
                <th>Nombre del cliente</th>
            </tr>
            <tr>
                <form method="post" action="">
                    <td><input type="text" placeholder="Nombre del cliente" id= "inputBuscarPorNombre"/></td>
                    <!-- <td><input type="button" value="Limpiar campo de texto" name="Limpiar" id="limpiar" onclick="clean();" /></td> -->
                </form>
            </tr>
        </table>


        <table id="tablePueblo">
            <tr>
                <th>Nombre del pueblo</th>
            </tr>
            <tr>
                <form method="post" action="">
                    <td><input type="text" placeholder="Nombre del pueblo" id="inputBuscarPorPueblo"/></td>
                    <!-- <td><input type="button" value="Limpiar campo de texto" name="Limpiar" id="limpiar" onclick="clean();" /></td> -->
                </form>
            </tr>
        </table>


        <table id="tableEspecie">
            <tr>
                <th>Nombre de la especie</th>
            </tr>
            <tr>
                <form method="post" action="">
                    <td><input type="text" placeholder="Nombre de la especie" id="inputBuscarPorEspecie"/></td>
                    <!-- <td><input type="button" value="Limpiar campo de texto" name="Limpiar" id="limpiar" onclick="clean();" /></td>-->
                </form>
            </tr>
        </table>

        <img src="../imagenes/loading.gif" alt="" width="32px" height="32px" id='loadIMg' hidden>
        <div id='tablaResultados'></div>
    </section>
    <footer>
    </footer>

</body>
</html>

<script>
    /*Función para limpiar las cajas de texto*/
    function clean(data){
        document.getElementById('inputBuscarPorNombre').value = "";
        document.getElementById('inputBuscarPorPueblo').value = "";
        document.getElementById('inputBuscarPorEspecie').value = "";
    }

    /*Cuando se recarga página o se abre por primera ves, oculta las tablas
    para no mostrar información previa, y limpia las cajas de texto*/
    $(document).ready(function(){
        $('#tableNombre').hide(0);
        $('#tablePueblo').hide(0);
        $('#tableEspecie').hide(0);

        document.getElementById('inputBuscarPorNombre').value = "";
        document.getElementById('inputBuscarPorPueblo').value = "";
        document.getElementById('inputBuscarPorEspecie').value = "";
    });

    /*La función keyup se encarga de detectar cuando se escribe en una caja específica
    y posteriormente capturar el dato para ser usado*/
    $('#inputBuscarPorNombre').keyup (function(){
      var valor = $(this).val();
      if (valor != "") {
          var inputBuscarPorNombre = document.getElementById('inputBuscarPorNombre').value;
          var buscarPorNombre = document.getElementById('buscarPorNombre').value;
          /*"inputBuscarPorNombre": contiene el nombre que ingreso el usuario para la busqueda*/
          /*"buscarPorNombre": contiene el nombre de la busqueda que se va a realizar*/
          obtenerDatos(inputBuscarPorNombre, buscarPorNombre);
      }
    });

    /*La función keyup se encarga de detectar cuando se escribe en una caja específica
    y posteriormente capturar el dato para ser usado*/
    $('#inputBuscarPorPueblo').keyup (function(){
      var valor = $(this).val();
      if (valor != "") {
          var inputBuscarPorPueblo = document.getElementById('inputBuscarPorPueblo').value;
          var buscarPorPueblo = document.getElementById('buscarPorPueblo').value;
          /*"inputBuscarPorPueblo": contiene el nombre que ingreso el usuario para la busqueda*/
          /*"buscarPorPueblo": contiene el nombre de la busqueda que se va a realizar*/
          obtenerDatos(inputBuscarPorPueblo, buscarPorPueblo);
      }
    });

    /*La función keyup se encarga de detectar cuando se escribe en una caja específica
    y posteriormente capturar el dato para ser usado*/
    $('#inputBuscarPorEspecie').keyup (function(){
      var valor = $(this).val();
      if (valor != "") {
          var inputBuscarPorEspecie = document.getElementById('inputBuscarPorEspecie').value;
          var buscarPorEspecie = document.getElementById('buscarPorEspecie').value;
          /*"inputBuscarPorEspecie": contiene el nombre que ingreso el usuario para la busqueda*/
          /*"buscarPorEspecie": contiene el nombre de la busqueda que se va a realizar*/
          obtenerDatos(inputBuscarPorEspecie, buscarPorEspecie);
      }
    });

    /*Oculta los formularios que no se necesitan y muestra el que se requiere,
    esté metodo se accede mediante el evento click*/
    function mostrarCamposDeTexto(tipoBusqueda){
        if (tipoBusqueda == 'buscarPorNombre') {
            /*document.getElementById("tablaBusqueda").innerHTML = "<table>"+"<tr>"+
                    "<th>Nombre del cliente</th>"+
                "</tr>"+
                "<tr>"+
                    "<form method='post' action=''>"+
                        "<td><input type='text' placeholder='Nombre del cliente' id='inputBuscarPorNombre'/></td>"+
                        "<td><input type='button' value='Buscar' name='Buscar' id='buscar' onclick='obtenerDatos(inputBuscarPorNombre, buscarPorNombre);' /></td>"+
                    "</form>"+
                "</tr>"+
            "</table>";

            $('#tablaBusqueda').hide(0);
            $('#tablaResultados').hide(0);
            $('#tablaBusqueda').delay(100).slideDown(1000);*/

            $('#tablaResultados').hide(0);
            $('#tableEspecie').hide(0);
            $('#tablePueblo').hide(0);

            $('#tableNombre').hide(0);
            $('#tableNombre').show();
        }else {
            if (tipoBusqueda == 'buscarPorPueblo') {
                /*document.getElementById("tablaBusqueda").innerHTML = "<table>"+"<tr>"+
                        "<th>Nombre del pueblo</th>"+
                    "</tr>"+
                    "<tr>"+
                        "<form method='post' action=''>"+
                            "<td><input type='text' placeholder='Nombre del pueblo' id='inputBuscarPorPueblo'/></td>"+
                            "<td><input type='button' value='Buscar' name='Buscar' id='buscar' onclick='obtenerDatos(inputBuscarPorPueblo, buscarPorPueblo);' /></td>"+
                        "</form>"+
                    "</tr>"+
                "</table>";

                $('#tablaBusqueda').hide(0);
                $('#tablaResultados').hide(0);
                $('#tablaBusqueda').delay(100).slideDown(1000);*/

                $('#tablaResultados').hide(0);
                $('#tableEspecie').hide(0);
                $('#tableNombre').hide(0);

                $('#tablePueblo').hide(0);
                $('#tablePueblo').show();
            }else {
                /*document.getElementById("tablaBusqueda").innerHTML = "<table>"+"<tr>"+
                        "<th>Nombre de la especie</th>"+
                    "</tr>"+
                    "<tr>"+
                        "<form method='post' action=''>"+
                            "<td><input type='text' placeholder='Nombre de la especie' id='inputBuscarPorEspecie'/></td>"+
                            "<td><input type='button' value='Buscar' name='Buscar' id='buscar' onclick='obtenerDatos(inputBuscarPorEspecie, buscarPorEspecie);' /></td>"+
                        "</form>"+
                    "</tr>"+
                "</table>";

                $('#tablaBusqueda').hide(0);
                $('#tablaResultados').hide(0);
                $('#tablaBusqueda').delay(100).slideDown(1000);*/

                $('#tablaResultados').hide(0);
                $('#tablePueblo').hide(0);
                $('#tableNombre').hide(0);

                $('#tableEspecie').hide(0);
                $('#tableEspecie').show();
            }
        }
    }

    /*Envía el tipo de busqueda y el dato a buscar a un método intermediario que
    obtiene dichos datos*/
    function obtenerDatos(dato, tipoBusqueda) {
        if (tipoBusqueda == 'Buscar por nombre') {
            intermediarioObtenerDatos(dato, tipoBusqueda);
        }else {
            if (tipoBusqueda == 'Buscar por pueblo') {
                intermediarioObtenerDatos(dato, tipoBusqueda);
            }else {
                intermediarioObtenerDatos(dato, tipoBusqueda);
            }
        }
    }

    /*Obtien los datos que son requeridos y los asigna en una tabla de manera dinámica*/
    function intermediarioObtenerDatos(dato, tipoBusqueda) {
        var telefonos;

        /*Se obtienen los telefonos de cada cliente*/
        $.ajax({
          url: '../business/encargadobusiness/encargadoAction.php',
          type: 'POST',
          dataType: 'text',
          data: {'telefonosJSON' : 'telefonosJSON'}
        })
        .done(function(resp){
            /*Convierte el objeto codificado en un objeto json*/
            telefonos = JSON.parse(resp);
        }).fail( function(error, textStatus, errorThrown) {
            console.log(error.value); //Check console for output
            $("#loadIMg").hide();//#datos es un div
        });

        /*Se ordenan los datos en la tabla*/
        $.ajax({
          url: '../business/encargadobusiness/encargadoAction.php',
          type: 'POST',
          dataType: 'text',
          data: {buscar : dato, tipoBusqueda : tipoBusqueda},
          beforeSend: function(){
            $("#loadIMg").show();//
          }
        })
        .done(function(respuesta){

            /*Se valida si se encontro similitud con el parámetro de busqueda que ingreso el usuario*/
            if (respuesta == 'Sin coincidencias') {
                $("#tablaResultados").show();
                $("#tablaResultados").html("<strong style='color:red'> Sin coincidencias </strong>");
            }else {
                $("#loadIMg").hide();//

                /*Convierte el objeto codificado en un objeto json*/
                var prod = JSON.parse(respuesta);

                var salida ="";

                /*Según el tipo de busqueda se asignan los datos*/
                if (tipoBusqueda == 'Buscar por especie') {
                    salida = "<table class='table'>"+
                        "<thead>"+
                            "<tr>"+
                                "<th>Nombre completo</th>"+
                                "<th>Email</th>"+
                                "<th>Pueblo</th>"+
                                "<th>Direccion</th>"+
                                "<th>Telefono</th>"+
                                "<th>Información del animal</th>"+
                            "</tr>"+
                        "</thead>"+
                    "<tbody>";

                    for (var i = 0; i < prod.Data.length; i++) {
                        salida += "<tr>"+
                            "<td>" + prod.Data[i].encargadonombrecompleto + "</td>"+
                            "<td>" + prod.Data[i].encargadocorreo + "</td>"+
                            "<td>" + prod.Data[i].encargadopueblo + "</td>"+
                            "<td>" + prod.Data[i].encargadodireccion + "</td>"+
                            "<td><select id='numeroTelefono' name='numeroTelefono'>";

                            /*Se cargan los telefonos en el combobox*/
                            for (var j = 0; j< telefonos.Data.length; j++){
                                if (prod.Data[i].encargadoid == telefonos.Data[j].encargadoid) {
                                    salida +="<option value="+ telefonos.Data[j].numerotelefono +">"+ telefonos.Data[j].numerotelefono +"</option>";
                                }
                            }
                            salida += "</select>"+
                            "</td>"+
                            "<td><a href='./clienteAnimalInformacion.php?encargadoid="+ prod.Data[i].encargadoid +"'>Información</a></td>"+
                        "</tr>";
                    }
                }else {
                    salida = "<table class='table'>"+
                        "<thead>"+
                            "<tr>"+
                                "<th>Nombre completo</th>"+
                                "<th>Email</th>"+
                                "<th>Pueblo</th>"+
                                "<th>Direccion</th>"+
                                "<th>Telefono</th>"+
                                "<th>Información del animal</th>"+
                            "</tr>"+
                        "</thead>"+
                    "<tbody>";

                    for (var i = 0; i < prod.Data.length; i++) {
                        salida += "<tr>"+
                            "<td>" + prod.Data[i].encargadonombrecompleto + "</td>"+
                            "<td>" + prod.Data[i].encargadocorreo + "</td>"+
                            "<td>" + prod.Data[i].encargadopueblo + "</td>"+
                            "<td>" + prod.Data[i].encargadodireccion + "</td>"+
                            "<td><select id='numeroTelefono' name='numeroTelefono'>";

                            /*Se cargan los telefonos en el combobox*/
                            for (var j = 0; j< telefonos.Data.length; j++){
                                if (prod.Data[i].encargadoid == telefonos.Data[j].encargadoid) {
                                    salida +="<option value="+ telefonos.Data[j].numerotelefono +">"+ telefonos.Data[j].numerotelefono +"</option>";
                                }
                            }
                            salida += "</select>"+
                            "</td>"+
                            "<td><a href='./clienteAnimalInformacion.php?encargadoid="+ prod.Data[i].encargadoid +"'>Información</a></td>"+
                        "</tr>";
                    }
                }

                salida +="</tbody></table>";

                $("#tablaResultados").html(salida);
                $('#tablaResultados').hide(0);
                $('#tablaResultados').show();//delay(100).slideDown(2000);
            }
        })
        .fail( function(error, textStatus, errorThrown) {
            console.log(error.value); //Check console for output
            $("#loadIMg").hide();//#datos es un div
        });
    }
</script>
