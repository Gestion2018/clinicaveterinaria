<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])|| isset($_POST['obtener'])) {
    include_once '../../data/razadata/razadata.php';
}else {
    include_once '../data/razadata/razadata.php';
}
class RazaBusiness {

    private $razaData;

    public function RazaBusiness() {
        $this->razaData = new RazaData();
    }//constructor

    public function insertarTBRaza($especieId, $raza) {
        return $this->razaData->insertarRaza($especieId, $raza);
    }//InsertarRaza

    public function actualizarTBRaza($raza) {
        return $this->razaData->actualizarRaza($raza);
    }//ActualizarRaza

    public function eliminarTBRaza($razaId) {
        return $this->razaData->eliminarRaza($razaId);
    }//EliminarRaza

    public function obtenerTBRaza() {
        return $this->razaData->obtenerRazas();
    }//ObtenerRaza

    public function obtenerActualizar($razaId) {
        return $this->razaData->obtenerActualizar($razaId);
    }//ObtenerActualizar

    public function obtenerRazaAnimal($especieId) {
        return $this->razaData->obtenerRazasAnimal($especieId);
    }//ObtenerActualizar
    
}//class

?>
