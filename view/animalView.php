<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Animal</title>
    <link rel="icon" href="../resources/icons/bull.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="jquery.min.js" type="text/javascript"></script>

    <script src="./jquery-3.2.1.js"></script>

    <?php
    include '../business/especiebusiness/especieBusiness.php';
    include '../business/razabusiness/razaBusiness.php';
    include '../business/animalbusiness/animalBusiness.php';
    ?>

</head>

<body>

    <header>
        <h1>Animal</h1>
    </header>

    <nav>
        <ul>
             <li><a href="../index.php">Inicio</a></li>
        </ul>
    </nav>

    <section id="form">
        <?php
            $especieBusiness = new EspecieBusiness();
            $especies = $especieBusiness->obtenerTBEspecie();
        ?>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Caracteristicas Especiales</th>
                <th>Medida Peso</th>
                <th>Peso</th>
                <th></th>
            </tr>
            <tr>
            <form method="post" action="../business/animalbusiness/animalAction.php">
                <td><input required type="text" id="animalNombre" name="animalNombre"></td>
                <td><select id="especieId" name="especieId">
                <option value="-1">Seleccione la especie</option>
                <?php
                    foreach ($especies as $current) {
                        echo '<option value='.$current->getEspecieId().'>'.$current->getEspecieNombre().'</option>';
                    }//foreach
                ?>
                </select></td>
                <td><select id="especieRazaId" name="especieRazaId">
                </select></td>
                <td><input  type="text" id="animalSennas" name="animalSennas"></td>
                <td><select id="animalMedidaPeso" name="animalMedidaPeso">
                    <option>Gramos</option>
                    <option>Kilogramos</option>
                    <option>Libras</option>
                </select></td>
                <td><input required type="text" id="animalPeso" name="animalPeso"></td>
                <td><input type="submit" value="Insertar" name="insertar" id="insertar"/></td>
            </form>
            </tr>
            
            <!--CODIGO DE ACTUALIZAR Y ELIMINAR-->
            <?php

                $animalBusiness = new AnimalBusiness();
                $animales = $animalBusiness->obtenerInformacionAnimales();

                $razaBusiness = new RazaBusiness();
                $razas = $razaBusiness->obtenerTBRaza();

                foreach ($animales as $animal) {
            ?>
                <form method="post" action="../business/animalbusiness/animalAction.php">
                <input type="hidden" id="animalId" name="animalId" value="<?php echo $animal["animalid"];?>"></td>
                <td><input type="text" id="animalNombre" name="animalNombre" value="<?php echo $animal["animalnombre"];?>"></td>
                <td><input readonly type="text" id="animalEspecie" name="animalEspecie" value="<?php echo $animal["especienombre"];?>"></td>
                <td><select id="especieRazaId" name="especieRazaId">
                <option value="-1">Seleccione la raza</option>
                <?php
                    foreach ($razas as $raza) {
                        if($animal["especieid"] == $raza->getRazaEspecieId()){
                            if($animal["animalespecierazaid"] == $raza->getRazaId()){
                                echo '<option selected value='.$raza->getRazaId().'>'.$raza->getRazaNombre().'</option>';
                            }else{
                                echo '<option value='.$raza->getRazaId().'>'.$raza->getRazaNombre().'</option>';
                            }//if-else
                        }//if
                    }//foreach
                ?>
                </select></td>
                <td><input  type="text" id="animalSennas" name="animalSennas" value="<?php echo $animal["animalsennas"];?>"></td>
                <td><select id="animalMedidaPeso" name="animalMedidaPeso">
                    <?php 
                        if($animal["animalmedidapeso"] == "Gramos"){
                            echo '<option selected>Gramos</option>';
                            echo '<option>Kilogramos</option>';
                            echo '<option>Libras</option>';
                        }else if($animal["animalmedidapeso"] == "Kilogramos"){
                            echo '<option>Gramos</option>';
                            echo '<option selected>Kilogramos</option>';
                            echo '<option>Libras</option>';
                        }else{
                            echo '<option>Gramos</option>';
                            echo '<option>Kilogramos</option>';
                            echo '<option selected>Libras</option>';
                        }//if-else
                    ?>
                </select></td>
                <td><input required type="text" id="animalPeso" name="animalPeso" value="<?php echo $animal["animalpeso"];?>"></td>
                <td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>
                <td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>
                </tr>
                </form>
            <?php
                }
            ?>
            <!--CODIGO DE ACTUALIZAR Y ELIMINAR-->
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

$("#especieId").change(function () {

        if ($("#especieId").val() !== "-1") {

            var parameters = {
                "obtener" : 'obtener',
                "especieId" : $("#especieId").val()
            };

            $.post("../business/razabusiness/razaAction.php",parameters, function(data){
                
                var prod = JSON.parse(data);
                document.getElementById("especieRazaId").options.length = 0;
                
                $('#especieRazaId').append($("<option></option>").attr("value", "-1").text("Seleccione una Raza"));

                for (var i = 0; i < prod["Data"].length; i++) {
                    $('#especieRazaId').append($("<option></option>").attr("value", prod.Data[i].razaid).text(prod.Data[i].razanombre));
                }//for
                $("#especieRazaId").selectpicker("refresh");
            });
        }else{
            document.getElementById("especieRazaId").options.length = 0;
            $('#especieRazaId').append($("<option></option>").attr("value", "-1").text("Seleccione una Raza"));
            $("#especieRazaId").selectpicker("refresh");
        }
    });
</script>
