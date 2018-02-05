<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])|| isset($_POST['a']) || isset($_POST['obtenerEdad'])) {
    include_once '../../data/animaldata/animaldata.php';
}else {
    include_once '../data/animaldata/animaldata.php';
}

class AnimalBusiness {

    private $animalData;

    public function AnimalBusiness() {
        $this->animalData = new AnimalData();
    }//constructor

    public function insertarTBAnimal($animal) {
        return $this->animalData->insertarAnimal($animal);
    }//InsertarAnimal

    public function actualizarTBAnimal($animal) {
        return $this->animalData->actualizarAnimal($animal);
    }//ActualizarAnimal

    public function eliminarTBAnimal($animalId) {
        return $this->animalData->eliminarAnimal($animalId);
    }//EliminarAnimal

    public function obtenerTBAnimal() {
        return $this->animalData->obtenerAnimales();
    }//ObtenerAnimal

    public function obtenerInformacionAnimales() {
        return $this->animalData->obtenerInformacionAnimales();
    }//ObtenerActualizar

    public function obtenerEdadAnimalUnico($idAnimal) {
        return $this->animalData->obtenerEdadAnimalUnico($idAnimal);
    }//ObtenerActualizar
}//class

?>
