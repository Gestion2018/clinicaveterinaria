<?php

include './razaBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['razaId']) && isset($_POST['razaNombre']) && isset($_POST['especieId'])) {
            
        $razaId = $_POST['razaId'];
        $razaNombre = $_POST['razaNombre'];
        $razaespecieid = $_POST['especieId'];
        

        if (strlen($razaId) > 0 && strlen($razaNombre) > 0 && strlen($razaespecieid) > 0 ) {
            if (!is_numeric($razaNombre)) {
                $raza = new raza($razaId, $razaNombre, 0, $razaespecieid, 0);

                $razaBusiness = new razaBusiness();

                $resultado = $razaBusiness->actualizarTBRaza($raza);
                if ($resultado == 1) {
                    header("location: ../../view/razaView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/razaView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/razaView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/razaView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/razaView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['razaId'])) {

        $razaId = $_POST['razaId'];

        $razaBusiness = new razaBusiness();
        $resultado = $razaBusiness->eliminarTBRaza($razaId);

        if ($resultado == 1) {
            header("location: ../../view/razaView.php?success=deleted");
        } else {
            header("location: ../../view/razaView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/razaView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['especieId']) && isset($_POST['razaNombre']) && isset($_POST['razaEstado'])) {
            
        $especieId = $_POST['especieId'];
        $razaNombre = $_POST['razaNombre'];
        $razaEstado = $_POST['razaEstado'];
        
        if (strlen($especieId) > 0 && strlen($razaNombre) > 0 && strlen($razaEstado) > 0 ) {
            if (!is_numeric($nombre)) {
                $raza = new raza(0, $razaNombre, $razaEstado, $especieId, 0);

                $razaBusiness = new razaBusiness();

                $resultado = $razaBusiness->insertarTBRaza($especieId, $raza);

                if ($resultado == 1) {
                    header("location: ../../view/razaView.php?success=inserted");
                } else {
                    header("location: ../../view/razaView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/razaView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/razaView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/razaView.php?error=error");
    }//if si esta seteado el campo
} else if(isset($_POST['obtener'])){
    
    $especieId = $_POST['especieId'];
    
    $raza = new RazaBusiness();
    $raza->obtenerRazaAnimal($especieId);
}//if accion
?>
