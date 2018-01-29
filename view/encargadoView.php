<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Encargado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="./jquery-3.2.1.js"></script>
    <!--<script type="text/javascript" src="script.js"></script>-->

    <?php
    include '../business/encargadobusiness/encargadoBusiness.php';
    ?>

</head>

<body>

    <header> 
        <h1>Encargado</h1>
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
                <th>Direcci&oacute;n</th>
                <th>Nuevo Tel&eacute;fono</th>
                <th>Agregar</th>
                <th>Tel&eacute;fonos</th>
                <th>Eiminar Opci&oacute;n</th>
                <th></th>
            </tr>
            <tr>
                <form method="post" action="">
                    <td><input type="text" name="encargadoNombreCompletoInsert" id="encargadoNombreCompletoInsert"/></td>
                    <td><input type="text" name="encargadoDireccionInsert" id="encargadoDireccionInsert"/></td>
                    <td><input type="number" name="encargadoTelefonoInsert" id="encargadoTelefonoInsert"/></td>
                    <td><input type="button" value="Agregar Teléfono" name="agregarTelefono" id="agregarTelefono" onclick="agregarTel();"/></td>
                    <td><select id="encargadoTelefonosInsert" name="encargadoTelefonosInsert">
                    </select></td>
                    <td><input type="button" value="Eliminar Teléfono" name="eliminarTelefono" id="eliminarTelefono" onclick="eliminarTel();" /></td>
                    <td><input type="hidden" name="encargadoEstadoInsert" id="encargadoEstadoInsert" value="A" /></td>
                    <td><input type="button" value="insertar" name="insertar" id="insertar" onclick="insertarEncargado();" /></td>
                </form>
            </tr>
        </table>
        <br><br>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Direcci&oacute;n</th>
                <th>Actualizar</th>
                <th>Nuevo Tel&eacute;fono</th>
                <th>Agregar</th>
                <th>Tel&eacute;fonos</th>
                <th>Eiminar Opci&oacute;n</th>
                <th>Eiminar Encargado</th>
                <th></th>
            </tr>
            <?php
            $encargadoBusiness = new EncargadoBusiness();
            $encargados = $encargadoBusiness->obtenerTBEncargado();
            $telefonos = $encargadoBusiness->obtenerTelefonosEncargado();

            foreach ($encargados as $current) { ?>

                <form method="post" action="../business/encargadobusiness/encargadoAction.php">
                    <input type="hidden" id="encargadoId" name="encargadoId" value="<?php echo $current->getEncargadoId();?>"></td>
                    <td><input type="text" name="encargadoNombreCompleto" id="encargadoNombreCompleto" value="<?php echo $current->getEncargadoNombreCompleto();?>"/></td>
                    <td><input type="text" name="encargadoDireccion" id="encargadoDireccion" value="<?php echo $current->getEncargadoDireccion();?>" /></td>
                    <td><input type="submit" value="Actualizar" name="actualizar" id="actualizar" /></td>
                    <td><input type="number" name="encargadoTelefono" id="encargadoTelefono"/></td>
                    <td><input type="submit" value="Agregar Teléfono" name="agregarTelefono" id="agregarTelefono"/></td>
                    <td><select id="numeroTelefono" name="numeroTelefono">
                    <?php
                        foreach ($telefonos as $telefonoTemp) { 
                            if($telefonoTemp["encargadoid"] == $current->getEncargadoId()){
                                echo '<option value='.$telefonoTemp["numerotelefono"].'>'.$telefonoTemp["numerotelefono"].'</option>';
                            }//if
                        }//foreach  
                    ?>
                    </select></td>
                    <td><input type="submit" value="Eliminar Teléfono" name="eliminarTelefono" id="eliminarTelefono" /></td>
                    <td><input type="submit" value="Eliminar Encargado" name="eliminar" id="eliminar"/></td>
                    <td><input type="hidden" name="encargadoEstado" id="encargadoEstado" value="A" /></td>
                    </tr>
                </form>
                <?php 
            }
            ?>
            <tr>
                <td></td>
            </tr>
        </table>
        <h3 id="respuesta">
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

    function agregarTel(){
        var numeroTelefono = $('#encargadoTelefonoInsert').val();
        limpiar();
        $('#encargadoTelefonosInsert').append($("<option></option>").attr("value", numeroTelefono).text(numeroTelefono));
        $("#encargadoTelefonosInsert").selectpicker("refresh");
    }//agregarTel

    function limpiar(){
        $('input[type="number"]').val('');
    }//prueba

    function insertarEncargado(){
        var arrayTelefonos = "";

        var telefonos = document.getElementById("encargadoTelefonosInsert");
        for (var i = 0; i < telefonos.length; i++) {
            if(i == telefonos.length-1){
                arrayTelefonos += telefonos[i].value;
            }else{
                arrayTelefonos += telefonos[i].value + ",";
            }     
        }//for

        var parameters = {
                "insertar" : 'insertar',
                "encargadoNombreCompleto" : $("#encargadoNombreCompletoInsert").val(),
                "encargadoDireccion" : $("#encargadoDireccionInsert").val(),
                "encargadoTelefonos" : arrayTelefonos,
                "encargadoEstado" : 'A'
            };


        $.post("../business/encargadobusiness/encargadoAction.php",parameters, function(data){
            if(data === "true"){
                setTimeout("location.href = '../view/encargadoView.php?success=success';", 1);
            }//if
        });
    }//insertarEncargado

    function eliminarTel(){
        var telefonos = document.getElementById("encargadoTelefonosInsert");
        for (var i = 0; i < telefonos.length; i++) {
            if(telefonos[i].value == $("#encargadoTelefonosInsert").val()){
                var seleccion = $("#encargadoTelefonosInsert").val();
                $("#encargadoTelefonosInsert option[value="+seleccion+"]").remove();
                $("#encargadoTelefonosInsert").selectpicker("refresh");
            }//if   
        }//for
    }//eliminarTel
    
</script>
