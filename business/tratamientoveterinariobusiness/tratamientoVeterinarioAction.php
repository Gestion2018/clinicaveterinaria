<?php

include './tratamientoVeterinarioBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['tratamientoVeterinarioId']) && isset($_POST['productoVeterinarioId']) && isset($_POST['enfermedadesComunesId']) && isset($_POST['tratamientoVeterinarioDosis']) && isset($_POST['tratamientoVeterinarioPeriodicidad']) && isset($_POST['tratamientoVeterinarioFecha'])) {
            
        $tratamientoVeterinarioId = $_POST['tratamientoVeterinarioId'];
        $productoVeterinarioId = $_POST['productoVeterinarioId'];
        $enfermedadescomunesId = $_POST['enfermedadesComunesId'];
        $tratamientoVeterinarioDosis = $_POST['tratamientoVeterinarioDosis'];
        $tratamientoVeterinarioPeriodicidad = $_POST['tratamientoVeterinarioPeriodicidad'];
        $tratamientoVeterinarioFecha = $_POST['tratamientoVeterinarioFecha'];
        $tratamientoVeterinarioEstado = $_POST['tratamientoVeterinarioEstado'];
        $animalId = $_POST['animalId'];

        if (strlen($tratamientoVeterinarioDosis) > 0 && strlen($tratamientoVeterinarioPeriodicidad) > 0 && strlen($tratamientoVeterinarioFecha) > 0) {
            if (!is_numeric($tratamientoVeterinarioDosis) && !is_numeric($tratamientoVeterinarioPeriodicidad) && !is_numeric($tratamientoVeterinarioFecha)) {
                $tratamientoVeterinario = new tratamientoveterinario($tratamientoVeterinarioId, $productoVeterinarioId, $enfermedadescomunesId, $tratamientoVeterinarioDosis, $tratamientoVeterinarioPeriodicidad, $tratamientoVeterinarioFecha, $animalId, $tratamientoVeterinarioEstado);

                $tratamientoVeterinarioBusiness = new TratamientoVeterinarioBusiness();

                $resultado = $tratamientoVeterinarioBusiness->actualizarTBTratamientoVeterinario($tratamientoVeterinario);
                if ($resultado == 1) {
                    header("location: ../../view/tratamientoView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/tratamientoView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/tratamientoView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/tratamientoView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location:../../view/tratamientoView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['tratamientoVeterinarioId'])) {

        $tratamientoVeterinarioId = $_POST['tratamientoVeterinarioId'];

        $tratamientoVeterinarioBusiness = new TratamientoVeterinarioBusiness();
        $resultado = $tratamientoVeterinarioBusiness->eliminarTBTratamientoVeterinario($tratamientoVeterinarioId);

        if ($resultado == 1) {
            header("location: ../../view/tratamientoView.php?success=deleted");
        } else {
            header("location: ../../view/tratamientoView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/tratamientoView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['productoVeterinarioId']) && isset($_POST['enfermedadesComunesId']) && isset($_POST['tratamientoVeterinarioDosis']) && isset($_POST['tratamientoVeterinarioPeriodicidad']) && isset($_POST['tratamientoVeterinarioFecha']) && isset($_POST['animalId'])) {

        $productoVeterinarioId = $_POST['productoVeterinarioId'];
        $enfermedadescomunesId = $_POST['enfermedadesComunesId'];
        $tratamientoVeterinarioDosis = $_POST['tratamientoVeterinarioDosis'];
        $tratamientoVeterinarioPeriodicidad = $_POST['tratamientoVeterinarioPeriodicidad'];
        $tratamientoVeterinarioFecha = $_POST['tratamientoVeterinarioFecha'];
        $animalId = $_POST['animalId'];
        $tratamientoVeterinarioEstado = $_POST['tratamientoVeterinarioEstado'];
        

        if (strlen($tratamientoVeterinarioDosis) > 0 && strlen($tratamientoVeterinarioPeriodicidad) > 0 && strlen($tratamientoVeterinarioFecha) > 0) {
            if (!is_numeric($tratamientoVeterinarioDosis) && !is_numeric($tratamientoVeterinarioPeriodicidad) && !is_numeric($tratamientoVeterinarioFecha)) {
                $tratamientoVeterinario = new tratamientoveterinario(0, $productoVeterinarioId, $enfermedadescomunesId, $tratamientoVeterinarioDosis, $tratamientoVeterinarioPeriodicidad, $tratamientoVeterinarioFecha, $animalId, $tratamientoVeterinarioEstado);

                $tratamientoVeterinarioBusiness = new TratamientoVeterinarioBusiness();

                $resultado = $tratamientoVeterinarioBusiness->insertarTBTratamientoVeterinario($tratamientoVeterinario);

                if ($resultado == 1) {
                    header("location: ../../view/tratamientoView.php?success=inserted");
                } else {
                    header("location: ../../view/tratamientoView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/tratamientoView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/tratamientoView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/tratamientoView.php?error=error");
    }//if si esta seteado el campo
}//if
?>
