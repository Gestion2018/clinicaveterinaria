<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])) {
	include '../../data/data.php';
	include '../../domain/medico/medico.php';
}else {
	include '../data/data.php';
	include '../domain/medico/medico.php';
}


class DiagnosticoData extends Data {

	public function insertarDiagnostico($diagnostico) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(diagnosticoid) AS diagnosticoid  FROM tbdiagnostico";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbdiagnostico VALUES (" . $nextId . "," .
                "'".$medico->getMedicoNumeroIdentificacion() ."'". "," .
                "'".$medico->getMedicoNombreCompleto() ."'". "," .
                "'".$medico->getMedicoCorreo() ."'". "," .
                "'".$medico->getMedicoEspecialidad() ."'". "," .
                "'".$medico->getMedicoLicencia() ."'". "," .
                "'".$medico->getMedicoFechaVigenciaLicencia() ."'". "," .
                "'".$medico->getMedicoEstado() ."'". "," .
                "'".$medico->getMedicoInclusionLaboral() ."'". ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;

    }//insertar medico


    public function actualizarMedico($medico) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbmedico SET medicoid=" . $medico->getMedicoId() .
                ", mediconumeroidentificacion = " . "'".$medico->getMedicoNumeroIdentificacion() . "'".
                ", mediconombrecompleto = " . "'".$medico->getMedicoNombreCompleto() ."'".
                ", medicocorreo = " . "'".$medico->getMedicoCorreo() ."'".
                ", medicoespecialidad = " ."'". $medico->getMedicoEspecialidad() ."'".
                ", medicolicencia = " ."'". $medico->getMedicoLicencia() ."'".
                ", medicofechavigencialicencia = " ."'". $medico->getMedicoFechaVigenciaLicencia() ."'".
                ", medicoestado = " ."'". $medico->getMedicoEstado() ."'".
                ", medicoinclusionlaboral = " ."'". $medico->getMedicoInclusionLaboral() ."'".
                " WHERE medicoid = " . $medico->getMedicoId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar medico


    public function eliminarMedico($medicoid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbmedico SET medicoestado = 'B' WHERE medicoid = " . $medicoid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminar medico



    public function obtenerMedicos() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbmedico;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $medicos = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['medicoestado']!='B'){
                $medico = new medico($row['medicoid'], $row['mediconumeroidentificacion'], $row['mediconombrecompleto'],
                $row['medicocorreo'], $row['medicoespecialidad'], $row['medicolicencia'], $row['medicofechavigencialicencia'],
                $row['medicoestado'], $row['medicoinclusionlaboral']);
                array_push($medicos, $medico);

            }//end if

        }//end while

        return $medicos;

    }//obtenerMedicos


    public function obtenerActualizar($medicoId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbmedico;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $medicos = [];

        while ($row = mysqli_fetch_array($result)) {

            if($row['medicoestado']!='B' && $row['medicoid']==$medicoId){
                $medico = new medico($row['medicoid'], $row['mediconumeroidentificacion'], $row['mediconombrecompleto'],
                $row['medicocorreo'], $row['medicoespecialidad'], $row['medicolicencia'], $row['medicofechavigencialicencia'],
                $row['medicoestado']);
                array_push($medicos, $medico);

            }//end if

        }//end while

        return $medicos;
    }//obtenerActualziar



}//end class

?>
