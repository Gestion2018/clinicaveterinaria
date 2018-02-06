<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar']) || isset($_POST['agregarFuncion'])) {
    include '../../data/productoveterinariodata/productoveterinariodata.php';
}else {
    include '../data/productoveterinariodata/productoveterinariodata.php';
}
class ProductoVeterinarioBusiness {

    private $productoVeterinarioData;

    public function ProductoVeterinarioBusiness() {
        $this->productoVeterinarioData = new ProductoVeterinarioData();
    }//constructor

    public function insertarTBProductoVeterinario($productoVeterinario) {
        return $this->productoVeterinarioData->insertarProductoVeterinario($productoVeterinario);
    }//InsertarProductoVeterinario

    public function actualizarTBProductoVeterinario($productoVeterinario, $funcionAgregar) {
        return $this->productoVeterinarioData->actualizarProductoVeterinario($productoVeterinario, $funcionAgregar);
    }//ActualizarProductoVeterinario

    public function eliminarTBProductoVeterinario($productoVeterinarioId) {
        return $this->productoVeterinarioData->eliminarProductoVeterinario($productoVeterinarioId);
    }//EliminarProductoVeterinario

    public function obtenerTBProductoVeterinario() {
        return $this->productoVeterinarioData->obtenerProductosVeterinarios();
    }//ObtenerProductoVeterinario

    public function obtenerUnidades() {
        return $this->productoVeterinarioData->obtenerUnidades();
    }//ObtenerUnidades

    public function obtenerActualizar($encargadoId) {
        return $this->productoVeterinarioData->obtenerActualizar($productoVeterinarioId);
    }//ObtenerActualizar

    public function obtenerFunciones() {
        return $this->productoVeterinarioData->obtenerFunciones();
    }//ObtenerActualizar


}//class

?>
