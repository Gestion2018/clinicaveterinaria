<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Diagn&oacute;stico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="./jquery-3.2.1.js"></script>

    <?php
    include '../business/diagnosticobusiness/diagnosticoBusiness.php';
    include '../business/animalbusiness/animalBusiness.php';
    include '../business/encargadobusiness/encargadoBusiness.php';
    ?>
</head>

<body>

    <header> 
        <h1>Diagn&oacute;stico</h1>
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
            $animalesCliente = $encargadoBusiness->obtenerAnimalesEncargado(1);

            $animalBusiness = new AnimalBusiness();
            $animales = $animalBusiness->obtenerTBAnimal();
        ?>

        <table>
            <tr>
                <th>Nombre Cliente</th>
                <th>Nombre Animal</th>
                <th>Peso Animal</th>
                <th>Edad Animal</th>
                <th>Fecha Diagn&oacute;stico </th>
                <th>Descripci&oacute;n Diagn&oacute;stico</th>
                <th></th>
            </tr>
            <tr>
            <form method="post" action="../business/diagnosticobusiness/diagnosticoAction.php">
                <td><select id="encargadoId" name="encargadoId">
                <option value="-1">Seleccione un cliente</option>
                <?php
                    foreach ($clientes as $cliente) {
                        echo '<option value='.$cliente->getEncargadoId().'>'.$cliente->getEncargadoNombreCompleto().'</option>';
                    }//foreach
                ?>
                </select></td>
                <td><select id="animalId" name="animalId">
                <option value="-1">Seleccione el animal</option>
                <?php
                    /*foreach ($animales as $animal) {
                        echo '<option value='.$animal->getAnimalId().'>'.$animal->getAnimalNombre().'</option>';
                    }//foreach*/
                ?>
                </select></td>
                <td><input  type="text" id="animalPeso" name="animalPeso"></td>
                <td><input  readonly="" type="text" id="animalEdadInsert" name="animalEdadInsert" value=""></td>
                <td><input  type="date" id="fechaDiagnostico" name="fechaDiagnostico"></td>
                <td><input  type="text" id="descripcionDiagnostico" name="descripcionDiagnostico"></td>
                <td><input type="hidden" value="A" name="diagnosticoEstado" id="diagnosticoEstado"/></td>
                <td><input type="submit" value="Insertar" name="insertar" id="insertar"/></td>
            </form>
            </tr>
            
            <?php

                $diagnosticoBusiness = new DiagnosticoBusiness();
                $diagnosticos = $diagnosticoBusiness->obtenerTBDiagnostico();

                foreach ($diagnosticos as $diagnostico) {
            ?>
                <form method="post" action="../business/diagnosticobusiness/diagnosticoAction.php">
                <input type="hidden" id="animalId" name="animalId" value="<?php echo $diagnostico->getAnimalId()?>"></td>
                <input type="hidden" id="diagnosticoId" name="diagnosticoId" value="<?php echo $diagnostico->getDiagnosticoId()?>"></td>
                <?php
                    $variableId="";
                    foreach ($animalesCliente as $animalCliente) {
                        if($animalCliente['animalid'] == $diagnostico->getAnimalId()){ ?>
                            <td><input readonly type="text" name="encargadonombre" id="encargadonombre" value="<?php echo $animalCliente["encargadonombrecompleto"] ?>"></td>
                            <input type="hidden" name="encargadoId" id="encargadoId" value="<?php echo $animalCliente["encargadoId"] ?>"></td>
                            <?php
                            $variableId = $animalCliente["encargadoId"];
                        }//if
                    }//foreach
                ?>
                <td><select id="animalId" name="animalId">
                <?php
                    foreach ($animalesCliente as $a) {
                        if($a["encargadoId"] == $variableId){
                            if($a['animalid'] == $diagnostico->getAnimalId()){
                                echo '<option selected value='.$a["animalid"].'>'.$a["animalnombre"].'</option>';
                            }else{
                                echo '<option value='.$a["animalid"].'>'.$a["animalnombre"].'</option>';
                            }//if-else
                        }//if
                    }//foreach
                ?>
                </select></td>
                <td><input type="text" id="animalPeso" name="animalPeso" value="<?php echo $diagnostico->getAnimalPeso() ?>"></td>
                <!--<td><input readonly="" type="text" id="animalEdad" name="animalEdad" value="<?php ?>"></td>-->
                <?php
                    foreach ($animales as $aT) {
                        if($aT->getAnimalId() == $diagnostico->getAnimalId()){ ?>
                            <td><input readonly type="text" name="animalEdad" id="animalEdad" value="<?php echo $aT->getAnimalEdad() ?>"></td>
                            <?php
                        }//if
                    }//foreach
                ?>
                <td><input type="date" id="fechaDiagnostico" name="fechaDiagnostico" value="<?php echo $diagnostico->getFechaDiagnostico() ?>"></td>
                <td><input type="text" id="descripcionDiagnostico" name="descripcionDiagnostico" value="<?php echo $diagnostico->getDescripcionDiagnostico() ?>"></td>
                <td><input type="hidden" value="A" name="diagnosticoEstado" id="diagnosticoEstado"/></td>
                <td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>
                <td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>
                <td><input type="submit" value="Ver Historial Peso" name="historial" id="historial"/></td>
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
                $('#animalId').append($("<option></option>").attr("value", "-1").text("Seleccione un animal"));
                for (var i = 0; i < prod.Data.length; i++) {
                    if(prod.Data[i].encargadoId === idEncargado){
                        $('#animalId').append($("<option></option>").attr("value", prod.Data[i].animalid).text(prod.Data[i].animalnombre));
                    }//if
                }//for
                $("#animalId").selectpicker("refresh");
            });
        }else{
            document.getElementById("animalId").options.length = 0;
            $('#animalId').append($("<option></option>").attr("value", "-1").text("Seleccione un animal"));
            $("#animalId").selectpicker("refresh");
        }
    });

    $("#animalId").change(function () {
        if ($("#animalId").val() !== "-1") {

            var parameters = {
                "obtenerEdad" : 'obtenerEdad',
                "animalId": $("#animalId").val()
            };

            $.post("../business/animalbusiness/animalAction.php",parameters, function(data){
                var prod = JSON.parse(data);
                if(prod.Data.length>0){
                    for (var i = 0; i < prod.Data.length; i++) {
                        $("#animalEdadInsert").val(prod.Data[i].edad);
                    }//for                    
                }//if   
            });
        }else{
            document.getElementById("animalId").options.length = 0;
            $("#animalId").selectpicker("refresh");
        }//if
    });
</script>