<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar']) ||
isset($_POST['eliminarTelefono']) || isset($_POST['agregarTelefono']) || isset($_POST['obtener']) ||
isset($_POST['buscar'])) {
	include_once '../../data/data.php';
	include '../../domain/encargado/encargado.php';
}else {
	include_once '../data/data.php';
	include '../domain/encargado/encargado.php';
}


class EncargadoData extends Data {

	public function insertarEncargado($encargado) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(encargadoid) AS encargadoid  FROM tbencargado";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbencargado VALUES (" . $nextId . "," .
                "'".$encargado->getEncargadoNombreCompleto() ."'". "," .
                "'".$encargado->getEncargadoEmail() ."'". "," .
                "'".$encargado->getEncargadoPueblo() ."'". "," .
                "'".$encargado->getEncargadoDireccion() ."'". "," .
                "'A'" . ");";

        $result = mysqli_query($conn, $queryInsert);

        $encargado->setEncargadoId($nextId);

        $telefonos = [];
        $telefonos = explode(",", $encargado->getEncargadoTelefono());
        
        for ($i=0; $i < count($telefonos) ; $i++) {
            if($telefonos[$i] !== " "){
                $queryInsertT = "INSERT INTO tbtelefonoencargado VALUES (".$encargado->getEncargadoId().",'".
                $telefonos[$i] . "');" ;
                mysqli_query($conn, $queryInsertT);
            }//if
        }//end for*/

        mysqli_close($conn);

