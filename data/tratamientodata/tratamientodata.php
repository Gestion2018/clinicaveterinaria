<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/

if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])) {

	include_once '../../data/data.php';
	include '../../domain/tratamientoveterinario/tratamientoveterinario.php';

}else {

	include_once '../data/data.php';
	include '../domain/tratamientoveterinario/tratamientoveterinario.php';

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
        "'".$tratamiento->getProductoVeterinarioId() ."'".",".
        "'".$tratamiento->getEnfermedadescomunesId() ."'".",".
        "'".$tratamiento->getTratamientoveterinarioDosis() ."'".",".
        "'".$tratamiento->getTratamientoveterinarioPeriodicidad() ."'".",".
        "'" .$tratamiento->getTratamientoveterinarioFecha() . "'," .
        "'" .$tratamiento->getTratamientoveterinarioEstado() . "'" .");";

        $result = mysqli_query($conn, $queryInsert);

        $queryInsert2 = "INSERT INTO tbtratamientocliente VALUES (" . $nextId . "," .
        $tratamiento->getTratamientoveterinarioAnimalId() .");";

        $result = mysqli_query($conn, $queryInsert2);


        mysqli_close($conn);
		return $result;

    }//insertar especie


     public function actualizarTratamiento($tratamiento) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbtratamiento SET 
            tratamientoenfermedadcomunid = " .$tratamiento->getEnfermedadescomunesId(). "," .
            "tratamientoproductoveterinarioid = " .$tratamiento->getProductoVeterinarioId(). "," .
            "tratamientodosis ='" .$tratamiento->getTratamientoveterinarioDosis() . "'". "," .
        "tratamientoperiodicidad = '" .$tratamiento->getTratamientoveterinarioPeriodicidad() . "'". "," .
        "tratamientofecha = '" .$tratamiento->getTratamientoveterinarioFecha() . "'".
        " WHERE tratamientoid =". $tratamiento->getTratamientoveterinarioId() .";";

        $result = mysqli_query($conn, $queryUpdate);

        $queryUpdate2 = "UPDATE tbtratamientocliente SET animalid = " .$tratamiento->getTratamientoveterinarioAnimalId(). " WHERE tratamientoid =". $tratamiento->getTratamientoveterinarioId() .";";

        $result = mysqli_query($conn, $queryUpdate2);

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

        $querySelect = "SELECT * FROM tbtratamiento, tbtratamientocliente WHERE tbtratamiento.tratamientoid = tbtratamientocliente.tratamientoid;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $tratamientos = [];
        while ($row = mysqli_fetch_array($result)) {
            if($row['tratamientoestado']!='B'){
                $tratamiento = new TratamientoVeterinario($row['tratamientoid'], $row['tratamientoproductoveterinarioid'] ,$row['tratamientoenfermedadcomunid'],
                $row['tratamientodosis'],$row['tratamientoperiodicidad'],$row['tratamientofecha'],$row["animalid"],
                $row['tratamientoestado']);
                array_push($tratamientos, $tratamiento);
            }//end if
        }//end while

        return $tratamientos;

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
            $row['tratamientoestado']);
            array_push($tratamiento, $tratamiento);

            }//end if

        }//end while

        return $pesosanimal;

    }//obtenerActualizar

}//end class

?>
