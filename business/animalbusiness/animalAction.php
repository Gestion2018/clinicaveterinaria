<?php

include './animalBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['animalNombre']) && isset($_POST['animalId']) && isset($_POST['especieRazaId']) && isset($_POST['clienteId']) && isset($_POST['animalFechaNacimiento']) && isset($_POST['animalEstado'])) {
            
        $animalNombre = $_POST['animalNombre'];
        $animalId = $_POST['animalId'];
        $especieRazaId = $_POST['especieRazaId'];
        $clienteId = $_POST['clienteId'];
        $animalFechaNacimiento = $_POST['animalFechaNacimiento'];
        $animalEstado = $_POST['animalEstado'];

        if($especieRazaId != -1){
            if (strlen($animalNombre) > 0 && strlen($animalId) > 0 && strlen($especieRazaId) > 0 && strlen($clienteId) > 0 && strlen($animalFechaNacimiento) > 0) {
                if (!is_numeric($animalNombre)) {
                    $animal = new animal($animalNombre, $animalId, $especieRazaId, $clienteId, $animalFechaNacimiento, $animalEstado);

                    $animalBusiness = new AnimalBusiness();

                    $resultado = $animalBusiness->actualizarTBAnimal($animal);
                    
                    if ($resultado == 1) {
                        header("location: ../../view/animalView.php?success=updated");
                    } else {
                        //echo $idSickness." - ".$bullName;
                        header("location: ../../view/animalView.php?error=dbError");
                    }//if error a nivel de base
                } else {
                    header("location: ../../view/animalView.php?error=numberFormat");
                }//if si se igreso un numero
            } else {
                header("location: ../../view/animalView.php?error=emptyField");
            }//if si se dejo en blanco
        }else{
            header("location: ../../view/animalView.php?error=numberFormat");
        }//if si no se selecciono la raza
    } else {
        header("location: ../../view/animalView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['animalId'])) {

        $animalId = $_POST['animalId'];

        $animalBusiness = new AnimalBusiness();
        $resultado = $animalBusiness->eliminarTBAnimal($animalId);

        if ($resultado == 1) {
            header("location: ../../view/animalView.php?success=deleted");
        } else {
            header("location: ../../view/animalView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/animalView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['animalNombre']) && isset($_POST['especieRazaId']) && isset($_POST['clienteId']) && isset($_POST['animalFechaNacimiento']) && isset($_POST['animalEstado'])) {
            
        $animalNombre = $_POST['animalNombre'];
        $especieRazaId = $_POST['especieRazaId'];
        $clienteId = $_POST['clienteId'];
        $animalFechaNacimiento = $_POST['animalFechaNacimiento'];
        $animalEstado = $_POST['animalEstado'];
        
        if($especieRazaId != -1){
            if (strlen($animalNombre) > 0 && strlen($especieRazaId) > 0 && strlen($clienteId) > 0 && strlen($animalFechaNacimiento) > 0) {
                if (!is_numeric($animalNombre)) {
                    $animal = new animal($animalNombre, 0, $especieRazaId, $clienteId, $animalFechaNacimiento, $animalEstado);

                    $animalBusiness = new AnimalBusiness();

                    $resultado = $animalBusiness->insertarTBAnimal($animal);

                    if ($resultado == 1) {
                        header("location: ../../view/animalView.php?success=inserted");
                    } else {
                        header("location: ../../view/animalView.php?error=dbError");
                    }//if error a nivel de base
                } else {
                    header("location: ../../view/animalView.php?error=numberFormat");
                }//if si se igreso un numero
            } else {
                header("location: ../../view/animalView.php?error=emptyField");
            }//if si se dejo en blanco
        }else{
            header("location: ../../view/animalView.php?error=numberFormat");
        }//if si no se selecciono la raza
    } else {
        header("location: ../../view/animalView.php?error=error");
    }//if si esta seteado el campo
}//if accion
?>