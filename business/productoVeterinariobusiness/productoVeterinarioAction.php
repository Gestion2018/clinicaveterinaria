<?php

include './productoVeterinarioBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['productoVeterinarioId']) && isset($_POST['productoVeterinarioNombre']) && isset($_POST['productoVeterinarioPrincipioActivo']) && isset($_POST['productoVeterinarioEstado'])) {
            
        $productoVeterinarioId = $_POST['productoVeterinarioId'];
        $productoVeterinarioNombre = $_POST['productoVeterinarioNombre'];
        $productoVeterinarioPrincipioActivo = $_POST['productoVeterinarioPrincipioActivo'];
        $productoVeterinarioEstado = $_POST['productoVeterinarioEstado'];
        

        if (strlen($productoVeterinarioNombre) > 0 && strlen($productoVeterinarioPrincipioActivo) > 0) {
            if (!is_numeric($productoVeterinarioNombre)) {
                $productoVeterinario = new productoveterinario($productoVeterinarioId, $productoVeterinarioNombre, $productoVeterinarioPrincipioActivo, $productoVeterinarioEstado);

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

    if (isset($_POST['productoVeterinarioNombre']) && isset($_POST['productoVeterinarioPrincipioActivo']) && isset($_POST['productoVeterinarioEstado'])) {
            
        $productoVeterinarioNombre = $_POST['productoVeterinarioNombre'];
        $productoVeterinarioPrincipioActivo = $_POST['productoVeterinarioPrincipioActivo'];
        $productoVeterinarioEstado = $_POST['productoVeterinarioEstado'];
        
        if (strlen($productoVeterinarioNombre) > 0 && strlen($productoVeterinarioPrincipioActivo) > 0) {
        if (strlen($productoVeterinarioNombre) > 0 && strlen($productoVeterinarioPrincipioActivo) > 0) {
            if (!is_numeric($productoVeterinarioNombre)) {
                
                $productoVeterinario = new productoveterinario(0, $productoVeterinarioNombre, $productoVeterinarioPrincipioActivo, $productoVeterinarioEstado);

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
