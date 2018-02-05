<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Especie</title>
    <link rel="icon" href="../resources/icons/bull.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <?php
    include '../business/especiebusiness/especieBusiness.php';
    ?>

</head>

<body>

    <header>
        <h1>Especie</h1>
    </header>

    <nav>
        <ul>
             <li><a href="../index.php">Inicio</a></li>
        </ul>
    </nav>


    <section id="form">
        <table>
            <tr>
                <th>Nombre Especie</th>
                <th></th>
            </tr>
            <tr>
                <form method="post" enctype="multipart/form-data" action="../business/especiebusiness/especieAction.php">
                    <td><input required type="text" name="especieNombre" id="especieNombre"/></td>
                    <input type="hidden" name="especieEstado" id="especieEstado" value="1">
                    <td><input type="submit" value="insertar" name="insertar" id="insertar"/></td>
                </form>
            </tr>
            <?php
            $especieBusiness = new EspecieBusiness();
            $especies = $especieBusiness->obtenerTBEspecie();
            foreach ($especies as $current) {
                echo '<form method="post" action="../business/especiebusiness/especieAction.php">';
                echo '<input type="hidden" id="especieId" name="especieId" value="' . $current->getEspecieId() . '"></td>';
                echo '<td><input type="text" name="especieNombre" id="especieNombre" value="' . $current->getEspecieNombre() . '"/></td>';
                echo '<input type="hidden" id="especieEstado" name="especieEstado" value="1"></td>';
                echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                echo '</tr>';
                echo '</form>';
            }
            ?>


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
