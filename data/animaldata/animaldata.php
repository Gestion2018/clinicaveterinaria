<?php

if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar']) || isset($_POST['obtenerEdad'])) {

    include_once '../../data/data.php';
    include '../../domain/animal/animal.php';

}else {

    include_once '../data/data.php';
    include '../domain/animal/animal.php';

}

class AnimalData extends Data {

	public function insertarAnimal($animal) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(animalid) AS animalid  FROM tbanimal;";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }

       $queryInsert = "INSERT INTO tbanimal VALUES (" . $nextId . "," .
               "'".$animal->getAnimalNombre() ."'". "," .
               "'".$animal->getAnimalEspecieRazaId() ."'" . "," .
                "'".$animal->getAnimalIdCliente() ."'". "," .
                "'".$animal->getAnimalFechaNacimiento() ."'". "," .
               "'A'". ");";
       $result = mysqli_query($conn, $queryInsert);
       mysqli_close($conn);
       return $result;

    }//insertar animal


     public function actualizarAnimal($animal) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbanimal SET animalnombre = " . "'".$animal->getAnimalNombre() . "'".
                ", animalespecierazaid = " . $animal->getAnimalEspecieRazaId() .
                ", animalestado = " ."'". $animal->getAnimalEstado() ."'".
                ", animalidcliente = " ."'". $animal->getAnimalIdCliente() ."'".
                ", animalfechanacimiento = " ."'". $animal->getAnimalFechaNacimiento() ."'".
                " WHERE animalid = " . $animal->getAnimalId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar animal


    public function eliminarAnimal($animalid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbanimal SET animalestado = 'B' WHERE animalid = " . $animalid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminar animal



    public function obtenerAnimales() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbanimal;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $animales = [];

        while ($row = mysqli_fetch_array($result)) {

            if($row['animalestado']!='B'){
                $edad = $this->calcularEdadAnimal($row['animalfechanacimiento']);
                $animal = new animal($row['animalnombre'], $row['animalid'], $row['animalespecierazaid'], $row['animalidcliente'],$row['animalfechanacimiento'], $row['animalestado'], $edad);
                array_push($animales, $animal);
            }//end if

        }//end while

        return $animales;
    }//obteneranimales

    public function obtenerEdadAnimalUnico($idAnimal) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT animalfechanacimiento FROM tbanimal WHERE animalid=".$idAnimal.";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);

        while ($row = mysqli_fetch_array($result)) {
            $edad = $this->calcularEdadAnimal($row['animalfechanacimiento']);
        }//end while

        $array["Data"][] = array("edad"=>$edad);
        echo json_encode($array);
    }//obteneranimales
    

    public function obtenerInformacionAnimales() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * from tbanimal, tbraza, tbespecie WHERE tbanimal.animalespecierazaid = tbraza.razaid and tbraza.razaespecieid = tbespecie.especieid;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);


        $animales = array();

        while ($row = mysqli_fetch_array($result)) {
            if($row['animalestado']!='B'){
                $animales[] = $row;
            }//end if
        }//end while
        return $animales;
    }//obtenerInformacionAnimales

    function calcularEdadAnimal($fecha){
        $fecha_nac = new DateTime(date('Y/m/d',strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
        $fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
        $edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
        if (($edad->format('%Y')) > 0 ){
            $edadFinal = "{$edad->format('%Y')} Años - {$edad->format('%m')} meses";
        }else{
            $edadFinal = "{$edad->format('%m')} meses";
        }//if-else
        return $edadFinal;
    }//calcularEdadAnimal

}//end class

?>
