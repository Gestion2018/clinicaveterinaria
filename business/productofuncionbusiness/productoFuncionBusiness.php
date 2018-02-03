<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])) {
    include_once '../../data/productofunciondata/productofunciondata.php';
}else {
    include_once '../data/productofunciondata/productofunciondata.php';
}

class ProductoFuncionBusiness {

    private $productoFuncionData;

    public function ProductoFuncionBusiness() {
        $this->productoFuncionData = new ProductoFuncionData();
    }//constructor

    public function insertarTBProductoFuncion($productoFuncion) {
        return $this->productoFuncionData->insertarProductoFuncion($productoFuncion);
    }//InsertarProductoFuncion

    public function actualizarTBProductoFuncion($productoFuncion) {
        return $this->productoFuncionData->actualizarProductoFuncion($productoFuncion);
    }//ActualizarProductoFuncion

    public function eliminarTBProductoFuncion($productoFuncionId) {
        return $this->productoFuncionData->eliminarProductoFuncion($productoFuncionId);
    }//EliminarProductoFuncion

    public function obtenerTBProductoFuncion() {
        return $this->productoFuncionData->obtenerProductoFuncion();
    }//ObtenerProductoFuncion

    public function obtenerActualizar($productoFuncionId) {
        return $this->productoFuncionData->obtenerActualizar($productoFuncionId);
    }//ObtenerActualizar
}//class

?>
