<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/

if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])) {

	include_once '../../data/data.php';
	include '../../domain/pesoanimal/pesoanimal.php';

}else {

	include_once '../data/data.php';
	include '../domain/pesoanimal/pesoanimal.php';

}

class PesoAnimalData extends Data {

	public function insertarPesoAnimal($pesoanimal) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(pesoanimalid) AS pesoanimalid  FROM tbpesonanimal";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbpesonanimal VALUES (" . $nextId . "," .
        "'".$pesoanimal->getPesoAnimalAnimalID() ."'".","
        "'".$pesoanimal->getPesoAnimalPeso() ."'".",".
        "'".$pesoanimal->getPesoAnimalDiagnosticoId() ."'".",".
        "'" . $pesoanimal->getPesoAnimalEstado() . "'" .");";
        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
		return $result;

	}//else-if

    }//insertar especie


     public function actualizarPesoAnimal($diagnosticoId, $animalId, $peso) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbpesoanimal SET animalpeso = ". "'" .$peso."'". ", WHERE animalid =". $animalId ." AND diagnosticoid=". $diagnosticoId .";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar especie


    public function eliminarPesoAnimal($animalId, $diagnosticoId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE tbpesoanimal WHERE animalid = " . $animalid . " AND diagnosticoid = ". $diagnosticoId .";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminarEspecie

/*SELECT tbdiagnostico.diagnosticofecha, tbpesoanimal.diagnosticoid, tbpesoanimal.animalpeso, tbpesoanimal.animalid,tbanimal.animalnombre FROM tbpesoanimal, tbanimal, tbdiagnostico WHERE tbanimal.animalid = 2 AND (tbpesoanimal.animalid=2 AND tbpesoanimal.diagnosticoid = tbdiagnostico.diagnosticoid);*/


       public function obtenerPesoAnimal($animalId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbdiagnostico.diagnosticofecha, tbpesoanimal.diagnosticoid,  tbdiagnostico.animalpeso, tbpesoanimal.animalid,tbanimal.animalnombre FROM tbpesoanimal, tbanimal, tbdiagnostico WHERE tbanimal.animalid = ".$animalId." AND (tbpesoanimal.animalid=".$animalId." AND tbpesoanimal.diagnosticoid = tbdiagnostico.diagnosticoid);";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $pesosanimal = [];
        while ($row = mysqli_fetch_array($result)) {
            $pesosanimal [] = $row;
        }//end while

        return $pesosanimal;

    }//obtenerEspecie


    public function obtenerActualizar($pesoanimalId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $result = mysqli_query($conn, $querySelect);
        $querySelect = "SELECT * FROM tbpesonanimal;";
        mysqli_close($conn);
        $razas = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['pesoanimalestado']!='B' && $row['pesoanimalid']==$pesoanimalId){
              $pesoanimal = new pesoanimal($row['pesoanimalid'], $row['pesonanimalanimalid'],
              $row['pesoanimalpeso'],$row['pesoanimaldiagnosticoid'],$row['pesoanimaldiagnosticoestado']);
              array_push($pesosanimal, $pesoanimal);

            }//end if

        }//end while

        return $pesosanimal;

    }//obtenerActualizar

}//end class

?>
