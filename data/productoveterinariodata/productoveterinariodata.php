<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])) {
	include_once '../../data/data.php';
	include '../../domain/productoveterinario/productoveterinario.php';
}else {
	include_once '../data/data.php';
	include '../domain/productoveterinario/productoveterinario.php';
}


class ProductoVeterinarioData extends Data {

	public function insertarProductoVeterinario($productoveterinario) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(productoveterinarioid) AS productoveterinarioid  FROM tbproductoveterinario;";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbproductoveterinario VALUES (" . $nextId . "," .
                "'".$productoveterinario->getProductoVeterinarioNombre() ."'". "," .
                "'".$productoveterinario->getProductoVeterinarioNombreComun() ."'". "," .
                "'".$productoveterinario->getProductoVeterinarioPrincipioActivo(). "'".",".
                "'".$productoveterinario->getProductoVeterinarioContenido(). "'".",".
                "'".$productoveterinario->getProductoVeterinarioPrecio(). "'".",".
                "'".$productoveterinario->getProductoVeterinarioEstado() ."'".  ",".
				"'".$productoveterinario->getProductoVeterinarioFechaVencimiento() ."'".  ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;

    }//insertar productoveterinario


    public function actualizarProductoVeterinario($productoveterinario) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbproductoveterinario SET  productoveterinarionombre = " . "'".$productoveterinario->getProductoVeterinarioNombre() ."'".
<<<<<<< HEAD
                ", productoveterinarionombrecomun = " . "'".$productoveterinario->getProductoVeterinarioNombreComun() ."'".
                ", productoveterinarioprincipioactivo = "."'".$productoveterinario->getProductoVeterinarioPrincipioActivo()."'".
                ", productoveterinariocontenido = "."'".$productoveterinario->getProductoVeterinarioContenido()."'".
=======
                ", productoveterinarioprincipioactivo = " . "'".$productoveterinario->getProductoVeterinarioNombreComun() ."'".
                ", productoveterinarioprincipioactivo = " . "'".$productoveterinario->getProductoVeterinarioPrincipioActivo() ."'".
                ", productoveterinariocontenido = " . "'".$productoveterinario->getProductoVeterinarioContenido() ."'".
>>>>>>> 0177944420610ff3f47772686bfa2988ce1d4770
                ", productoveterinarioprecio = " . "'".$productoveterinario->
                getProductoVeterinarioPrecio() ."'"
                .", productoveterinarioestado = " ."'". $productoveterinario->
                getProductoVeterinarioEstado() ."'".
                ", productoveterinariofechavencimiento = " ."'". $productoveterinario->getProductoVeterinarioFechaVencimiento() ."'".
								" WHERE productoveterinarioid = " . $productoveterinario->getProductoVeterinarioId() . ";";


        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar productoveterinario



    public function eliminarProductoVeterinario($productoveterinarioid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbproductoveterinario SET productoveterinarioestado = 'B' WHERE productoveterinarioid = " . $productoveterinarioid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminar productoveterinario nombre,correo,pueblo,direc.estado






    public function obtenerProductosVeterinarios() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbproductoveterinario;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $productosveterinarios = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['productoveterinarioestado']!='B'){
                $productoveterinario = new productoveterinario($row['productoveterinarioid'],
                $row['productoveterinarionombre'], $row['productoveterinarionombrecomun'],$row['productoveterinarioprincipioactivo'],
								$row['productoveterinariocontenido'],$row['productoveterinarioprecio'],$row['productoveterinarioestado'],$row['productoveterinariofechavencimiento']);
                array_push($productosveterinarios, $productoveterinario);
            }//end if

        }//end while

        return $productosveterinarios;

    }//obtenerMedicos


    public function obtenerUnidades(){

     	$conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbunidades;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $unidades = array();
         
        while ($row = mysqli_fetch_array($result)) {
                $unidades[] = $row;
        }//end while
        return $unidades;
    }//obtenerUnidades


    public function obtenerActualizar($productoveterinarioId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbproductoveterinario;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $productoveterinarios = [];

        while ($row = mysqli_fetch_array($result)) {

            if($row['productoveterinarioestado']!='B' && $row['productoveterinarioid']==$productoveterinarioId){
              $productoveterinario = new productoveterinario($row['productoveterinarioid'],$row['productoveterinarionombre'],
                $row['productoveterinarionombrecomun'],$row['productoveterinarioprincipioactivo'],$row['productoveterinariocontenido'],
                $row['productoveterinarioprecio'],$row['productoveterinarioestado'],$row['productoveterinariofechavencimiento']);
                array_push($productosveterinarios, $productoveterinario);

          }//end if

        }//end while

        return $productoveterinarios;
    }//obtenerActualziar

}//end class

?>
