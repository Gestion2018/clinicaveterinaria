<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])|| isset($_POST['a']) || isset($_POST['eliminarPeso']) || isset($_POST['actualizarPeso'])) {
    include_once '../../data/diagnosticodata/diagnosticodata.php';
}else {
    include_once '../data/diagnosticodata/diagnosticodata.php';
}

class DiagnosticoBusiness {

    private $diagnosticoData;

    public function DiagnosticoBusiness() {
        $this->diagnosticoData = new DiagnosticoData();
    }//constructor

    public function insertarTBDiagnostico($diagnostico) {
        return $this->diagnosticoData->insertarDiagnostico($diagnostico);
    }//InsertarDiagnostico

    public function actualizarTBDiagnostico($diagnostico) {
        return $this->diagnosticoData->actualizarDiagnostico($diagnostico);
    }//ActualizarDiagnostico

    public function eliminarTBdiagnostico($diagnosticoId) {
        return $this->diagnosticoData->eliminarDiagnostico($diagnosticoId);
    }//Eliminardiagnostico

    public function obtenerTBDiagnostico() {
        return $this->diagnosticoData->obtenerDiagnosticos();
    }//ObtenerDiagnostico

    public function obtenerActualizar() {
        return $this->diagnosticoData->obtenerActualizar();
    }//ObtenerActualizar

    public function obtenerPesoAnimal($animalId) {
        return $this->diagnosticoData->obtenerPesoAnimal($animalId);
    }//ObtenerActualizar

    public function actualizarPesoAnimal($diagnosticoId, $animalId, $peso) {
        return $this->diagnosticoData->actualizarPesoAnimal($diagnosticoId, $animalId, $peso);
    }//ObtenerActualizar

}//class

?>
