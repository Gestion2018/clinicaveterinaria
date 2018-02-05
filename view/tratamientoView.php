<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tratamiento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="./jquery-3.2.1.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <?php
    include '../business/productoveterinariobusiness/productoVeterinarioBusiness.php';
    include '../business/tratamientoveterinariobusiness/tratamientoVeterinarioBusiness.php';
    include '../business/animalbusiness/animalBusiness.php';
    include '../business/encargadobusiness/encargadoBusiness.php';
    include '../business/enfermedadescomunesbusiness/enfermedadesComunesBusiness.php';
    ?>
</head>

<body>

    <header>
        <h1>Tratamiento</h1>
    </header>

    <nav>
        <ul>
            <li><a href="atencionAnimalView.php">Anterior</a></li>
        </ul>
    </nav>
        <section id="form">
        <?php
            $encargadoBusiness = new EncargadoBusiness();
            $clientes = $encargadoBusiness->obtenerTBEncargado();
            $animales = $encargadoBusiness->obtenerAnimalesEncargado(1);

            $productoVeterinarioBusiness = new ProductoVeterinarioBusiness();
            $productos = $productoVeterinarioBusiness->obtenerTBProductoVeterinario();

            $enfermedadesComunesBusiness = new EnfermedadesComunesBusiness();
            $enfermedades = $enfermedadesComunesBusiness->obtenerTBEnfermedadesComunes();
        ?>

        <table>
            <tr>
                <th>Nombre Cliente</th>
                <th>Nombre Animal</th>
                <th>Enfermedad</th>
                <th>Producto Veterinario</th>
                <th>Dosis</th>
                <th>Periodicidad</th>
                <th>Fecha</th>
                <th></th>
            </tr>
            <tr>
            <form method="post" action="../business/tratamientoveterinariobusiness/tratamientoVeterinarioAction.php">
                <td><select id="encargadoId" name="encargadoId">
                <option value="-1">Seleccione el cliente</option>
                <?php
                    foreach ($clientes as $cliente) {
                        echo '<option value='.$cliente->getEncargadoId().'>'.$cliente->getEncargadoNombreCompleto().'</option>';
                    }//foreach
                ?>
                </select></td>
                <td><select id="animalId" name="animalId">
                </select></td>
                <td><select id="enfermedadesComunesId" name="enfermedadesComunesId">
                <?php
                    foreach ($enfermedades as $enfermedad) {
                        echo '<option value='.$enfermedad->getEnfermedadescomunesId().'>'.$enfermedad->getEnfermedadescomunesNombre().'</option>';
                    }//foreach
                ?>
                </select></td>
                <td><select id="productoVeterinarioId" name="productoVeterinarioId">
                <?php
                    foreach ($productos as $producto) {
                        echo '<option value='.$producto->getProductoVeterinarioId().'>'.$producto->getProductoVeterinarioNombre().'</option>';
                    }//foreach
                ?>
                </select></td>
                <td><input type="text" name="tratamientoVeterinarioDosis" id="tratamientoVeterinarioDosis"></td>
                <td><input type="text" name="tratamientoVeterinarioPeriodicidad" id="tratamientoVeterinarioPeriodicidad"></td>
                 <td><input type="date" name="tratamientoVeterinarioFecha" id="tratamientoVeterinarioFecha"></td>
                <td><input type="hidden" value="A" name="tratamientoVeterinarioEstado" id="tratamientoVeterinarioEstado"/></td>
                <td><input type="submit" value="Insertar" name="insertar" id="insertar"/></td>
            </form>
            </tr>

            <?php

                $tratamientoveterinarioBusiness = new TratamientoVeterinarioBusiness();
                $tratamientos = $tratamientoveterinarioBusiness->obtenerTBTratamientoVeterinario();

                foreach ($tratamientos as $tratamiento) {
            ?>
                <form method="post" action="../business/tratamientoveterinariobusiness/tratamientoVeterinarioAction.php">
                <input type="hidden" id="tratamientoVeterinarioId" name="tratamientoVeterinarioId" value="<?php echo $tratamiento->getTratamientoveterinarioId()?>"></td>
                <?php
                    $variableId="";
                    foreach ($animales as $animal) {
                        if($animal['animalid'] == $tratamiento->getTratamientoveterinarioAnimalId()){ ?>
                            <td><input readonly type="text" name="encargadonombre" id="encargadonombre" value="<?php echo $animal["encargadonombrecompleto"] ?>"></td>
                            <input type="hidden" name="encargadoId" id="encargadoId" value="<?php echo $animal["encargadoId"] ?>"></td>
                            <?php
                            $variableId = $animal["encargadoId"];
                        }//if
                    }//foreach
                ?>
                <td><select id="animalId" name="animalId">
                <?php
                    foreach ($animales as $a) {
                        if($a["encargadoId"] == $variableId){
                            if($a['animalid'] == $tratamiento->getTratamientoveterinarioAnimalId()){
                                echo '<option selected value='.$a["animalid"].'>'.$a["animalnombre"].'</option>';
                            }else{
                                echo '<option value='.$a["animalid"].'>'.$a["animalnombre"].'</option>';
                            }//if-else
                        }//if
                    }//foreach
                ?>
                </select></td>
                <td><select id="enfermedadesComunesId" name="enfermedadesComunesId">
                <?php
                    foreach ($enfermedades as $enfermedad) {
                        if($enfermedad->getEnfermedadescomunesId() == $tratamiento->getEnfermedadesComunesId()){
                            echo '<option selected value='.$enfermedad->getEnfermedadescomunesId().'>'.$enfermedad->getEnfermedadescomunesNombre().'</option>';
                        }else{
                            echo '<option value='.$enfermedad->getEnfermedadescomunesId().'>'.$enfermedad->getEnfermedadescomunesNombre().'</option>';
                        }//if-else
                    }//foreach
                ?>
                </select></td>
                <td><select id="productoVeterinarioId" name="productoVeterinarioId">
                <?php
                    foreach ($productos as $producto) {
                        if($enfermedad->getEnfermedadescomunesId() == $tratamiento->getEnfermedadesComunesId()){
                             echo '<option selected value='.$producto->getProductoVeterinarioId().'>'.$producto->getProductoVeterinarioNombre().'</option>';
                        }else{
                             echo '<option value='.$producto->getProductoVeterinarioId().'>'.$producto->getProductoVeterinarioNombre().'</option>';
                        }//if-else
                    }//foreach
                ?>
                </select></td>
                <td><input type="text" name="tratamientoVeterinarioDosis" id="tratamientoVeterinarioDosis" value="<?php echo $tratamiento->getTratamientoveterinarioDosis()?>"></td>
                <td><input type="text" name="tratamientoVeterinarioPeriodicidad" id="tratamientoVeterinarioPeriodicidad" value="<?php echo $tratamiento->getTratamientoveterinarioPeriodicidad()?>"></td>
                 <td><input type="date" name="tratamientoVeterinarioFecha" id="tratamientoVeterinarioFecha" value="<?php echo $tratamiento->getTratamientoveterinarioFecha()?>"></td>
                <td><input type="hidden" value="A" name="tratamientoVeterinarioEstado" id="tratamientoVeterinarioEstado"/></td>
                <td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>
                <td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>
                </tr>
                </form>
            <?php
                }
            ?>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
        <h3>
            <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyField") {
                        echo '<p style="color: red">Campo(s) vacio(s)</p>';
                    } else if ($_GET['error'] == "numberFormat") {
                        echo '<p style="color: red">Error, formato de numero</p>';
                    } else if ($_GET['error'] == "dbError") {
                        echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
                    }
                } else if (isset($_GET['success'])) {
                    echo '<p style="color: green">Transacción realizada</p>';
                }
            ?>
        </h3>
    </section>
    <footer>

    </footer>

</body>
</html>

<script>

$("#encargadoId").change(function () {

        if ($("#encargadoId").val() !== "-1") {

            var parameters = {
                "obtener" : 'obtener'
            };

            $.post("../business/encargadobusiness/encargadoAction.php",parameters, function(data){

                var prod = JSON.parse(data);
                document.getElementById("animalId").options.length = 0;
                var idEncargado = $("#encargadoId").val();

                for (var i = 0; i < prod.Data.length; i++) {
                    if(prod.Data[i].encargadoId === idEncargado){
                        $('#animalId').append($("<option></option>").attr("value", prod.Data[i].animalid).text(prod.Data[i].animalnombre));
                    }//if
                }//for
                $("#animalId").selectpicker("refresh");
            });
        }else{
            document.getElementById("animalId").options.length = 0;
            $("#animalId").selectpicker("refresh");
        }
    });
</script>
