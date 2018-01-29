<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Enfermedades Comunes</title>
    <link rel="icon" href="../resources/icons/bull.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/enfermedadescomunesbusiness/enfermedadesComunesBusiness.php';
    ?>

</head>

<body>

    <header> 
        <h1>Enfermedades Comunes</h1>
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
                <th>S&iacute;ntomas</th>
                <th></th>
            </tr>
            <tr>
                <form method="post" enctype="multipart/form-data" action="../business/enfermedadesComunesbusiness/enfermedadesComunesAction.php">
                    <td><input required type="text" name="enfermedadesComunesNombre" id="enfermedadesComunesNombre"/></td>
                    <td><input type="text" name="enfermedadesComunesDescripcion" id="enfermedadesComunesDescripcion"/></td>
                    <td><input type="text" name="enfermedadesComunesSintomas" id="enfermedadesComunesSintomas"/></td>
                    <td><input required type="hidden" name="enfermedadesComunesEstado" id="enfermedadesComunesEstado" value="A" /></td>
                    <td><input type="submit" value="insertar" name="insertar" id="insertar"/></td>
                </form>
            </tr>
            <?php
            $enfermedadesComunesBusiness = new EnfermedadesComunesBusiness();
            $enfermedades = $enfermedadesComunesBusiness->obtenerTBEnfermedadesComunes();
            foreach ($enfermedades as $current) {
                echo '<form method="post" action="../business/enfermedadesComunesbusiness/enfermedadesComunesAction.php">';
                echo '<input type="hidden" id="enfermedadesComunesId" name="enfermedadesComunesId" value="' . $current->getEnfermedadesComunesId() . '"></td>';
                echo '<td><input required type="text" name="enfermedadesComunesNombre" id="enfermedadesComunesNombre" value="' . $current->getEnfermedadesComunesNombre() . '"/></td>';
                 echo '<td><input type="text" name="enfermedadesComunesDescripcion" id="enfermedadesComunesDescripcion" value="' . $current->getEnfermedadesComunesDescripcion() . '"/></td>';
                echo '<td><input type="text" name="enfermedadesComunesSintomas" id="enfermedadesComunesSintomas" value="' . $current->getEnfermedadesComunesSintomas() . '"/></td>';                
                echo '<input type="hidden" id="enfermedadesComunesEstado" name="enfermedadesComunesEstado" value="A"></td>';
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
