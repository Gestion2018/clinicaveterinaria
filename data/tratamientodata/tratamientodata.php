<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/

if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])) {

	include_once '../../data/data.php';
	include '../../domain/tratamiento/tratamiento.php';

}else {

	include '../data/data.php';
	include '../domain/tratamiento/tratamiento.php';

}

class TratamientoData extends Data {

	public function insertarTratamiento($tratamiento) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tratamientoid) AS tratamientoid  FROM tbtratamiento";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbtratamiento VALUES (" . $nextId . "," .
        "'".$tratamiento->getTramientoProductoVeterinarioID() ."'".","
        "'".$tratamiento->getTratamientoIdEnfermedadComun() ."'".",".
        "'".$tratamiento->getTratamientoDosis() ."'".",".
        "'".$tratamiento->getTratamientoPeriocidad() ."'".",".
        "'" .$tratamiento->getTratamientoFechaTratamiento() . "'," .
        "'" .$tratamiento->getTratamientoEstado() . "'" .");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
		return $result;

	}//else-if

    }//insertar especie


     public function actualizarTratamiento($tratamiento) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbtratamiento SET " .
        "tratamientoid = " . "'" .$tratamiento->getTramientoProductoVeterinarioID() . "'". ", ".
        "tratamientoenfermedadcomun = " .$tratamiento->getTratamientoIdEnfermedadComun() . "'". "," .
        "tratamientodosis = " .$tratamiento->getTratamientoDosis() . "'". "," .
        "tratamientoperiocidad = " .$tratamiento->getTratamientoPeriocidad() . "'". "," .
        "tratamientofechatratamiento = " .$tratamiento->getTratamientoFechaTratamiento() . "'". "," .
        "WHERE tratamientoid =". $tratamiento->getTratamientoID() .";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar especie


    public function eliminarTratamiento($tratamientoid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbtratamiento SET tratamientoestado = 'B' WHERE" .
        " tratamientoid = " . $tratamientoid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminarEspecie



       public function obtenerTratamientos() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbtratamiento;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $tratamientos = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['tratamientoestado']!='B'){
                $tratamiento = new tratamiento($row['tratamientoid'], $row['tratamientoenfermedadcomun'],
                $row['tratamientodosis'],$row['tratamientoperiocidad'],$row['tratamientofechatratamiento'],
                $row[]'tratamientoestado');
                array_push($tratamiento, $tratamiento);

            }//end if
        }//end while

        return $tratamiento;

    }//obtenerEspecie


    public function obtenerActualizar($tratamientoID) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $result = mysqli_query($conn, $querySelect);
        $querySelect = "SELECT * FROM tbtratamiento;";
        mysqli_close($conn);
        $tratamientos = [];
        while ($row = mysqli_fetch_array($result)) {

          if($row['tratamientoestado']!='B' && $row['tratamientoid']==$tratamientoID){
            $tratamiento = new tratamiento($row['tratamientoid'], $row['tratamientoenfermedadcomun'],
            $row['tratamientodosis'],$row['tratamientoperiocidad'],$row['tratamientofechatratamiento'],
            $row[]'tratamientoestado');
            array_push($tratamiento, $tratamiento);

            }//end if

        }//end while

        return $pesosanimal;

    }//obtenerActualizar

}//end class

?>
