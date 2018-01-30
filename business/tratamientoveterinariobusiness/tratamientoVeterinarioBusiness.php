<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])) {
    include '../../data/enfermedadescomunesdata/enfermedadescomunesdata.php';
}else {
    include '../data/enfermedadescomunesdata/enfermedadescomunesdata.php';
}
class EnfermedadesComunesBusiness {

    private $enfermedadesComunesData;

    public function EnfermedadesComunesBusiness() {
        $this->enfermedadesComunesData = new EnfermedadesComunesData();
    }//constructor

    public function insertarTBEnfermedadesComunes($enfermedadesComunes) {
        return $this->enfermedadesComunesData->insertarEnfermedadesComunes($enfermedadesComunes);
    }//InsertarEnfermedadesComunes

    public function actualizarTBEnfermedadesComunes($enfermedadesComunes) {
        return $this->enfermedadesComunesData->actualizarEnfermedadesComunes($enfermedadesComunes);
    }//ActualizarEnfermedadesComunes

    public function eliminarTBEnfermedadesComunes($enfermedadesComunesId) {
        return $this->enfermedadesComunesData->eliminarEnfermedadesComunes($enfermedadesComunesId);
    }//EliminarEnfermedadesComunes

    public function obtenerTBEnfermedadesComunes() {
        return $this->enfermedadesComunesData->obtenerEnfermedadesComunes();
    }//ObtenerEnfermedadesComunes

    public function obtenerActualizar($enfermedadesComunesId) {
        return $this->enfermedadesComunesData->obtenerActualizar($enfermedadesComunesId);
    }//ObtenerActualizar
}//class

?>
