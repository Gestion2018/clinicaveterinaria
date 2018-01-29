<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Raza</title>
    <link rel="icon" href="../resources/icons/bull.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/especiebusiness/especieBusiness.php';
	include '../business/razabusiness/razaBusiness.php';
	?>
	
</head>

<body>

    <header> 
        <h1>Razas</h1>
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
                <th></th>
            </tr>
            <tr>
            <form method="post" action="../business/razabusiness/razaAction.php">
                <td><input required type="text" id="razaNombre" name="razaNombre"></td>
                <td><select id="especieId" name="especieId">
                <?php
                    foreach ($especies as $current) {
                        echo '<option value='.$current->getEspecieId().'>'.$current->getEspecieNombre().'</option>';
                    }//foreach
                ?>
                </select></td>
                <input type="hidden" id="razaEstado" name="razaEstado" value="1"></td>
                <td><input type="submit" value="Insertar" name="insertar" id="insertar"/></td>
            </form>
            </tr>
            <?php

                $razaBusiness = new RazaBusiness();
                $razas = $razaBusiness->obtenerTBRaza();
                foreach ($razas as $current) {
            ?>
                <form method="post" action="../business/razabusiness/razaAction.php">
                <input type="hidden" id="razaId" name="razaId" value="<?php echo $current->getRazaId() ?>"></td>
                <td><input type="text" name="razaNombre" id="razaNombre" value="<?php echo $current->getRazaNombre() ?>"/></td>
                <td><select id="especieId" name="especieId">
                <?php
                    foreach ($especies as $especieActual) {
                        echo $current->getRazaEspecieId().  $especieActual->getEspecieId();
                        if($current->getRazaEspecieId()==$especieActual->getEspecieId()){
                            echo '<option selected value='.$especieActual->getEspecieId().'>'.$especieActual->getEspecieNombre().'</option>';
                        }else{
                            echo '<option value='.$especieActual->getEspecieId().'>'.$especieActual->getEspecieNombre().'</option>';
                        }
                    }//foreach
                    ?>
                </select></td>
                <input type="hidden" id="razaEstado" name="razaEstado" value="1"></td>
                <td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>
                <td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>
                </tr>
                </form>

                <?php
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
