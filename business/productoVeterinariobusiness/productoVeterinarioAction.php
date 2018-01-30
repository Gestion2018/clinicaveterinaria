<?php

include './productoVeterinarioBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['productoVeterinarioId']) && isset($_POST['productoVeterinarioNombre']) && isset($_POST['productoVeterinarioNombreComun']) && isset($_POST['productoVeterinarioPrincipioActivo']) && isset($_POST['productoVeterinarioContenido']) && isset($_POST['productoVeterinarioPrecio']) && isset($_POST['productoVeterinarioFechaVencimiento']) && isset($_POST['productoVeterinarioEstado'])) {
            
        $productoVeterinarioId = $_POST['productoVeterinarioId'];
        $productoVeterinarioNombre = $_POST['productoVeterinarioNombre'];
        $productoVeterinarioNombreComun = $_POST['productoVeterinarioNombreComun'];
        $productoVeterinarioPrincipioActivo = $_POST['productoVeterinarioPrincipioActivo'];
        $productoVeterinarioContenido = $_POST['productoVeterinarioContenido'];
        $productoVeterinarioPrecio = $_POST['productoVeterinarioPrecio'];
        $productoVeterinarioFechaVencimiento = $_POST['productoVeterinarioFechaVencimiento'];
        $productoVeterinarioEstado = $_POST['productoVeterinarioEstado'];

        if (strlen($productoVeterinarioNombreComun) > 0 && strlen($productoVeterinarioPrincipioActivo) > 0 && strlen($productoVeterinarioContenido) > 0 && strlen($productoVeterinarioFechaVencimiento) > 0 && strlen($productoVeterinarioPrecio) > 0) {
            if (!is_numeric($productoVeterinarioNombre) && !is_numeric($productoVeterinarioNombreComun)) {

                $productoVeterinario = new productoveterinario($productoVeterinarioId, $productoVeterinarioNombre, $productoVeterinarioNombreComun, $productoVeterinarioPrincipioActivo, $productoVeterinarioContenido, $productoVeterinarioPrecio, $productoVeterinarioEstado, $productoVeterinarioContenido, $productoVeterinarioFechaVencimiento);

                $productoVeterinarioBusiness = new ProductoVeterinarioBusiness();

                $resultado = $productoVeterinarioBusiness->actualizarTBProductoVeterinario($productoVeterinario);
                if ($resultado == 1) {
                    header("location: ../../view/productoVeterinarioView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/productoVeterinarioView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/productoVeterinarioView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/productoVeterinarioView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location:../../view/productoVeterinarioView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['productoVeterinarioId'])) {

        $productoVeterinarioId = $_POST['productoVeterinarioId'];

        $productoVeterinarioBusiness = new ProductoVeterinarioBusiness();
        $resultado = $productoVeterinarioBusiness->eliminarTBProductoVeterinario($productoVeterinarioId);

        if ($resultado == 1) {
            header("location: ../../view/productoVeterinarioView.php?success=deleted");
        } else {
            header("location: ../../view/productoVeterinarioView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/productoVeterinarioView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['productoVeterinarioNombre']) && isset($_POST['productoVeterinarioNombreComun']) && isset($_POST['productoVeterinarioPrincipioActivo']) && isset($_POST['productoVeterinarioContenido']) && isset($_POST['productoVeterinarioCantidad']) && isset($_POST['productoVeterinarioPrecio']) && isset($_POST['productoVeterinarioFechaVencimiento']) && isset($_POST['productoVeterinarioEstado'])) {
            
        $productoVeterinarioId = $_POST['productoVeterinarioId'];
        $productoVeterinarioNombre = $_POST['productoVeterinarioNombre'];
        $productoVeterinarioNombreComun = $_POST['productoVeterinarioNombreComun'];
        $productoVeterinarioPrincipioActivo = $_POST['productoVeterinarioPrincipioActivo'];
        $productoVeterinarioContenido = $_POST['productoVeterinarioContenido'];
        $productoVeterinarioCantidad = $_POST['productoVeterinarioCantidad'];
        $productoVeterinarioPrecio = $_POST['productoVeterinarioPrecio'];
        $productoVeterinarioFechaVencimiento = $_POST['productoVeterinarioFechaVencimiento'];
        $productoVeterinarioEstado = $_POST['productoVeterinarioEstado'];
        
        if (strlen($productoVeterinarioNombreComun) > 0 && strlen($productoVeterinarioPrincipioActivo) > 0 && strlen($productoVeterinarioCantidad) > 0 && strlen($productoVeterinarioContenido) > 0 && strlen($productoVeterinarioPrecio) > 0
            && strlen($productoVeterinarioFechaVencimiento) > 0) {
            if (!is_numeric($productoVeterinarioNombre) && !is_numeric($productoVeterinarioNombreComun)) {

                $productoVeterinario = new productoveterinario(0, $productoVeterinarioNombre, $productoVeterinarioNombreComun, $productoVeterinarioPrincipioActivo, $productoVeterinarioContenido, $productoVeterinarioPrecio, $productoVeterinarioEstado, $productoVeterinarioCantidad, $productoVeterinarioFechaVencimiento);

                $productoVeterinarioBusiness = new ProductoVeterinarioBusiness();

                $resultado = $productoVeterinarioBusiness->insertarTBProductoVeterinario($productoVeterinario);

                if ($resultado == 1) {
                    header("location: ../../view/productoVeterinarioView.php?success=inserted");
                } else {
                    header("location: ../../view/productoVeterinarioView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/productoVeterinarioView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/productoVeterinarioView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../view/productoVeterinarioView.php?error=error");
    }//if si esta seteado el campo
}//if accion
}
?>
