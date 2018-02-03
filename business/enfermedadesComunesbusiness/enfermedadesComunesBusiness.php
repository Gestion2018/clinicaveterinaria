<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar']) || isset($_POST['agregarSintoma']) || isset($_POST['eliminarSintoma']) || isset($_POST['agregarProducto'])) {
    include_once '../../data/enfermedadescomunesdata/enfermedadescomunesdata.php';
}else {
    include_once '../data/enfermedadescomunesdata/enfermedadescomunesdata.php';
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

    public function insertarTBSintoma($enfermedadesComunesId, $sintomaId) {
        return $this->enfermedadesComunesData->insertarSintomaEnfermedad($enfermedadesComunesId, $sintomaId);
    }//EliminarTelfno

    public function eliminarTBSintoma($enfermedadesComunesId, $sintomaId) {
        return $this->enfermedadesComunesData->eliminarSintomaEnfermedad($enfermedadesComunesId, $sintomaId);
    }//EliminarTelfno

    public function obtenerTBEnfermedadesComunesSintomas() {
        return $this->enfermedadesComunesData->obtenerEnfermedadesComunesSintomas();
    }//EliminarTelfno

     public function actualizarProductos($enfermedadId, $Seleccionado, $Anteriores) {
        return $this->enfermedadesComunesData->actualizarProductos($enfermedadId, $Seleccionado, $Anteriores);
    }//EliminarTelfno
}//class

?>
