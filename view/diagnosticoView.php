<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Diagn&oacute;stico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <?php
    include '../business/diagnosticobusiness/diagnosticoBusiness.php';
    include '../business/animalbusiness/animalBusiness.php';
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
            $animalBusiness = new AnimalBusiness();
            $animales = $animalBusiness->obtenerTBAnimal();
        ?>

        <table>
            <tr>
                <th>Nombre Animal</th>
                <th>Peso Animal</th>
                <th>Edad Animal</th>
                <th>Fecha Diagn&oacute;stico </th>
                <th>Descripci&oacute;n Diagn&oacute;stico</th>
                <th></th>
            </tr>
            <tr>
            <form method="post" action="../business/diagnosticobusiness/diagnosticoAction.php">
                <td><select id="animalId" name="animalId">
                <?php
                    foreach ($animales as $animal) {
                        echo '<option value='.$animal->getAnimalId().'>'.$animal->getAnimalNombre().'</option>';
                    }//foreach
                ?>
                </select></td>
                <td><input  type="text" id="animalPeso" name="animalPeso"></td>
                <td><input  readonly="" type="text" id="animalEdad" name="animalEdad" value="<?php ?>"></td>
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
                    foreach ($animales as $animal) {
                        if($animal->getAnimalId() == $diagnostico->getAnimalId()){ ?>
                            <td><input type="text" readonly name="animalNombre" id="animalNombre" value="<?php echo $animal->getAnimalNombre()?>"></td>
                            <?php
                        }//if
                    }//foreach
                ?>
                </select></td>
                <td><input type="text" id="animalPeso" name="animalPeso" value="<?php echo $diagnostico->getAnimalPeso() ?>"></td>
                <td><input readonly="" type="text" id="animalEdad" name="animalEdad" value="<?php ?>"></td>
                <td><input type="date" id="fechaDiagnostico" name="fechaDiagnostico" value="<?php echo $diagnostico->getFechaDiagnostico() ?>"></td>
                <td><input type="text" id="descripcionDiagnostico" name="descripcionDiagnostico" value="<?php echo $diagnostico->getDescripcionDiagnostico() ?>"></td>
                <td><input type="hidden" value="A" name="diagnosticoEstado" id="diagnosticoEstado"/></td>
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
