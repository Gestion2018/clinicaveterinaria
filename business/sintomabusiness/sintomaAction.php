<?php

include './sintomaBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['sintomaId']) && isset($_POST['sintomaNombre']) && isset($_POST['sintomaDescripcion']) && isset($_POST['sintomaEstado'])) {
            
        $sintomaId = $_POST['sintomaId'];
        $sintomaNombre = $_POST['sintomaNombre'];
        $sintomaDescripcion = $_POST['sintomaDescripcion'];
        $sintomaEstado = $_POST['sintomaEstado'];
        

        if (strlen($sintomaId) > 0 && strlen($sintomaNombre) > 0 && strlen($sintomaEstado) > 0 ) {
            if (!is_numeric($sintomaNombre)) {
                $sintoma = new sintoma($sintomaId, $sintomaNombre, $sintomaDescripcion, $sintomaEstado);

                $sintomaBusiness = new sintomaBusiness();

                $resultado = $sintomaBusiness->actualizarTBSintoma($sintoma);
                if ($resultado == 1) {
                    header("location: ../../view/sintomaView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/sintomaView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/sintomaView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/sintomaView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/sintomaView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['sintomaId'])) {

        $sintomaId = $_POST['sintomaId'];

        $sintomaBusiness = new sintomaBusiness();
        $resultado = $sintomaBusiness->eliminarTBSintoma($sintomaId);

        if ($resultado == 1) {
            header("location: ../../view/sintomaView.php?success=deleted");
        } else {
            header("location: ../../view/sintomaView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/sintomaView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['sintomaNombre']) && isset($_POST['sintomaDescripcion']) && isset($_POST['sintomaEstado'])) {
            
        $sintomaNombre = $_POST['sintomaNombre'];
        $sintomaDescripcion = $_POST['sintomaDescripcion'];
        $sintomaEstado = $_POST['sintomaEstado'];
        
        if (strlen($sintomaNombre) > 0 && strlen($sintomaEstado) > 0 ) {
            if (!is_numeric($sintomaNombre)) {
                $sintoma = new sintoma(0, $sintomaNombre, $sintomaDescripcion, $sintomaEstado);

                $sintomaBusiness = new sintomaBusiness();

                $resultado = $sintomaBusiness->insertarTBSintoma($sintoma);

                if ($resultado == 1) {
                    header("location: ../../view/sintomaView.php?success=inserted");
                } else {
                    header("location: ../../view/sintomaView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/sintomaView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/sintomaView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/sintomaView.php?error=error");
    }//if si esta seteado el campo
}//if accion
?>
