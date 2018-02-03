<?php

include './productoFuncionBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['productoFuncionId']) && isset($_POST['productoFuncionNombre']) && isset($_POST['productoFuncionEstado'])) {

        $productoFuncionId = $_POST['productoFuncionId'];
        $productoFuncionNombre = $_POST['productoFuncionNombre'];
        $productoFuncionEstado = $_POST['productoFuncionEstado'];


        if (strlen($productoFuncionId) > 0 && strlen($productoFuncionNombre) > 0 && strlen($productoFuncionEstado) > 0 ) {
            if (!is_numeric($productoFuncionNombre)) {
                $productoFuncion = new productofuncion($productoFuncionId, $productoFuncionNombre, $productoFuncionEstado);

                $productoFuncionBusiness = new ProductoFuncionBusiness();

                $resultado = $productoFuncionBusiness->actualizarTBProductoFuncion($productoFuncion);
                if ($resultado == 1) {
                    header("location: ../../view/productoFuncionView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/productoFuncionView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/productoFuncionView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/productoFuncionView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/productoFuncionView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['productoFuncionId'])) {

        $productoFuncionId = $_POST['productoFuncionId'];

        $productoFuncionBusiness = new ProductoFuncionBusiness();

        $resultado = $productoFuncionBusiness->eliminarTBProductoFuncion($productoFuncionId);

        if ($resultado == 1) {
            header("location: ../../view/productoFuncionView.php?success=deleted");
        } else {
            header("location: ../../view/productoFuncionView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/productoFuncionView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['productoFuncionNombre']) && isset($_POST['productoFuncionEstado'])) {

        $productoFuncionNombre = $_POST['productoFuncionNombre'];
        $productoFuncionEstado = $_POST['productoFuncionEstado'];

        if (strlen($productoFuncionNombre) > 0 && strlen($productoFuncionEstado) > 0 ) {
            if (!is_numeric($productoFuncionNombre)) {
                $productoFuncion = new productofuncion(0, $productoFuncionNombre, $productoFuncionEstado);

                $productoFuncionBusiness = new ProductoFuncionBusiness();

                $resultado = $productoFuncionBusiness->insertarTBProductoFuncion($productoFuncion);

                if ($resultado == 1) {
                    header("location: ../../view/productoFuncionView.php?success=inserted");
                } else {
                    header("location: ../../view/productoFuncionView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/productoFuncionView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/productoFuncionView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/productoFuncionView.php?error=error");
    }//if si esta seteado el campo
}//if accion
?>
