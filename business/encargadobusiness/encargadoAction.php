<?php

include './encargadoBusiness.php';

if (isset($_POST['actualizar'])) {

    if (isset($_POST['encargadoId']) && isset($_POST['encargadoNombreCompleto']) && isset($_POST['encargadoDireccion']) && isset($_POST['encargadoCorreo']) && isset($_POST['encargadoPueblo']) && isset($_POST['encargadoEstado'])) {
            
        $encargadoId = $_POST['encargadoId'];
        $encargadoNombreCompleto = $_POST['encargadoNombreCompleto'];
        $encargadoDireccion = $_POST['encargadoDireccion'];
        $encargadoCorreo = $_POST['encargadoCorreo'];
        $encargadoPueblo = $_POST['encargadoPueblo'];
        $encargadoEstado = $_POST['encargadoEstado'];
        

        if (strlen($encargadoNombreCompleto) > 0 && strlen($encargadoDireccion) > 0 && strlen($encargadoCorreo) > 0 && strlen($encargadoPueblo) > 0) {
            if (!is_numeric($encargadoNombreCompleto) && !is_numeric($encargadoDireccion) && !is_numeric($encargadoPueblo)) {
                $encargado = new encargado($encargadoId, $encargadoNombreCompleto, 0, $encargadoDireccion, $encargadoEstado, $encargadoCorreo, $encargadoPueblo);

                $encargadoBusiness = new EncargadoBusiness();

                $resultado = $encargadoBusiness->actualizarTBEncargado($encargado);
                if ($resultado == 1) {
                    header("location: ../../view/encargadoView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/encargadoView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/encargadoView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/encargadoView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location:../../view/encargadoView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['encargadoId'])) {

        $encargadoId = $_POST['encargadoId'];

        $encargadoBusiness = new EncargadoBusiness();
        $resultado = $encargadoBusiness->eliminarTBEncargado($encargadoId);

        if ($resultado == 1) {
            header("location: ../../view/encargadoView.php?success=deleted");
        } else {
            header("location: ../../view/encargadoView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/encargadoView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['encargadoNombreCompleto']) && isset($_POST['encargadoTelefonos']) && isset($_POST['encargadoDireccion']) && isset($_POST['encargadoPueblo']) && isset($_POST['encargadoEstado'])) {
            
        $encargadoNombreCompleto = $_POST['encargadoNombreCompleto'];
        $encargadoTelefono = $_POST['encargadoTelefonos'];
        $encargadoDireccion = $_POST['encargadoDireccion'];
        $encargadoCorreo = $_POST['encargadoCorreo'];
        $encargadoPueblo = $_POST['encargadoPueblo'];
        $encargadoEstado = $_POST['encargadoEstado'];
        
        if (strlen($encargadoNombreCompleto) > 0 && strlen($encargadoDireccion) > 0 && strlen($encargadoCorreo) > 0 && strlen($encargadoPueblo) > 0) {
            if (!is_numeric($encargadoNombreCompleto) && !is_numeric($encargadoDireccion) && !is_numeric($encargadoPueblo)) {
                
                $encargado = new encargado(0, $encargadoNombreCompleto, $encargadoTelefono, $encargadoDireccion, $encargadoEstado, $encargadoCorreo, $encargadoPueblo);

                $encargadoBusiness = new EncargadoBusiness();

                $resultado = $encargadoBusiness->insertarTBEncargado($encargado);

            } else {
                header("location: ../../view/encargadoView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/encargadoView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../view/encargadoView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminarTelefono'])) {

    if (isset($_POST['encargadoId']) && isset($_POST['numeroTelefono'])) {

        $encargadoId = $_POST['encargadoId'];
        $numeroTelefono = $_POST['numeroTelefono'];

        $encargadoBusiness = new EncargadoBusiness();
        $resultado = $encargadoBusiness->eliminarTBTelfono($encargadoId, $numeroTelefono);

        if ($resultado == 1) {
            header("location: ../../view/encargadoView.php?success=deleted");
        } else {
            header("location: ../../view/encargadoView.php?error=dbError");
        }//if error a nivel de base
        
    } else {
        header("location: ../../view/encargadoView.php?error=error");
    }//if si esta seteado el campo
}else if(isset($_POST['agregarTelefono'])){
    $encargadoId = $_POST['encargadoId'];
    $numeroTelefono = $_POST['encargadoTelefono'];

    $encargadoBusiness = new EncargadoBusiness();
    $resultado = $encargadoBusiness->insertarTBTelefono($encargadoId, $numeroTelefono);

    if ($resultado == 1) {
        header("location: ../../view/encargadoView.php?success=deleted");
    } else {
        header("location: ../../view/encargadoView.php?error=dbError");
    }//if error a nivel de base
}//if action
?>
