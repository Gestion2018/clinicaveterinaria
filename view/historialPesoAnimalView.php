<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Historial Peso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/diagnosticobusiness/diagnosticoBusiness.php';
    include '../business/animalbusiness/animalBusiness.php';
    ?>
</head>

<body>

    <header> 
        <h1>Historial Peso</h1>
    </header>

    <nav>
        <ul>
             <li><a href="diagnosticoView.php">Anterior</a></li>
        </ul>
    </nav>

    <section id="form">
        <?php
            if(isset($_GET["id"])){
                $diagnosticoBusiness = new DiagnosticoBusiness();
                $pesos = $diagnosticoBusiness->obtenerPesoAnimal($_GET["id"]);
            }//if
        ?>
        <table>
            <tr>
                <th>Nombre Animal</th>
                <th>Fecha Diagn&oacute;stico </th>
                <th>Peso Animal</th>
                <th></th>
            </tr>
            
            <?php
                foreach ($pesos as $peso) {
            ?>
                <form method="post" action="../business/diagnosticobusiness/diagnosticoAction.php">
                <input type="hidden" id="animalId" name="animalId" value="<?php echo $peso["animalid"]?>"></td>
                <input type="hidden" id="diagnosticoId" name="diagnosticoId" value="<?php echo $peso["diagnosticoid"]?>"></td>
                <td><input type="text" readonly id="animalNombre" name="animalNombre" value="<?php echo $peso["animalnombre"] ?>"></td>
                <td><input type="date" readonly id="diagnosticoFecha" name="diagnosticoFecha" value="<?php echo $peso["diagnosticofecha"] ?>"></td>
                <td><input type="text" id="animalPeso" name="animalPeso" value="<?php echo $peso["animalpeso"] ?>"></td>
                <td><input type="submit" value="Actualizar" name="actualizarPeso" id="actualizarPeso"/></td>
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