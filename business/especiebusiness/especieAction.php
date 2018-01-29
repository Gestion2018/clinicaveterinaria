<?php

include './especieBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['especieId']) && isset($_POST['especieNombre']) && isset($_POST['especieEstado'])) {

        $especieId = $_POST['especieId'];
        $especieNombre = $_POST['especieNombre'];
        $especieEstado = $_POST['especieEstado'];


        if (strlen($especieId) > 0 && strlen($especieNombre) > 0 && strlen($especieEstado) > 0 ) {
            if (!is_numeric($especieNombre)) {
                $especie = new especie($especieId, $especieNombre, $especieEstado);

                $especieBusiness = new especieBusiness();

                $resultado = $especieBusiness->actualizarTBEspecie($especie);
                if ($resultado == 1) {
                    header("location: ../../view/especieView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/especieView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/especieView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/especieView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/especieView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['especieId'])) {

        $especieId = $_POST['especieId'];

        $especieBusiness = new especieBusiness();
        $resultado = $especieBusiness->eliminarTBEspecie($especieId);

        if ($resultado == 1) {
            header("location: ../../view/especieView.php?success=deleted");
        } else {
            header("location: ../../view/especieView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/especieView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['especieNombre']) && isset($_POST['especieEstado'])) {

        $especieNombre = $_POST['especieNombre'];
        $especieEstado = $_POST['especieEstado'];

        if (strlen($especieNombre) > 0 && strlen($especieEstado) > 0 ) {
            if (!is_numeric($especieNombre)) {
                $especie = new especie(0, $especieNombre, $especieEstado);

                $especieBusiness = new especieBusiness();

                $resultado = $especieBusiness->insertarTBEspecie($especie);

                if ($resultado == 1) {
                    header("location: ../../view/especieView.php?success=inserted");
                } else {
                    header("location: ../../view/especieView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/especieView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/especieView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/especieView.php?error=error");
    }//if si esta seteado el campo
}//if accion
?>
