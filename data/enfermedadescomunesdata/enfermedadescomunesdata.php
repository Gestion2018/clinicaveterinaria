<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar']) || isset($_POST['agregarSintoma']) || isset($_POST['eliminarSintoma']) || isset($_POST['agregarProducto'])) {
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
                "'".$enfermedadescomunes->getEnfermedadescomunesNombre() ."'". "," .
                "'".$enfermedadescomunes->getEnfermedadescomunesDescripcion(). "'".",".
                "'".$enfermedadescomunes->getEnfermedadescomunesEstado(). "'".",".
                "'".$enfermedadescomunes->getEnfermedadescomunesProductosUsados()."'".  ");";


				$result = mysqli_query($conn, $queryInsert);

				$enfermedadescomunes->setEnfermedadescomunesId($nextId);

				$sintomas = [];
				$sintomas = explode(",", $enfermedadescomunes->getEnfermedadescomunesSintomas());

				for ($i=0; $i < count($sintomas) ; $i++) {

					$queryInsertS = "INSERT INTO tbsintomaenfermedad VALUES (".$enfermedadescomunes->getEnfermedadescomunesId()
					.",".$sintomas[$i] . ");" ;
					$result=mysqli_query($conn, $queryInsertS);

				}//end for*/

				mysqli_close($conn);

				echo json_encode($result);

    }//insertar productoveterinario


		public function insertarSintomaEnfermedad($enfermedadescomunesId,$sintomaid){
			$conn = mysqli_connect($this->server,$this->user,$this->password,$this->db);
			$conn->set_charset('utf8');
			
			$queryInsert="INSERT INTO tbsintomaenfermedad VALUES (".$enfermedadescomunesId .",".
			$sintomaid.");";

      $result = mysqli_query($conn, $queryInsert);
      mysqli_close($conn);

      return $result;
		}//insertar


		public function eliminarSintomaEnfermedad($enfermedadescomunesid,$sintomaid){

		    $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
		    $conn->set_charset('utf8');

		    $queryUpdate = "DELETE FROM tbsintomaenfermedad WHERE enfermedadcomunid = " . $enfermedadescomunesid .
				" AND sintomaid = ".$sintomaid.";";
		    $result = mysqli_query($conn, $queryUpdate);
   			mysqli_close($conn);

				return $result;
		}//eliminarTelefono


    public function actualizarEnfermedadesComunes($enfermedadescomunes) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbenfermedadescomunes SET enfermedadescomunesnombre = " . "'".$enfermedadescomunes->getEnfermedadescomunesNombre() ."'".
                ", enfermedadescomunesdescripcion = " . "'".$enfermedadescomunes->getEnfermedadescomunesDescripcion() ."'".
                ", enfermedadescomunesproductosusados = " ."'". $enfermedadescomunes->getEnfermedadescomunesProductosUsados() ."'".
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
                 0,$row['enfermedadescomunesestado'],$row['enfermedadescomunesproductosusados']);
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
                 $row['enfermedadescomunessintomas'],$row['enfermedadescomunesestado'],$row['enfermedadescomunesproductosusados']);
                array_push($enfermedadescomunes, $enfermedadescomun);


          }//end if

      }//end while

      return $enfermedadescomunes;
    }//obtenerActualziar

    public function obtenerEnfermedadesComunesSintomas() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbsintoma.sintomaid, tbsintoma.sintomanombre, tbsintomaenfermedad.enfermedadcomunid FROM tbsintomaenfermedad, tbsintoma WHERE tbsintomaenfermedad.sintomaid = tbsintoma.sintomaid;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $enfermedadescomunes = [];

        while ($row = mysqli_fetch_array($result)) {
          $enfermedadescomunes[] = $row;
        }//end while

        return $enfermedadescomunes;
    }//obtenerMedicos

    public function actualizarProductos($enfermedadId, $Seleccionado, $Anteriores){

      $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
      $conn->set_charset('utf8');

      $name ="";
      $queryGetName = "SELECT productoveterinarionombre from tbproductoveterinario WHERE productoveterinarioid = ". $Seleccionado .";";

      $getName = mysqli_query($conn, $queryGetName);

      if ($row = mysqli_fetch_row($getName)) {
        $name = trim($row[0]);
      }//end if

      if($Anteriores !== " "){
        $Anteriores = $Anteriores.",";
      }//if
        $Anteriores = $Anteriores.$name;

      $queryInsert = "UPDATE tbenfermedadescomunes SET enfermedadescomunesproductosusados = ". "'".$Anteriores. "'" ." WHERE enfermedadescomunesid = ". $enfermedadId .";"; 

      $result = mysqli_query($conn, $queryInsert);
      mysqli_close($conn);
      return $result;
    }//actualizarProductos

}//end class

?>
