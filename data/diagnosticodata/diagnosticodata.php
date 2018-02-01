<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])) {
	include '../../data/data.php';
	include '../../domain/diagnostico/diagnostico.php';
}else {
	include '../data/data.php';
	include '../domain/diagnostico/diagnostico.php';
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
                "'".$diagnostico->getDiagnosticoIdCliente() ."'". "," .
                "'".$diagnostico->getDiagnosticoAnimalID() ."'". "," .
                "'".$diagnostico->getDiagnosticoPeso() ."'". "," .
                "'".$diagnostico->getDiagnosticoFecha() ."'". "," .
                "'".$diagnostico->getDiagnosticoDescripcion() ."'".
                "'".$diagnostico->getDiagnosticoEstado() ."'". ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);

////PESO ANIMAL


        $conn2 = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn2->set_charset('utf8');

        //Get the last id
        $queryGetLastId2 = "SELECT MAX(pesoanimalid) AS pesoanimalid  FROM tbdiagnostico";
        $idCont2 = mysqli_query($conn2, $queryGetLastId2);
        $nextId2 = 1;

        if ($row = mysqli_fetch_row($idCont2)) {
            $nextId2 = trim($row[0]) + 1;
        }//end if

        $queryInsert2 = "INSERT INTO tbpesoanimal (" . $nextId2 . "," .
        "'".$nextId ."'".","
        "'".$diagnostico->getDiagnosticoAnimalID() ."'".",".
        "'".$diagnostico->getDiagnosticoPeso() ."'".",".
				"'".$diagnostico->getDiagnosticoId() ."'".
        "'" . $pesoanimal->getPesoAnimalEstado() . "'" .");";
        $result = mysqli_query($conn2, $queryInsert2);
        mysqli_close($conn2);

        return $result;

    }//insertar medico


    public function actualizarDiagnostico($diagnostico) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbdiagnostico SET diagnosticoid=" . $diagnostico->getDiagnosticoId() .
                ", diagnosticoidcliente = " . "'".$diagnostico->getDiagnisticoIdCliente() . "'".
                ", diagnosticoanimalid = " . "'".$diagnostico->getDiagnosticoAnimalID() ."'".
                ", diagnosticopeso = " ."'". $diagnosticopeso->getDiagnosticoPeso() ."'".
                ", diagnosticofecha = " ."'". $diagnostico->getDiagnosticoFecha() ."'".
                ", diagnosticodescripcion = " ."'". $diagnostico->getDiagnosticoDescripcion() ."'".
                " WHERE diagnosticoid = " . $diagnostico->getDiagnosticoId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar medico


    public function eliminarDiagnostico($diagnosticoid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbdiagnostico SET diagnosticoestado = 'B' WHERE diagnosticoid = " . $diagnosticoid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminar medico



    public function obtenerDiagnosticos() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbdiagnostico;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $diagnosticos = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['diagnosticoestado']!='B'){
                $diagnostico = new diagnostico($row['diagnosticoid'], $row['diagnosticoidcliente'], $row['diagnosticoanimalid'],
                $row['diagnosticopeso'],$row['diagnosticofecha'], $row['diagnosticodescripcion'], $row['diagnosticoestado']);
                array_push($diagnosticos, $diagnostico);

            }//end if

        }//end while

        return $diagnosticos

    }//obtenerMedicos



    public function obtenerActualizar($diagnosticoId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbdiagnostico;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $medicos = [];

        while ($row = mysqli_fetch_array($result)) {

            if($row['diagnosticoestado']!='B' && $row['diagnosticoid']==$diagnosticoId){
							$diagnostico = new diagnostico($row['diagnosticoid'], $row['diagnosticoidcliente'], $row['diagnosticoanimalid'],
							$row['diagnosticopeso'],$row['diagnosticofecha'], $row['diagnosticodescripcion'], $row['diagnosticoestado']);
							array_push($diagnosticos, $diagnostico);

            }//end if

        }//end while

        return $diagnosticos;
    }//obtenerActualziar



}//end class

?>
