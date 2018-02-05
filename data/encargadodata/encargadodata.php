<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar']) ||
isset($_POST['eliminarTelefono']) || isset($_POST['agregarTelefono']) || isset($_POST['obtener']) ||
isset($_POST['buscar']) || isset($_POST['telefonosJSON']) || isset($_POST['idAnimalJSON'])) {
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
<<<<<<< HEAD
            if($telefonos[$i] !== " "){
                $queryInsertT = "INSERT INTO tbtelefonoencargado VALUES (".$encargado->getEncargadoId().",'".
                $telefonos[$i] . "');" ;
                mysqli_query($conn, $queryInsertT);
            }//if
=======

          $queryInsertT = "INSERT INTO tbtelefonoencargado VALUES (".$encargado->getEncargadoId().",'".
          $telefonos[$i] . "');" ;
          mysqli_query($conn, $queryInsertT);

>>>>>>> 0177944420610ff3f47772686bfa2988ce1d4770
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

			$querySelect = "SELECT enc.encargadoid, enc.encargadonombrecompleto, enc.encargadocorreo,
			enc.encargadopueblo, enc.encargadodireccion, enc.encargadoestado
			FROM tbencargado As enc
			WHERE enc.encargadoestado = 'A' AND enc.encargadonombrecompleto LIKE" . "'%" . $nombrecompleto . "%'" ;
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

			/*Se valida si se encontro alguna conincidencia con lo que ingreso el
			usuario*/
			if ($ingreso == 'true') {
				echo json_encode($encargados);
			}else {
				echo 'Sin coincidencias';
			}
	}


	public function busquedaEncargadoPorPueblo($pueblo){

			$conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
			$conn->set_charset('utf8');

			$querySelect = "SELECT enc.encargadoid, enc.encargadonombrecompleto, enc.encargadocorreo,
			enc.encargadopueblo, enc.encargadodireccion FROM tbencargado As enc
			WHERE enc.encargadoestado = 'A' AND encargadopueblo LIKE" . "'%" . $pueblo . "%'" ;
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

			/*Se valida si se encontro alguna conincidencia con lo que ingreso el
			usuario*/
			if ($ingreso == 'true') {
				echo json_encode($encargados);
			}else {
				echo 'Sin coincidencias';
			}
	}//busquedaEncargadoPorPueblo


	public function busquedaEncargadoPorEspecie($nombreEspecie){
		$conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
		$conn->set_charset('utf8');

		$querySelect = "SELECT DISTINCT enc.encargadoid, enc.encargadonombrecompleto, enc.encargadocorreo,
		enc.encargadopueblo, enc.encargadodireccion FROM tbencargado As enc
		INNER JOIN tbanimal As an ON enc.encargadoid = an.animalidcliente
		INNER JOIN tbespecie AS esp ON esp.especieid = an.animalespecierazaid
		WHERE enc.encargadoestado = 'A' AND (esp.especienombre LIKE" . "'%" . $nombreEspecie . "%') GROUP BY (enc.encargadonombrecompleto)" ;

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

		/*Se valida si se encontro alguna conincidencia con lo que ingreso el
		usuario*/
		if ($ingreso == 'true') {
			echo json_encode($encargados);
		}else {
			echo 'Sin coincidencias';
		}
	}

	/*Obtiene los animales de un determinado cliente*/
	function busquedaDeAnimalesPorClienteConJSON($encargadoid){
		$conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
		$conn->set_charset('utf8');

		$querySelect = "SELECT DISTINCT enc.encargadonombrecompleto, an.animalnombre,
		an.animalfechanacimiento, an.animalestado, esp.especienombre FROM tbencargado As enc
		INNER JOIN tbanimal As an ON enc.encargadoid = an.animalidcliente
		INNER JOIN tbespecie AS esp ON esp.especieid = an.animalespecierazaid
		WHERE an.animalestado = 'A' AND enc.encargadoid = $encargadoid GROUP BY (enc.encargadonombrecompleto)" ;

		$result = mysqli_query($conn, $querySelect);
		mysqli_close($conn);

		$ingreso = 'false';

		while($temp = mysqli_fetch_array($result)){
			$encargados["Data"][] = $temp;
			$ingreso = 'true';
		}

		/*Se valida si se encontro alguna conincidencia con lo que ingreso el
		usuario*/
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
        $result = mysqli_query($conn, $querySelect);        $telefonos = [];

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


	/*Se obtiene los telefonos y se retornan en formato JSON*/
	public function obtenerTelefonosEncargadoPorJSON() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * from tbtelefonoencargado, tbencargado
                        where tbencargado.encargadoid = tbtelefonoencargado.encargadoid ;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);

		while($row = mysqli_fetch_array($result)){
			$telefonos["Data"][] = $row;
		}

		echo json_encode($telefonos);
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
