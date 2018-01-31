<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])) {
    include '../../data/tratamientoveterinariodata/tratamientoveterinariodata.php';
}else {
    include '../data/tratamientoveterinariodata/tratamientoveterinariodata.php';
}
class TratamientoVeterinarioBusiness {

    private $tratamientoVeterinarioData;

    public function TratamientoVeterinarioBusiness() {
        $this->tratamientoVeterinarioData = new TratamientoVeterinarioData();
    }//constructor

    public function insertarTBTratamientoVeterinario($tratamientoVeterinario) {
        return $this->tratamientoVeterinarioData->insertarTratamientoVeterinario($tratamientoVeterinario);
    }//InsertarTratamientoVeterinario

    public function actualizarTBTratamientoVeterinario($tratamientoVeterinario) {
        return $this->tratamientoVeterinarioData->actualizarTratamientoVeterinario($tratamientoVeterinario);
    }//ActualizarTratamientoVeterinario

    public function eliminarTBTratamientoVeterinario($tratamientoVeterinarioId) {
        return $this->tratamientoVeterinarioData->eliminarTratamientoVeterinario($tratamientoVeterinarioId);
    }//EliminarTratamientoVeterinario

    public function obtenerTBTratamientoVeterinario() {
        return $this->tratamientoVeterinarioData->obtenerTratamientoVeterinario();
    }//ObtenerTratamientoVeterinario

    public function obtenerActualizar($tratamientoVeterinarioId) {
        return $this->tratamientoVeterinarioData->obtenerActualizar($tratamientoVeterinarioId);
    }//ObtenerActualizar
}//class

?>
