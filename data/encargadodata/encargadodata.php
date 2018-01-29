<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar']) || isset($_POST['eliminarTelefono']) || isset($_POST['agregarTelefono'])) {
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
                "'".$encargado->getEncargadoNombreCorreo() ."'".. "," .
                "'".$encargado->getEncargadoNombrePueblo() ."'".. "," .
                "'".$encargado->getEncargadoDireccion() ."'". "," .
                "'A'" . ");";

        $result = mysqli_query($conn, $queryInsert);
        
        $encargado->setEncargadoId($nextId);

        $telefonos = [];
        $telefonos = explode(",", $encargado->getEncargadoTelefono());

        for ($i=0; $i < count($telefonos) ; $i++) {

          $queryInsertT = "INSERT INTO tbtelefonoencargado VALUES (".$encargado->getEncargadoId().",'".
          $telefonos[$i] . "');" ;
          mysqli_query($conn, $queryInsertT);

        }//end for*/

        mysqli_close($conn);
        
        echo json_encode($result);
    }//insertar encargado


    public function actualizarEncargado($encargado) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbencargado SET  encargadonombrecompleto = " . "'".$encargado->getEncargadoNombreCompleto() ."'". 
        ", encargadodireccion = " ."'".$encargado->getEncargadoCorreo() ."'".
        ", encargadodireccion = " ."'".$encargado->getEncargadoNombrePueblo() ."'".
        ", encargadodireccion = " ."'".$encargado->getEncargadoDireccion() ."'".
                " WHERE encargadoid = " . $encargado->getEncargadoId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }//actualizar encargado


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
                $encargado = new encargado($row['encargadoid'], $row['encargadonombrecompleto'], $row['encargadonombrecorreo'], 
                $row['encargadotelefono'], $row['encargadonom'],
                $row['encargadodireccion'], $row['encargadoestado']);
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
               $encargado = new encargado($row['encargadoid'], $row['encargadonombrecompleto'],$row['encargadocorreo'], $row['encargadotelefono'],
                $row['encargadodireccion'], $row['encargadoestado']);
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

}//end class

?>
