<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/

if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])) {

	include_once '../../data/data.php';
	include '../../domain/sintoma/sintoma.php';

}else {

	include '../data/data.php';
	include '../domain/sintoma/sintoma.php';

}

class SintomaData extends Data {

	public function insertarSintoma($sintoma) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(sintomaid) AS sintomaid  FROM tbsintoma";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbsintoma VALUES (" . $nextId . "," .
        "'".$sintoma->getSintomaNombre() ."'".",". "'" . $sintoma->getSintomaDescripcion() . "'" .
        "," . "'" . $sintoma->getSintomaEstado() . "'" .");";
        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);

		    return $result;

    }//insertar especie


     public function actualizarSintoma($sintoma) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbsintoma SET sintomanombre = " . "'" . $sintoma->getSintomaNombre() . "'".
        ", sintomadescripcion = " . "'" . $sintoma->getSintomaDescripcion() . "'".
         "WHERE sintomaid =". $sintoma->getSintomaId() .";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar especie

		public function insertarSintomaEnfermedad($idsintoma,$idenfermedad){
			$conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
			$conn->set_charset('utf8');

			//Get the last id
			$queryGetLastId = "SELECT MAX(sintomaenfermadadid) AS sintomaenfermadadid  FROM tbsintomaenfermedad";
			$idCont = mysqli_query($conn, $queryGetLastId);
			$nextId = 1;

			if ($row = mysqli_fetch_row($idCont)) {
					$nextId = trim($row[0]) + 1;
			}//end if

			$queryInsert = "INSERT INTO tbsintomaenfermedad VALUES (".$nextId.",".$idsintoma.",".$idenfermedad.");";
			$result = mysqli_query($conn, $queryInsert);
			mysqli_close($conn);

			return $result;
		}//isertarSintomaEnfermedad


    public function eliminarSintoma($sintomaid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbsintoma SET sintomaestado = 'B' WHERE sintomaid = " . $sintomaid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminarEspecie



       public function obtenerSintomas() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbsintoma;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $sintomas = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['sintomaestado']!='B'){
                $sintoma= new sintoma($row['sintomaid'], $row['sintomanombre'],
                $row['sintomadescripcion'],$row['sintomaestado']);
                array_push($sintomas, $sintoma);

            }//end if
        }//end while

        return $sintomas;

    }//obtenerEspecie


    public function obtenerActualizar($sintomaId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbsintoma;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $sintomas = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['sintomaestado']!='B' && $row['sintomaid']==$sintomaId){
              $sintoma= new sintoma($row['sintomaid'], $row['sintomanombre'],
              $row['sintomadescripcion'],$row['sintomaestado']);
              array_push($sintomas, $sintoma);


            }//end if

        }//end while

        return $sintomas;

    }//obtenerActualizar



}//end class

?>
