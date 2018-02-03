<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Enfermedades Comunes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="./jquery-3.2.1.js"></script>

    <?php
    include '../business/enfermedadescomunesbusiness/enfermedadesComunesBusiness.php';
    include '../business/sintomabusiness/sintomaBusiness.php';
    include '../business/productoveterinariobusiness/productoVeterinarioBusiness.php';
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
    
    <?php
        $sintomaBusiness = new SintomaBusiness();
        $sintomas = $sintomaBusiness->obtenerTBSintoma();

        $productoVeterinarioBusiness = new ProductoVeterinarioBusiness();
        $productos = $productoVeterinarioBusiness->obtenerTBProductoVeterinario();
    ?>

    <section id="form">
        <table>
            <tr>
                <th>Nombre Enfermedad</th>
                <th>Descripci&oacute;n</th>
                <th>Todos los S&iacute;ntomas</th>
                <th>Agregar S&iacute;ntoma</th>
                <th>S&iacute;ntomas</th>
                <th>Eliminar S&iacute;ntoma</th>
                <th>Productos</th>
                <th>Agregar Producto</th>
                <th>Productos Utilizados</th>
                <!--<th>Eliminar Producto</th>-->
                <th></th>
            </tr>
            <tr>
                <form method="post" action="../business/enfermedadesComunesbusiness/enfermedadesComunesAction.php">
                    <td><input required type="text" name="enfermedadesComunesNombreInsert" id="enfermedadesComunesNombreInsert"/></td>
                    <td><input type="text" name="enfermedadesComunesDescripcionInsert" id="enfermedadesComunesDescripcionInsert"/></td>
                    <td><select id="sintomasInsert" name="sintomasInsert">
                        <option value="-1">Seleccione el S&iacute;ntoma</option>
                        <?php
                        foreach ($sintomas as $sintoma) {
                            echo '<option value='.$sintoma->getSintomaId().'>'.$sintoma->getSintomaNombre().'</option>';
                        }//foreach
                        ?>
                    </select></td>
                    <td><input type="button" value="Agregar Síntoma" name="agregarSintomaInsert" id="agregarSintomaInsert" onclick="agregarOpcion(this.id);" /></td>
                    <td><select id="enfermedadesComunesSintomasInsert" name="enfermedadesComunesSintomasInsert"></select></td>
                    <td><input type="button" value="Eliminar Síntoma" name="eliminarSintomaInsert" id="eliminarSintomaInsert" onclick="eliminarSintoma();" /></td>
                    <td><select id="productosUsadosInsert" name="productosUsadosInsert">
                        <option value="-1">Seleccione el Producto</option>
                        <?php
                        foreach ($productos as $producto) {
                            echo '<option value='.$producto->getProductoVeterinarioId().'>'.$producto->getProductoVeterinarioNombre().'</option>';
                        }//foreach
                        ?>
                    </select></td>
                    <td><input type="button" value="Agregar Producto" name="agregarProductoInsert" id="agregarProductoInsert" onclick="agregarOpcion(this.id);"/></td>
                    <td><input type="text" name="enfermedadesComunesProductosUsadosInsert" id="enfermedadesComunesProductosUsadosInsert"/></td>
                    <!--<td><select id="enfermedadesComunesProductosUsadosInsert" name="enfermedadesComunesProductosUsadosInsert"></select></td>
                    <td><input type="button" value="Eliminar Producto" name="eliminarProductoInsert" id="eliminarProductoInsert" onclick="eliminarProducto();"/></td>-->
                    <td><input type="hidden" name="enfermedadesComunesEstado" id="enfermedadesComunesEstado" value="A" /></td>
                    <td><input type="button" value="insertar" name="insertar" id="insertar" onclick="insertarEnfermedadComun();" /></td>
                </form>
            </tr>
            </table>
            <br><br>
            <table>
            <tr>
                <th>Nombre Enfermedad</th>
                <th>Descripci&oacute;n</th>
                <th>Productos</th>
                <th>Agregar Producto</th>
                <th>Productos Utilizados</th>
                <th>Actualizar</th>
                <th>Todos los S&iacute;ntomas</th>
                <th>Agregar S&iacute;ntoma</th>
                <th>S&iacute;ntomas</th>
                <th>Eliminar S&iacute;ntoma</th>
                <!--<th>Eliminar Producto</th>-->
                <th></th>
            </tr>
            <?php
            $enfermedadesComunesBusiness = new EnfermedadesComunesBusiness();
            $enfermedades = $enfermedadesComunesBusiness->obtenerTBEnfermedadesComunes();

            $sintomasR = $enfermedadesComunesBusiness->obtenerTBEnfermedadesComunesSintomas();

            foreach ($enfermedades as $current) {
                ?>
                <form method="post" action="../business/enfermedadesComunesbusiness/enfermedadesComunesAction.php">
                    <input type="hidden" id="enfermedadesComunesId" name="enfermedadesComunesId" value="<?php echo $current->getEnfermedadesComunesId() ?>"></td>
                    <td><input required type="text" name="enfermedadesComunesNombre" id="enfermedadesComunesNombre" value="<?php echo $current->getEnfermedadesComunesNombre() ?>"/></td>
                    <td><input type="text" name="enfermedadesComunesDescripcion" id="enfermedadesComunesDescripcion" value="<?php echo $current->getEnfermedadesComunesDescripcion() ?>"/></td>
                    <td><select id="productosUsados" name="productosUsados">
                        <option value="-1">Seleccione el Producto</option>
                        <?php
                        foreach ($productos as $producto) {
                            echo '<option value='.$producto->getProductoVeterinarioId().'>'.$producto->getProductoVeterinarioNombre().'</option>';
                        }//foreach
                        ?>
                    </select></td>  
                    <td><input type="submit" value="Agregar Producto" name="agregarProducto" id="agregarProducto"/></td>
                    <td><input type="text" name="enfermedadesComunesProductosUsados" id="enfermedadesComunesProductosUsados" value="<?php echo $current->getenfermedadescomunesProductosUsados() ?>" /></td>  
                    <td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>
                    <td><select id="sintomas" name="sintomas">
                        <option value="-1">Seleccione el S&iacute;ntoma</option>
                        <?php
                        foreach ($sintomas as $sintoma) {
                            echo '<option value='.$sintoma->getSintomaId().'>'.$sintoma->getSintomaNombre().'</option>';
                        }//foreach
                        ?>
                    </select></td>
                    <td><input type="submit" value="Agregar Síntoma" name="agregarSintoma" id="agregarSintoma"/></td>
                    <td><select id="sintomasRegistrados" name="sintomasRegistrados">
                        <?php
                        foreach ($sintomasR as $sintomaR) {
                            if($sintomaR["enfermedadcomunid"] == $current->getEnfermedadesComunesId()){
                                echo '<option value='.$sintomaR["sintomaid"].'>'.$sintomaR["sintomanombre"].'</option>';
                            }//if
                        }//foreach
                        ?>
                    </select></td>
                    <td><input type="submit" value="Eliminar Síntoma" name="eliminarSintoma" id="eliminarSintoma" /></td>          
                    <input type="hidden" id="enfermedadesComunesEstado" name="enfermedadesComunesEstado" value="A"></td>
                    
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

<script>
    function agregarOpcion(objeto){
        if(objeto == "agregarSintomaInsert"){
            var texto = $('#sintomasInsert option:selected').text();
            var valor = $('#sintomasInsert').val();
            $('#enfermedadesComunesSintomasInsert').append($("<option></option>").attr("value", valor).text(texto));
            $("#enfermedadesComunesSintomasInsert").selectpicker("refresh");
        }else{
            var texto = $('#productosUsadosInsert option:selected').text();
            var anterior = $('#enfermedadesComunesProductosUsadosInsert').val();
            if($('#productosUsadosInsert').val() != -1){
                if(anterior != ""){
                    anterior += ",";
                }//if
                anterior += texto;
            }//if
            $('#enfermedadesComunesProductosUsadosInsert').val(anterior);
        }//if.else
    }//agregarSintoma


    function eliminarSintoma(){
        var sintomas = document.getElementById("enfermedadesComunesSintomasInsert");
        for (var i = 0; i < sintomas.length; i++) {
            if(sintomas[i].value == $("#enfermedadesComunesSintomasInsert").val()){
                var seleccion = $("#enfermedadesComunesSintomasInsert").val();
                $("#enfermedadesComunesSintomasInsert option[value="+seleccion+"]").remove();
                $("#enfermedadesComunesSintomasInsert").selectpicker("refresh");
            }//if   
        }//for
    }//eliminarSintoma

    function insertarEnfermedadComun(){
        var arraySintomas = "";

        var sintomas = document.getElementById("enfermedadesComunesSintomasInsert");
        for (var i = 0; i < sintomas.length; i++) {
            if(i == sintomas.length-1){
                arraySintomas += sintomas[i].value;
            }else{
                arraySintomas += sintomas[i].value + ",";
            }     
        }//for

        var parameters = {
                "insertar" : 'insertar',
                "enfermedadesComunesNombre" : $("#enfermedadesComunesNombreInsert").val(),
                "enfermedadesComunesDescripcion" : $("#enfermedadesComunesDescripcionInsert").val(),
                "enfermedadesComunesSintomas" : arraySintomas,
                "enfermedadesComunesEstado" : 'A',
                "enfermedadesComunesProductosUsados" : $("#enfermedadesComunesProductosUsadosInsert").val()
            };


        $.post("../business/enfermedadescomunesbusiness/enfermedadesComunesAction.php",parameters, function(data){
            alert(data);
            if(data === "true"){
                setTimeout("location.href = '../view/enfermedadesComunesView.php?success=success';", 0);
            }//if
        });
    }//insertarEncargado

</script>
