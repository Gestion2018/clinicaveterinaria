<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar']) || isset($_POST['eliminarPeso']) || isset($_POST['actualizarPeso'])) {
	include_once '../../data/data.php';
	include '../../domain/diagnostico/diagnostico.php';
}else {
	include_once '../data/data.php';
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
                "'".$diagnostico->getAnimalId() ."'". "," .
                "'".$diagnostico->getFechaDiagnostico() ."'". "," .
                "'".$diagnostico->getDescripcionDiagnostico() ."'". "," .
                "'".$diagnostico->getDiagnosticoEstado() ."'". ");";
        $result = mysqli_query($conn, $queryInsert);
        //mysqli_close($conn);

////PESO ANIMAL


        /*$conn2 = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn2->set_charset('utf8');

        //Get the last id
        $queryGetLastId2 = "SELECT MAX(pesoanimalid) AS pesoanimalid  FROM tbdiagnostico";
        $idCont2 = mysqli_query($conn2, $queryGetLastId2);
        $nextId2 = 1;

        if ($row = mysqli_fetch_row($idCont2)) {
            $nextId2 = trim($row[0]) + 1;
        }//end if*/

        $queryInsert2 = "INSERT INTO tbpesoanimal VALUES(" . $nextId . "," .
        $diagnostico->getAnimalId().",".
        "'".$diagnostico->getAnimalPeso() ."'".");";
        $result = mysqli_query($conn, $queryInsert2);
        mysqli_close($conn);

        return $result;

    }//insertar diagnostico


    public function actualizarDiagnostico($diagnostico) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbdiagnostico SET diagnosticoanimalid = " . "'".$diagnostico->getAnimalId() ."'".
                ", diagnosticofecha = " ."'". $diagnostico->getFechaDiagnostico() ."'".
                ", diagnosticodescripcion = " ."'". $diagnostico->getDescripcionDiagnostico() ."'".
                " WHERE diagnosticoid = " . $diagnostico->getDiagnosticoId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        
        $queryUpdate2 = "UPDATE tbpesoanimal SET animalpeso = "."'".$diagnostico->getAnimalPeso()."'"." WHERE diagnosticoid = ".$diagnostico->getDiagnosticoId().";";
        
        $result = mysqli_query($conn, $queryUpdate2);
        mysqli_close($conn);

        return $result;

    }//actualizar diagnostico


    public function eliminarDiagnostico($diagnosticoid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbdiagnostico SET diagnosticoestado = 'B' WHERE diagnosticoid = " . $diagnosticoid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminar diagnostico

    function calculaedad($fechanacimiento){
        list($ano,$mes,$dia) = explode("-",$fechanacimiento);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;
        return $ano_diferencia;
    }//funcion

    public function obtenerDiagnosticos() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbdiagnostico, tbpesoanimal WHERE tbdiagnostico.diagnosticoid = tbpesoanimal.diagnosticoid;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $diagnosticos = [];
        while ($row = mysqli_fetch_array($result)) {
            if($row['diagnosticoestado']!='B'){
                $diagnostico = new diagnostico($row['diagnosticoid'], $row['diagnosticoanimalid'],$row['animalpeso'],$row['diagnosticofecha'], $row['diagnosticodescripcion'], $row['diagnosticoestado']);
                array_push($diagnosticos, $diagnostico);

            }//end if

        }//end while

        return $diagnosticos;

    }//obtenerdiagnosticos



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

    public function obtenerPesoAnimal($animalId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbdiagnostico.diagnosticofecha, tbpesoanimal.diagnosticoid,  tbpesoanimal.animalpeso, tbpesoanimal.animalid,tbanimal.animalnombre FROM tbpesoanimal, tbanimal, tbdiagnostico WHERE tbanimal.animalid = ".$animalId." AND (tbpesoanimal.animalid=".$animalId." AND tbpesoanimal.diagnosticoid = tbdiagnostico.diagnosticoid);";
        $result = mysqli_query($conn, $querySelect);
        $pesosanimal = [];
        
        while ($row = mysqli_fetch_array($result)) {
            $pesosanimal [] = $row;
        }//end while

        mysqli_close($conn);

        return $pesosanimal;

    }//obtenerEspecie

    public function actualizarPesoAnimal($diagnosticoId, $animalId, $peso) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbpesoanimal SET animalpeso = ". "'" .$peso."'". " WHERE animalid =". $animalId ." AND diagnosticoid=". $diagnosticoId .";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar especie

}//end class

?>
