<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])) {
    include_once '../../data/tratamientodata/tratamientodata.php';
}else {
    include_once '../data/tratamientodata/tratamientodata.php';
}
class TratamientoVeterinarioBusiness {

    private $tratamientoVeterinarioData;

    public function TratamientoVeterinarioBusiness() {
        $this->tratamientoVeterinarioData = new TratamientoData();
    }//constructor

    public function insertarTBTratamientoVeterinario($tratamientoVeterinario) {
        return $this->tratamientoVeterinarioData->insertarTratamiento($tratamientoVeterinario);
    }//InsertarTratamientoVeterinario

    public function actualizarTBTratamientoVeterinario($tratamientoVeterinario) {
        return $this->tratamientoVeterinarioData->actualizarTratamiento($tratamientoVeterinario);
    }//ActualizarTratamientoVeterinario

    public function eliminarTBTratamientoVeterinario($tratamientoVeterinarioId) {
        return $this->tratamientoVeterinarioData->eliminarTratamiento($tratamientoVeterinarioId);
    }//EliminarTratamientoVeterinario

    public function obtenerTBTratamientoVeterinario() {
        return $this->tratamientoVeterinarioData->obtenerTratamientos();
    }//ObtenerTratamientoVeterinario

    public function obtenerActualizar($tratamientoVeterinarioId) {
        return $this->tratamientoVeterinarioData->obtenerActualizar($tratamientoVeterinarioId);
    }//ObtenerActualizar
}//class

?>
