<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])|| isset($_POST['obtener'])) {
    include_once '../../data/sintomadata/sintomadata.php';
}else {
    include_once '../data/sintomadata/sintomadata.php';
}
class SintomaBusiness {

    private $sintomaData;

    public function SintomaBusiness() {
        $this->sintomaData = new SintomaData();
    }//constructor

    public function insertarTBSintoma($sintoma) {
        return $this->sintomaData->insertarSintoma($sintoma);
    }//InsertarSintoma

    public function actualizarTBSintoma($sintoma) {
        return $this->sintomaData->actualizarSintoma($sintoma);
    }//ActualizarSintoma

    public function eliminarTBSintoma($sintomaId) {
        return $this->sintomaData->eliminarSintoma($sintomaId);
    }//EliminarSintoma

    public function obtenerTBSintoma() {
        return $this->sintomaData->obtenerSintomas();
    }//ObtenerSintoma

    public function obtenerActualizar($sintomaId) {
        return $this->sintomaData->obtenerActualizar($sintomaId);
    }//ObtenerActualizar
    
}//class

?>
