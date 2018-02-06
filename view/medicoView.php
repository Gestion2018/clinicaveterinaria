<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>M&eacute;dico</title>
    <link rel="icon" href="../resources/icons/bull.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/medicobusiness/medicoBusiness.php';
    ?>

</head>

<body>

    <header> 
        <h1>M&eacute;dico</h1>
    </header>

    <nav>
        <ul>
             <li><a href="../index.php">Inicio</a></li>
        </ul>
    </nav>
    

    <section id="form">
        <table>
            <tr>
                <th>Identificaci&oacute;n</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Especialidad</th>
                <th>Licencia</th>
                <th>Fecha Vigencia</th>
                <th>Inclusi&oacute;n Laboral</th>
                <th></th>
            </tr>
            <tr>
                <form method="post" enctype="multipart/form-data" action="../business/medicobusiness/medicoAction.php">
                    <td><input required type="text" name="medicoNumeroIdentificacion" id="medicoNumeroIdentificacion"/></td>
                    <td><input required type="text" name="medicoNombreCompleto" id="medicoNombreCompleto"/></td>
                    <td><input required type="email" name="medicoCorreo" id="medicoCorreo"/></td>
                    <td><input required type="text" name="medicoEspecialidad" id="medicoEspecialidad"/></td>
                    <td><input required type="text" name="medicoLicencia" id="medicoLicencia"/></td>
                    <td><input required type="date" name="medicoFechaVigenciaLicencia" id="medicoFechaVigenciaLicencia"/></td>
                    <td><input required type="date" name="medicoInclusionLaboral" id="medicoInclusionLaboral"/></td>
                    <input type="hidden" name="medicoEstado" id="medicoEstado" value="1">
                    <td><input type="submit" value="insertar" name="insertar" id="insertar"/></td>
                </form>
            </tr>
            <?php
            $medicoBusiness = new MedicoBusiness();
            $allmedico = $medicoBusiness->obtenerTBMedico();
            foreach ($allmedico as $current) {
                echo '<form method="post" action="../business/medicobusiness/medicoAction.php">';
                echo '<input type="hidden" id="medicoId" name="medicoId" value="' . $current->getMedicoId() . '"></td>';
                echo '<td><input type="text" name="medicoNumeroIdentificacion" id="medicoNumeroIdentificacion" value="' . $current->getMedicoNumeroIdentificacion() . '"/></td>';
                 echo '<td><input type="text" name="medicoNombreCompleto" id="medicoNombreCompleto" value="' . $current->getMedicoNombreCompleto() . '"/></td>';
                echo '<td><input type="email" name="medicoCorreo" id="medicoCorreo" value="' . $current->getMedicoCorreo() . '"/></td>';
                echo '<td><input type="text" name="medicoEspecialidad" id="medicoEspecialidad" value="' . $current->getMedicoEspecialidad() . '"/></td>';
                echo '<td><input type="text" name="medicoLicencia" id="medicoLicencia" value="' . $current->getMedicoLicencia() . '"/></td>';
                echo '<td><input type="date" name="medicoFechaVigenciaLicencia" id="medicoFechaVigenciaLicencia" value="' . $current->getMedicoFechaVigenciaLicencia() . '"/></td>';
                echo '<td><input type="date" name="medicoInclusionLaboral" id="medicoInclusionLaboral" value="' . $current->getMedicoInclusionLaboral() . '"/></td>';
                echo '<input type="hidden" id="medicoEstado" name="medicoEstado" value="1"></td>';
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
