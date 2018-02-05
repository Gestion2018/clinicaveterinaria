<?php

include './diagnosticoBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['diagnosticoId']) && isset($_POST['animalId']) && isset($_POST['animalPeso']) && isset($_POST['fechaDiagnostico']) && isset($_POST['descripcionDiagnostico']) && isset($_POST['diagnosticoEstado'])) {
            
        $diagnosticoId = $_POST['diagnosticoId'];
        $animalId = $_POST['animalId'];
        $animalPeso = $_POST['animalPeso'];
        $fechaDiagnostico = $_POST['fechaDiagnostico'];
        $descripcionDiagnostico = $_POST['descripcionDiagnostico'];
        $diagnosticoEstado = $_POST['diagnosticoEstado'];

        if (strlen($diagnosticoId) > 0 && strlen($animalId) > 0 && strlen($animalPeso) > 0 && strlen($descripcionDiagnostico) > 0 && strlen($fechaDiagnostico) > 0) {
            if (!is_numeric($descripcionDiagnostico)) {
                $diagnostico = new diagnostico($diagnosticoId, $animalId, $animalPeso, $fechaDiagnostico, $descripcionDiagnostico, $diagnosticoEstado);

                $diagnosticoBusiness = new DiagnosticoBusiness();

                $resultado = $diagnosticoBusiness->actualizarTBDiagnostico($diagnostico);
                
                if ($resultado == 1) {
                    header("location: ../../view/diagnosticoView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/diagnosticoView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/diagnosticoView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/diagnosticoView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/diagnosticoView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['diagnosticoId'])) {

        $diagnosticoId = $_POST['diagnosticoId'];

        $diagnosticoBusiness = new DiagnosticoBusiness();
        $resultado = $diagnosticoBusiness->eliminarTBDiagnostico($diagnosticoId);

        if ($resultado == 1) {
            header("location: ../../view/diagnosticoView.php?success=deleted");
        } else {
            header("location: ../../view/diagnosticoView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/diagnosticoView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['animalId']) && isset($_POST['animalPeso']) && isset($_POST['fechaDiagnostico']) && isset($_POST['descripcionDiagnostico']) && isset($_POST['diagnosticoEstado'])) {
            
        $animalId = $_POST['animalId'];
        $animalPeso = $_POST['animalPeso'];
        $fechaDiagnostico = $_POST['fechaDiagnostico'];
        $descripcionDiagnostico = $_POST['descripcionDiagnostico'];
        $diagnosticoEstado = $_POST['diagnosticoEstado'];

        if (strlen($animalId) > 0 && strlen($animalPeso) > 0 && strlen($descripcionDiagnostico) > 0 && strlen($fechaDiagnostico) > 0) {
            if (!is_numeric($descripcionDiagnostico)) {
                $diagnostico = new diagnostico(0, $animalId, $animalPeso, $fechaDiagnostico, $descripcionDiagnostico, $diagnosticoEstado);

                $diagnosticoBusiness = new DiagnosticoBusiness();

                $resultado = $diagnosticoBusiness->insertarTBDiagnostico($diagnostico);

                if ($resultado == 1) {
                    header("location: ../../view/diagnosticoView.php?success=inserted");
                } else {
                    header("location: ../../view/diagnosticoView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/diagnosticoView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/diagnosticoView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/diagnosticoView.php?error=error");
    }//if si esta seteado el campo
}//if accion
?>