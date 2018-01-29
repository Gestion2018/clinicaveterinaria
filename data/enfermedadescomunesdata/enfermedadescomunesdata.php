<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])) {
	include_once '../../data/data.php';
	include '../../domain/enfermedadescomunes/enfermedadescomunes.php';
}else {
	include_once '../data/data.php';
	include '../domain/enfermedadescomunes/enfermedadescomunes.php';
}


class EnfermedadesComunesData extends Data {

	public function insertarEnfermedadesComunes($enfermedadescomunes) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(enfermedadescomunesid) AS enfermedadescomunesid  FROM tbenfermedadescomunes;";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbenfermedadescomunes VALUES (" . $nextId . "," .
                "'".$enfermedadescomunes->getEnfermedadesComunesNombre() ."'". "," .
                "'".$enfermedadescomunes->getEnfermedadescomunesDescripcion(). "'".",".
                "'".$enfermedadescomunes->getEnfermedadescomunesSintomas(). "'".",".
                "'".$enfermedadescomunes->getEnfermedadescomunesEstado()."'".  ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;

    }//insertar productoveterinario


    public function actualizarEnfermedadesComunes($enfermedadescomunes) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbenfermedadescomunes SET  enfermedadescomunesnombre = " . "'".$enfermedadescomunes->getEnfermedadescomunesNombre() ."'".
                ", enfermedadescomunesdescripcion = " . "'".$enfermedadescomunes->getEnfermedadescomunesDescripcion() ."'".
                ", enfermedadescomunessintomas = " ."'". $enfermedadescomunes->getEnfermedadescomunesSintomas() ."'".
                ", enfermedadescomunesestado = " ."'". $enfermedadescomunes->getEnfermedadescomunesEstado() ."'".
                " WHERE enfermedadescomunesid = " . $enfermedadescomunes->getEnfermedadescomunesId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar productoveterinario


    public function eliminarEnfermedadesComunes($enfermedadescomunesid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbenfermedadescomunes SET enfermedadescomunesestado = 'B' WHERE enfermedadescomunesid = " . $enfermedadescomunesid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminar productoveterinario



    public function obtenerEnfermedadesComunes() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbenfermedadescomunes;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $enfermedadescomunes = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['enfermedadescomunesestado']!='B'){
                $enfermedadescomun = new enfermedadescomunes($row['enfermedadescomunesid'],
                 $row['enfermedadescomunesnombre'],$row['enfermedadescomunesdescripcion'],
                 $row['enfermedadescomunessintomas'],$row['enfermedadescomunesestado']);
                array_push($enfermedadescomunes, $enfermedadescomun);

            }//end if

        }//end while

        return $enfermedadescomunes;

    }//obtenerMedicos


    public function obtenerActualizar($enfermedadescomunesId) {

      $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
      $conn->set_charset('utf8');

      $querySelect = "SELECT * FROM tbenfermedadescomunes;";
      $result = mysqli_query($conn, $querySelect);
      mysqli_close($conn);
      $enfermedadescomunes = [];
      while ($row = mysqli_fetch_array($result)) {

          if($row['enfermedadescomunesestado']!='B' && $row['enfermedadescomunesid']==$enfermedadescomunesId){
              $enfermedadescomun = new enfermedadescomunes($row['enfermedadescomunesid'],
               $row['enfermedadescomunesnombre'],$row['enfermedadescomunesdescripcion'],
               $row['enfermedadescomunessintomas'],$row['enfermedadescomunesestado']);
              array_push($enfermedadescomunes, $enfermedadescomun);

          }//end if

      }//end while

      return $enfermedadescomunes;
    }//obtenerActualziar



}//end class

?>
