<?php

include './tratamientoVeterinarioBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['tratamientoVeterinarioId']) && isset($_POST['productoVeterinarioId']) && isset($_POST['enfermedadescomunesId']) && isset($_POST['tratamientoVeterinarioDosis']) && isset($_POST['tratamientoVeterinarioPeriodicidad']) && isset($_POST['tratamientoVeterinarioFecha'])) {
            
        $tratamientoVeterinarioId = $_POST['tratamientoVeterinarioId'];
        $productoVeterinarioId = $_POST['productoVeterinarioId'];
        $enfermedadescomunesId = $_POST['enfermedadescomunesId'];
        $tratamientoVeterinarioDosis = $_POST['tratamientoVeterinarioDosis'];
        $tratamientoVeterinarioPeriodicidad = $_POST['tratamientoVeterinarioPeriodicidad'];
        $tratamientoVeterinarioFecha = $_POST['tratamientoVeterinarioFecha'];
        

        if (strlen($tratamientoVeterinarioDosis) > 0 && strlen($tratamientoVeterinarioPeriodicidad) > 0 && strlen($tratamientoVeterinarioFecha) > 0) {
            if (!is_numeric($tratamientoVeterinarioDosis) && !is_numeric($tratamientoVeterinarioPeriodicidad) && !is_numeric($tratamientoVeterinarioFecha)) {
                $tratamientoVeterinario = new tratamientoveterinario($tratamientoVeterinarioId, $productoVeterinarioId, $enfermedadescomunesId, $tratamientoVeterinarioDosis, $tratamientoVeterinarioPeriodicidad, $tratamientoVeterinarioFecha);

                $tratamientoVeterinarioBusiness = new TratamientoVeterinarioBusiness();

                $resultado = $tratamientoVeterinarioBusiness->actualizarTBTratamientoVeterinario($tratamientoVeterinario);
                if ($resultado == 1) {
                    header("location: ../../view/tratamientoVeterinarioView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/tratamientoVeterinarioView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/tratamientoVeterinarioView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/tratamientoVeterinarioView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location:../../view/tratamientoVeterinarioView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['tratamientoVeterinarioId'])) {

        $tratamientoVeterinarioId = $_POST['tratamientoVeterinarioId'];

        $tratamientoVeterinarioBusiness = new TratamientoVeterinarioBusiness();
        $resultado = $tratamientoVeterinarioBusiness->eliminarTBTratamientoVetrinario($tratamientoVeterinarioId);

        if ($resultado == 1) {
            header("location: ../../view/tratamientoVeterinarioView.php?success=deleted");
        } else {
            header("location: ../../view/tratamientoVeterinarioView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/tratamientoVeterinarioView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['productoVeterinarioId']) && isset($_POST['enfermedadescomunesId']) && isset($_POST['tratamientoVeterinarioDosis']) && isset($_POST['tratamientoVeterinarioPeriodicidad']) && isset($_POST['tratamientoVeterinarioFecha'])) {

        $productoVeterinarioId = $_POST['productoVeterinarioId'];
        $enfermedadescomunesId = $_POST['enfermedadescomunesId'];
        $tratamientoVeterinarioDosis = $_POST['tratamientoVeterinarioDosis'];
        $tratamientoVeterinarioPeriodicidad = $_POST['tratamientoVeterinarioPeriodicidad'];
        $tratamientoVeterinarioFecha = $_POST['tratamientoVeterinarioFecha'];
        

        if (strlen($tratamientoVeterinarioDosis) > 0 && strlen($tratamientoVeterinarioPeriodicidad) > 0 && strlen($tratamientoVeterinarioFecha) > 0) {
            if (!is_numeric($tratamientoVeterinarioDosis) && !is_numeric($tratamientoVeterinarioPeriodicidad) && !is_numeric($tratamientoVeterinarioFecha)) {
                $tratamientoVeterinario = new tratamientoveterinario(0, $productoVeterinarioId, $enfermedadescomunesId, $tratamientoVeterinarioDosis, $tratamientoVeterinarioPeriodicidad, $tratamientoVeterinarioFecha);

                $tratamientoVeterinarioBusiness = new TratamientoVeterinarioBusiness();

                $resultado = $tratamientoVeterinarioBusiness->insertarTBTratamientoVeterinario($tratamientoVeterinario);

                if ($resultado == 1) {
                    header("location: ../../view/tratamientoVeterinarioView.php?success=inserted");
                } else {
                    header("location: ../../view/tratamientoVeterinarioView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/tratamientoVeterinarioView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/tratamientoVeterinarioView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../view/tratamientoVeterinarioView.php?error=error");
    }//if si esta seteado el campo
}//if accion
?>
