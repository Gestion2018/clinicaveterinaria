<?php

include './medicoBusiness.php';

if (isset($_POST['actualizar'])) {

    if ( isset($_POST['medicoId']) && isset($_POST['medicoNumeroIdentificacion']) && isset($_POST['medicoNombreCompleto']) && isset($_POST['medicoCorreo']) && isset($_POST['medicoEspecialidad']) && isset($_POST['medicoLicencia']) && isset($_POST['medicoFechaVigenciaLicencia']) && isset($_POST['medicoEstado']) && isset($_POST['medicoInclusionLaboral'])) {
            
        $medicoId = $_POST['medicoId'];
        $medicoNumeroIdentificacion = $_POST['medicoNumeroIdentificacion'];
        $medicoNombreCompleto = $_POST['medicoNombreCompleto'];
        $medicoCorreo = $_POST['medicoCorreo'];
        $medicoEspecialidad = $_POST['medicoEspecialidad'];
        $medicoLicencia = $_POST['medicoLicencia'];
        $medicoFechaVigenciaLicencia = $_POST['medicoFechaVigenciaLicencia'];
        $medicoEstado = $_POST['medicoEstado'];
        $medicoInclusionLaboral = $_POST['medicoInclusionLaboral'];
        

        if (strlen($medicoNumeroIdentificacion) > 0 && strlen($medicoNombreCompleto) > 0 && strlen($medicoCorreo) > 0 && strlen($medicoEspecialidad) > 0 && strlen($medicoLicencia) > 0 && strlen($medicoFechaVigenciaLicencia) > 0 && strlen($medicoEstado) > 0 && strlen($medicoInclusionLaboral) > 0) {
            if (!is_numeric($medicoNombreCompleto)) {
                $medico = new medico($medicoId, $medicoNumeroIdentificacion, $medicoNombreCompleto, $medicoCorreo, $medicoEspecialidad, $medicoLicencia, $medicoFechaVigenciaLicencia, $medicoEstado, $medicoInclusionLaboral);

                $medicoBusiness = new medicoBusiness();

                $resultado = $medicoBusiness->actualizarTBMedico($medico);
                if ($resultado == 1) {
                    header("location: ../../view/medicoView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/medicoView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/medicoView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/medicoView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location:../../view/medicoView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['medicoId'])) {

        $medicoId = $_POST['medicoId'];

        $medicoBusiness = new medicoBusiness();
        $resultado = $medicoBusiness->eliminarTBMedico($medicoId);

        if ($resultado == 1) {
            header("location: ../../view/medicoView.php?success=deleted");
        } else {
            header("location: ../../view/medicoView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/medicoView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['medicoNumeroIdentificacion']) && isset($_POST['medicoNombreCompleto']) && isset($_POST['medicoCorreo']) && isset($_POST['medicoEspecialidad']) && isset($_POST['medicoLicencia']) && isset($_POST['medicoFechaVigenciaLicencia']) && isset($_POST['medicoEstado']) && isset($_POST['medicoInclusionLaboral'])) {
            
        $medicoNumeroIdentificacion = $_POST['medicoNumeroIdentificacion'];
        $medicoNombreCompleto = $_POST['medicoNombreCompleto'];
        $medicoCorreo = $_POST['medicoCorreo'];
        $medicoEspecialidad = $_POST['medicoEspecialidad'];
        $medicoLicencia = $_POST['medicoLicencia'];
        $MedicoFechaVigenciaLicencia = $_POST['medicoFechaVigenciaLicencia'];
        $medicoEstado = $_POST['medicoEstado'];
        $medicoInclusionLaboral = $_POST['medicoInclusionLaboral'];
        
        if (strlen($medicoNumeroIdentificacion) > 0 && strlen($medicoNombreCompleto) > 0 && strlen($medicoCorreo) > 0 && strlen($medicoEspecialidad) > 0 && strlen($medicoLicencia) > 0 && strlen($MedicoFechaVigenciaLicencia) > 0 && strlen($medicoEstado) > 0 && strlen($medicoInclusionLaboral) > 0) {
            if (!is_numeric($medicoNombreCompleto)) {
                $medico = new Medico(0, $medicoNumeroIdentificacion, $medicoNombreCompleto, $medicoCorreo, $medicoEspecialidad, $medicoLicencia, $MedicoFechaVigenciaLicencia, $medicoEstado, $medicoInclusionLaboral);

                $medicoBusiness = new MedicoBusiness();

                $resultado = $medicoBusiness->insertarTBMedico($medico);

                if ($resultado == 1) {
                    header("location: ../../view/medicoView.php?success=inserted");
                } else {
                    header("location: ../../view/medicoView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/medicoView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/medicoView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../view/medicoView.php?error=error");
    }//if si esta seteado el campo
}//if accion
?>
