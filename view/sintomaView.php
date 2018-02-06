<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>S&iacute;ntomas</title>
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="jquery.min.js" type="text/javascript"></script>

    <script src="./jquery-3.2.1.js"></script>

    <?php
    include '../business/sintomabusiness/sintomaBusiness.php';
    ?>

</head>

<body>

    <header>
        <h1>S&iacute;ntomas</h1>
    </header>

    <nav>
        <ul>
             <li><a href="../index.php">Inicio</a></li>
        </ul>
    </nav>

    <section id="form">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripci&oacute;n</th>
                <th></th>
            </tr>
            <tr>
            <form method="post" action="../business/sintomabusiness/sintomaAction.php">
                <td><input required type="text" id="sintomaNombre" name="sintomaNombre"></td>
                <td><input  type="text" id="sintomaDescripcion" name="sintomaDescripcion"></td>
                <td><input  type="hidden" id="sintomaEstado" name="sintomaEstado" value="A"></td>
                <td><input type="submit" value="Insertar" name="insertar" id="insertar"/></td>
            </form>
            </tr>
            
            <!--CODIGO DE ACTUALIZAR Y ELIMINAR-->
            <?php

                $sintomaBusiness = new SintomaBusiness();
                $sintomas = $sintomaBusiness->obtenerTBSintoma();

                foreach ($sintomas as $sintoma) {
            ?>
                <form method="post" action="../business/sintomabusiness/sintomaAction.php">
                <input type="hidden" id="sintomaId" name="sintomaId" value="<?php echo $sintoma->getSintomaId() ?>"></td>
                <td><input required type="text" id="sintomaNombre" name="sintomaNombre" value="<?php echo $sintoma->getSintomaNombre() ?>"></td>
                <td><input type="text" id="sintomaDescripcion" name="sintomaDescripcion" value="<?php echo $sintoma->getSintomaDescripcion()?>"></td>
                <td><input  type="hidden" id="sintomaEstado" name="sintomaEstado" value="<?php echo $sintoma->getSintomaEstado()?>"></td>
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