        echo json_encode($result);
    }//insertar encargado


    public function actualizarEncargado($encargado) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbencargado SET  encargadonombrecompleto = " . "'".$encargado->getEncargadoNombreCompleto() ."'".
        ", encargadodireccion = " ."'".$encargado->getEncargadoEmail() ."'".
        ", encargadodireccion = " ."'".$encargado->getEncargadoPueblo() ."'".
        ", encargadodireccion = " ."'".$encargado->getEncargadoDireccion() ."'".
                " WHERE encargadoid = " . $encargado->getEncargadoId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }//actualizar encargado


	public function busquedaEncargadoPorNombre($nombrecompleto){

			$conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
			$conn->set_charset('utf8');

			$querySelect = "SELECT * FROM tbencargado WHERE encargadonombrecompleto LIKE" . "'%" . $nombrecompleto . "%'" ;
			$result = mysqli_query($conn, $querySelect);
			mysqli_close($conn);
			//$encargados = [];
			/*while ($row = mysqli_fetch_array($result)) {

					if($row['encargadoestado']!='B'){
							 $encargado = new encargado($row['encargadoid'], $row['encargadonombrecompleto'],$row['encargadocorreo']
							,$row['encargadopueblo'],$row['encargadodireccion'], $row['encargadoestado']);

							//$encargados["Data"][] = $encargado;

				            //$temp= json_encode($encargado);
							echo json_encode($encargado);
							//echo $temp->getEncargadoId();

					}//end if

			}//end while*/

			$ingreso = 'false';

			while($temp = mysqli_fetch_array($result)){
            	$encargados["Data"][] = $temp;
				$ingreso = 'true';
        	}

			if ($ingreso == 'true') {
				echo json_encode($encargados);
			}else {
				echo 'Sin coincidencias';
			}
	}


	public function busquedaEncargadoPorPueblo($pueblo){

			$conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
			$conn->set_charset('utf8');

			$queryUpdate = "SELECT * FROM tbencargado WHERE encargadopueblo LIKE" . "'%" . $pueblo . "%'" ;
			$result = mysqli_query($conn, $querySelect);
			mysqli_close($conn);
			/*$encargados = [];
			while ($row = mysqli_fetch_array($result)) {

					if($row['encargadoestado']!='B'){
							 $encargado = new encargado($row['encargadoid'], $row['encargadonombrecompleto'],$row['encargadotelefono']
							,$row['encargadodireccion'],$row['encargadoestado'], $row['encargadocorreo'],$row['encargadopueblo']);
							array_push($encargados, $encargado);

					}//end if

			}//end while*/

			$ingreso = 'false';

			while($temp = mysqli_fetch_array($result)){
            	$encargados["Data"][] = $temp;
				$ingreso = 'true';
        	}

			if ($ingreso == 'true') {
				echo json_encode($encargados);
			}else {
				echo 'Sin coincidencias';
			}
	}//busquedaEncargadoPorPueblo


	public function busquedaEncargadoPorEspecie($idEspecie){

			$conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
			$conn->set_charset('utf8');

			$queryUpdate = "SELECT * FROM tbencargado,tbanimal,tbespecie WHERE
			tbencargado.encargadoid = tbanimal.animalidcliente
			AND tbanimal.animalespecierazaid = tbespecie.especieid
			AND tbespecie.especieid = ". $idEspecie . ";" ;
			$result = mysqli_query($conn, $querySelect);
			mysqli_close($conn);
			/*$encargados = [];
			while ($row = mysqli_fetch_array($result)) {

					if($row['encargadoestado']!='B'){
							 $encargado = new encargado($row['encargadoid'], $row['encargadonombrecompleto'],$row['encargadotelefono']
							,$row['encargadodireccion'],$row['encargadoestado'], $row['encargadocorreo'],$row['encargadopueblo']);
							array_push($encargados, $encargado);

					}//end if

			}//end while*/

			$ingreso = 'false';

			while($temp = mysqli_fetch_array($result)){
            	$encargados["Data"][] = $temp;
				$ingreso = 'true';
        	}

			if ($ingreso == 'true') {
				echo json_encode($encargados);
			}else {
				echo 'Sin coincidencias';
			}
	}


    public function eliminarEncargado($encargadoid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbencargado SET encargadoestado = 'B' WHERE encargadoid = " . $encargadoid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminar medico

//id,nom,te,dire,est,email,especie,pueblo

    public function obtenerEncargados() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbencargado;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $encargados = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['encargadoestado']!='B'){
                 $encargado = new encargado($row['encargadoid'], $row['encargadonombrecompleto'],"0"
                ,$row['encargadodireccion'],$row['encargadoestado'], $row['encargadocorreo'],$row['encargadopueblo']);
                array_push($encargados, $encargado);

            }//end if

        }//end while

        return $encargados;

    }//obtenerMedicos


    public function obtenerActualizar($encargadoId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbencargado;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $encargados = [];

        while ($row = mysqli_fetch_array($result)) {

            if($row['encargadoestado'] != 'B' && $row['encargadoid'] == $encargadoId){
               $encargado = new encargado($row['encargadoid'], $row['encargadonombrecompleto'],$row['encargadotelefono']
                ,$row['encargadodireccion'],$row['encargadoestado'], $row['encargadocorreo'],$row['encargadopueblo']);
                array_push($encargados, $encargado);

            }//end if

        }//end while

        return $encargados;

    }//obtenerActualziar

    public function eliminarTelefonoEncagardo($encargadoid,$numerotelefono) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE FROM tbtelefonoencargado WHERE encargadoid = " . $encargadoid . " AND numerotelefono = ". "'" .$numerotelefono . "'" .";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }//eliminarTelefono

    public function insertarTelefonoEncagardo($encargadoid,$numerotelefono) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryInsert = "INSERT INTO tbtelefonoencargado VALUES(" .$encargadoid . ",". "'" .$numerotelefono . "'" .");";
        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);

        return $result;
    }//eliminarTelefono


    public function obtenerTelefonosEncargado() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * from tbtelefonoencargado, tbencargado
                        where tbencargado.encargadoid = tbtelefonoencargado.encargadoid ;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $telefonos = [];
        while ($row = mysqli_fetch_array($result)) {
            $telefonos[] = $row;
        }//end while

        return $telefonos;

    }//obtenerMedicos

    public function obtenerAnimalesEncargado($tipo) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbanimal.animalid, tbanimal.animalnombre, tbencargado.encargadoId, tbencargado.encargadonombrecompleto from tbanimal, tbencargado
                        where tbencargado.encargadoid = tbanimal.animalidcliente AND tbencargado.encargadoestado = 'A' AND tbanimal.animalestado = 'A';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);

        if($tipo === 1){
            $animales = [];
            while ($row = mysqli_fetch_array($result)) {
                $animales[] = $row;
            }//end while
            return $animales;
        }else{
            while ($row = mysqli_fetch_array($result)) {
                $animales["Data"][] = $row;
            }//end while
             echo json_encode($animales);
        }//if-else

        //return $animales;

    }//obtenerMedicos
}//end class

?>
