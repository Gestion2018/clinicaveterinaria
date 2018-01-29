<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])) {
    include '../../data/especiedata/especiedata.php';
}else {
    include '../data/especiedata/especiedata.php';
}

class EspecieBusiness {

    private $especieData;

    public function EspecieBusiness() {
        $this->especieData = new EspecieData();
    }//constructor

    public function insertarTBEspecie($especie) {
        return $this->especieData->insertarEspecie($especie);
    }//InsertarEspecie

    public function actualizarTBEspecie($especie) {
        return $this->especieData->actualizarEspecie($especie);
    }//ActualizarEspecie

    public function eliminarTBEspecie($especieId) {
        return $this->especieData->eliminarEspecie($especieId);
    }//EliminarEspecie

    public function obtenerTBEspecie() {
        return $this->especieData->obtenerEspecie();
    }//ObtenerEspecie

    public function obtenerActualizar($especieId) {
        return $this->especieData->obtenerActualizar($especieId);
    }//ObtenerActualizar
}//class

?>
