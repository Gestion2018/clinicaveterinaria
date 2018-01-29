<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])) {
    include '../../data/medicodata/medicodata.php';
}else {
    include '../data/medicodata/medicodata.php';
}
class MedicoBusiness {

    private $medicoData;

    public function MedicoBusiness() {
        $this->medicoData = new MedicoData();
    }//constructor

    public function insertarTBMedico($medico) {
        return $this->medicoData->insertarMedico($medico);
    }//InsertarMedico

    public function actualizarTBMedico($medico) {
        return $this->medicoData->actualizarMedico($medico);
    }//ActualizarMedico

    public function eliminarTBMedico($medicoId) {
        return $this->medicoData->eliminarMedico($medicoId);
    }//EliminarMedico

    public function obtenerTBMedico() {
        return $this->medicoData->obtenerMedicos();
    }//ObtenerMedico

    public function obtenerActualizar($medicoId) {
        return $this->medicoData->obtenerActualizar($medicoId);
    }//ObtenerActualizar
}//class

?>
