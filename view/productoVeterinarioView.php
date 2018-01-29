<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Productos Veterinarios</title>
    <link rel="icon" href="../resources/icons/bull.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/productoveterinariobusiness/productoVeterinarioBusiness.php';
    ?>

</head>

<body>

    <header> 
        <h1>Productos Veterinarios</h1>
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
                <th>Principio Activo</th>
                <th></th>
            </tr>
            <tr>
                <form method="post" enctype="multipart/form-data" action="../business/productoVeterinariobusiness/productoVeterinarioAction.php">
                    <td><input required type="text" name="productoVeterinarioNombre" id="productoVeterinarioNombre"/></td>
                    <td><input type="text" name="productoVeterinarioPrincipioActivo" id="productoVeterinarioPrincipioActivo"/></td>
                    <td><input required type="hidden" name="productoVeterinarioEstado" id="productoVeterinarioEstado" value="A" /></td>
                    <td><input type="submit" value="insertar" name="insertar" id="insertar"/></td>
                </form>
            </tr>
            <?php
            $productoVeterinarioBusiness = new ProductoVeterinarioBusiness();
            $productos = $productoVeterinarioBusiness->obtenerTBProductoVeterinario();
            foreach ($productos as $current) {
                echo '<form method="post" action="../business/productoVeterinariobusiness/productoVeterinarioAction.php">';
                echo '<input type="hidden" id="productoVeterinarioId" name="productoVeterinarioId" value="' . $current->getProductoVeterinarioId() . '"></td>';
                echo '<td><input required type="text" name="productoVeterinarioNombre" id="productoVeterinarioNombre" value="' . $current->getProductoVeterinarioNombre() . '"/></td>';
                 echo '<td><input type="text" name="productoVeterinarioPrincipioActivo" id="productoVeterinarioPrincipioActivo" value="' . $current->getproductoVeterinarioPrincipioActivo() . '"/></td>';              
                echo '<input type="hidden" id="productoVeterinarioEstado" name="productoVeterinarioEstado" value="A"></td>';
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
