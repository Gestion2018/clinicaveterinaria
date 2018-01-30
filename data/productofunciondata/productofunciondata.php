<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/

if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])) {

	include_once '../../data/data.php';
	include '../../domain/productofuncion/productofuncion.php';

}else {

	include_once '../data/data.php';
	include '../domain/productofuncion/productofuncion.php';

}

class ProductoFuncionData extends Data {

	public function insertarProductoFuncion($productofuncion) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(prdocutofuncionid) AS productofuncionid  FROM tbproductofuncion";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbproductofuncion VALUES (" . $nextId . "," .
        "'".$productofuncion->getProductoFuncionProductoId() ."'". ",". "'" . $productofuncion->getProductoFuncion() . "'" .
        ",". "'" . $productofuncion->getProductoFuncionFechaVencimiento() . "'"");";
        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
		return $result;

    }//insertar especie


     public function actualizarProductoFuncion($productofuncion) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbproductofuncion SET productofuncionidproducto = " . "'" . $especie->getProductoFuncionProductoId() . "'".
        ",productofuncion = " . "'" . $especie->getProductoFuncion() . "'". ",'" . $especie->getProductoFuncionFechaVencimiento() . "'".
        " WHERE productofuncionid =". $especie->getEspecieId() .";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar especie


    public function eliminarProductoFuncion($productofuncionid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbproductofuncion SET productofuncionestado = 'B' WHERE productofuncionid = " . $productofuncionid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminarEspecie



       public function obtenerProductoFuncion() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbproductofuncion;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $funciones = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['productofuncionestado']!='B'){
                $productofuncion = new productofuncion($row['productofuncionid'], $row['productofuncionidproducto']
                ,$row['productofuncionestado'],$row['productofuncionfechavencimiento']);
                array_push($funciones, $productofuncion);

            }//end if
        }//end while

        return $funciones;

    }//obtenerEspecie


    public function obtenerActualizar($productofuncionId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbproductofuncion;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $funciones = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['productofuncionestado']!='B' && $row['productofuncionid']==$productofuncionId){
                $productofuncion = new productofuncion($row['productofuncionid'], $row['productofuncionidproducto']
                ,$row['productofuncionestado'],$row['productofuncionfechavencimiento']);
                array_push($funciones, $productofuncion);


            }//end if

        }//end while

        return $funciones;

    }//obtenerActualizar



}//end class

?>
