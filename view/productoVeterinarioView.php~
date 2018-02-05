<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Productos Veterinarios</title>
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="./jquery-3.2.1.js"></script>

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

    <?php 
        $productoVeterinarioBusiness = new ProductoVeterinarioBusiness();
        $unidades = $productoVeterinarioBusiness->obtenerUnidades();
        $funciones = $productoVeterinarioBusiness->obtenerFunciones();
    ?>
    

    <section id="form">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Nombre Com&uacute;n</th>
                <th>Principio Activo</th>
                <th>Tamaño</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Fecha Vencimiento</th>
                <th>Funciones</th>
                <th>Agregar Funcion</th>
                <th>Funciones Producto</th>
                <th></th>
            </tr>
            <tr>
                <form method="post" enctype="multipart/form-data" action="../business/productoveterinariobusiness/productoVeterinarioAction.php">
                    <td><input required type="text" name="productoVeterinarioNombre" id="productoVeterinarioNombre"/></td>
                    <td><input required type="text" name="productoVeterinarioNombreComun" id="productoVeterinarioNombreComun"/></td>
                    <td><input type="text" name="productoVeterinarioPrincipioActivo" id="productoVeterinarioPrincipioActivo"/></td>
                    <td><select id="productoVeterinarioContenido" name="productoVeterinarioContenido">
                        <?php 
                            foreach ($unidades as $unidad) {
                                echo '<option value='.$unidad['unidadnombre'].'>'.$unidad["unidadnombre"].'</option>';
                            }//foreach
                        ?>
                    </select></td>
                    <td><input type="number" name="productoVeterinarioCantidad" id="productoVeterinarioCantidad"/></td>
                    <td><input type="number" name="productoVeterinarioPrecio" id="productoVeterinarioPrecio"/></td>
                    <td><input type="date" name="productoVeterinarioFechaVencimiento" id="productoVeterinarioFechaVencimiento"/></td>
                    <td><select id="funciones" name="funciones">
                        <?php 
                            foreach ($funciones as $funcion) {
                                echo '<option value='.$funcion['funcionnombre'].'>'.$funcion["funcionnombre"].'</option>';
                            }//foreach
                        ?>
                    </select></td>
                    <td><input type="button" value="Agregar Funcion" name="agregarFuncion" id="agregarFuncion" onclick="agregarFuncionInsert();" /></td>
                    <td><input type="text" name="productoVeterinarioFunciones" id="productoVeterinarioFunciones"/></td>
                    <td><input required type="hidden" name="productoVeterinarioEstado" id="productoVeterinarioEstado" value="A" /></td>
                    <td><input type="submit" value="insertar" name="insertar" id="insertar"/></td>
                </form>
            </tr>
            </table>
            <br><br>
            <table>
            <tr>
                <th>Nombre</th>
                <th>Nombre Com&uacute;n</th>
                <th>Principio Activo</th>
                <th>Contenido</th>
                <th>Precio</th>
                <th>Fecha Vencimiento</th>
                <th>Funciones</th>
                <th>Agregar Funcion</th>
                <th>Funciones Producto</th>
                <th></th>
            </tr>
            <?php
            $productos = $productoVeterinarioBusiness->obtenerTBProductoVeterinario();
            
            foreach ($productos as $current) {
                ?>
                <form method="post" action="../business/productoveterinariobusiness/productoVeterinarioAction.php">
                    <input type="hidden" id="productoVeterinarioId" name="productoVeterinarioId" value=" <?php echo $current->getProductoVeterinarioId() ?>"></td>
                    <td><input required type="text" name="productoVeterinarioNombre" id="productoVeterinarioNombre" value="<?php echo $current->getProductoVeterinarioNombre() ?>"/></td>
                    <td><input type="text" name="productoVeterinarioNombreComun" id="productoVeterinarioNombreComun" value="<?php echo $current->getProductoVeterinarioNombreComun() ?>"/></td>
                    <td><input type="text" name="productoVeterinarioPrincipioActivo" id="productoVeterinarioPrincipioActivo" value=" <?php echo $current->getproductoVeterinarioPrincipioActivo() ?>"/></td>
                    <td><input type="text" name="productoVeterinarioContenido" id="productoVeterinarioContenido" value=" <?php echo $current->getproductoVeterinarioContenido() ?>"></td>
                    <td><input required type="number" name="productoVeterinarioPrecio" id="productoVeterinarioPrecio" value="<?php echo $current->getProductoVeterinarioPrecio() ?>"/></td>  
                    <td><input type="date" name="productoVeterinarioFechaVencimiento" id="productoVeterinarioFechaVencimiento" value="<?php echo $current->getProductoVeterinarioFechaVencimiento() ?>"/></td> 
                    <td><select id="funciones" name="funciones">
                        <?php 
                            foreach ($funciones as $funcion) {
                                echo '<option value='.$funcion['funcionnombre'].'>'.$funcion["funcionnombre"].'</option>';
                            }//foreach
                        ?>
                    </select></td>
                    <td><input type="submit" value="Agregar Funcion" name="agregarFuncion" id="agregarFuncion"/></td>
                    <td><input type="text" name="productoVeterinarioFunciones" id="productoVeterinarioFunciones" value="<?php echo $current->getProductoVeterinarioFunciones() ?>" /></td>
                    <input type="hidden" id="productoVeterinarioEstado" name="productoVeterinarioEstado" value="A"></td>
                    <td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>
                    <td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>
                    </tr>
                </form>

                
                
                <?php 
                /*echo '<form method="post" action="../business/productoVeterinariobusiness/productoVeterinarioAction.php">';
                echo '<input type="hidden" id="productoVeterinarioId" name="productoVeterinarioId" value="' . $current->getProductoVeterinarioId() . '"></td>';
                echo '<td><input required type="text" name="productoVeterinarioNombre" id="productoVeterinarioNombre" value="' . $current->getProductoVeterinarioNombre() . '"/></td>';
                echo '<td><input required type="text" name="productoVeterinarioNombreComun" id="productoVeterinarioNombreComun" value="' . $current->getProductoVeterinarioNombreComun() . '"/></td>';
                echo '<td><input type="text" name="productoVeterinarioPrincipioActivo" id="productoVeterinarioPrincipioActivo" value="' . $current->getproductoVeterinarioPrincipioActivo() . '"/></td>'; 
                echo '<td><input required type="number" name="productoVeterinarioPrecio" id="productoVeterinarioPrecio" value="' . $current->getProductoVeterinarioPrecio() . '"/></td>'             
                echo '<input type="hidden" id="productoVeterinarioEstado" name="productoVeterinarioEstado" value="A"></td>';
                echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                echo '</tr>';
                echo '</form>';*/
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

<script>
    function agregarFuncionInsert(){
        var texto = $('#funciones option:selected').text();
        var anterior = $('#productoVeterinarioFunciones').val();
        if(anterior != ""){
            anterior += ",";
        }//if
        anterior += texto;
        $('#productoVeterinarioFunciones').val(anterior);
    }//agregarFuncionInsert
</script>
