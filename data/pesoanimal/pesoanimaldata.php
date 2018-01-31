<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/

if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])) {

	include_once '../../data/data.php';
	include '../../domain/especie/especie.php';

}else {

	include '../data/data.php';
	include '../domain/especie/especie.php';

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


     public function actualizarPesoAnimal($pesoanimal) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbpesonanimal SET " .
        "pesonanimalanimalid = " . "'" .$pesoanimal->getPesoAnimalAnimalID() . "'". ", ".
        "pesoanimalpeso = " .$pesoanimal->getPesoAnimalAnimalID() . "'". "," .
        "pesoanimaldiagnosticoid = " .$pesoanimal->getPesoAnimalDiagnosticoId() . "'". "," .
        "WHERE pesoanimalid =". $pesoanimal->getPesoAnimalId() .";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar especie


    public function eliminarPesoAnimal($pesoanimalid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbpesonanimal SET pesoanimalestado = 'B' WHERE" .
        " pesoanimalid = " . $pesoanimalid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminarEspecie



       public function obtenerPesoAnimal() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbpesonanimal;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $pesosanimal = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['pesoanimalestado']!='B'){
                $pesoanimal = new pesoanimal($row['pesoanimalid'], $row['pesonanimalanimalid'],
                $row['pesoanimalpeso'],$row['pesoanimaldiagnosticoid']);
                array_push($pesosanimal, $pesoanimal);

            }//end if
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
              $row['pesoanimalpeso'],$row['pesoanimaldiagnosticoid']);
              array_push($pesosanimal, $pesoanimal);

            }//end if

        }//end while

        return $razas;

    }//obtenerActualizar



}//end class

?>
