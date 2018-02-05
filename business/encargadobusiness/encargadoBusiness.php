<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar']) ||
isset($_POST['eliminarTelefono']) || isset($_POST['agregarTelefono']) || isset($_POST['obtener']) ||
isset($_POST['buscar']) || isset($_POST['telefonosJSON']) || isset($_POST['idAnimalJSON'])) {
    include_once '../../data/encargadodata/encargadodata.php';
}else {
    include_once '../data/encargadodata/encargadodata.php';
}
class EncargadoBusiness {

    private $encargadoData;

    public function EncargadoBusiness() {
        $this->encargadoData = new EncargadoData();
    }//constructor

    public function insertarTBEncargado($encargado) {
        return $this->encargadoData->insertarEncargado($encargado);
    }//InsertarEncargado

    public function actualizarTBEncargado($encargado) {
        return $this->encargadoData->actualizarEncargado($encargado);
    }//ActualizarEncargado

    public function eliminarTBEncargado($encargadoId) {
        return $this->encargadoData->eliminarEncargado($encargadoId);
    }//EliminarEncargado

    public function eliminarTBTelfono($encargadoId, $numeroTelefono) {
        return $this->encargadoData->eliminarTelefonoEncagardo($encargadoId, $numeroTelefono);
    }//EliminarTelfno

    public function insertarTBTelefono($encargadoId, $numeroTelefono) {
        return $this->encargadoData->insertarTelefonoEncagardo($encargadoId, $numeroTelefono);
    }//EliminarTelfno

    public function obtenerTBEncargado() {
        return $this->encargadoData->obtenerEncargados();
    }//ObtenerEncargado

    public function obtenerActualizar($encargadoId) {
        return $this->encargadoData->obtenerActualizar($encargadoId);
    }//ObtenerActualizar

    public function obtenerTelefonosEncargado(){
        return $this->encargadoData->obtenerTelefonosEncargado();
    }//ObtenerActualizar

    public function busquedaEncargadoPorNombre($nombrecompleto){
        return $this->encargadoData->busquedaEncargadoPorNombre($nombrecompleto);
    }//busquedaEncargadoPorNombre

    public function busquedaEncargadoPorPueblo($pueblo){
        return $this->encargadoData->busquedaEncargadoPorPueblo($pueblo);
    }//busquedaEncargadoPorPueblo

    public function busquedaEncargadoPorEspecie($nombreEspecie){
        return $this->encargadoData->busquedaEncargadoPorEspecie($nombreEspecie);
    }//busquedaEncargadoPorEspecie

    public function obtenerAnimalesEncargado($tipo){
        return $this->encargadoData->obtenerAnimalesEncargado($tipo);
    }//busquedaEncargadoPorEspecie


    public function obtenerTelefonosEncargadoPorJSON(){
        return $this->encargadoData->obtenerTelefonosEncargadoPorJSON();
    }//ObtenerActualizar

    public function obtenerAnimalesPorClienteConJSON($encargadoid){
        return $this->encargadoData->busquedaDeAnimalesPorClienteConJSON($encargadoid);
    }//ObtenerActualizar
}//class

?>
