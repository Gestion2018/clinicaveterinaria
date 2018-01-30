<?php
    class diagnostico
    {
        private $EncargadoId;
        private $AnimalNombre;
        private $AnimalEspecie;
        private $AnimalRaza;
        private $AnimalfechaNacimiento;
        private $AnimalPeso;
        private $FechaDiagnostico;
        private $DescripcionDiagnostico;

        function diagnostico($EncargadoId, $AnimalNombre, $AnimalEspecie, $AnimalRaza,
        $AnimalfechaNacimiento, $AnimalPeso, $FechaDiagnostico, $DescripcionDiagnostico)
        {
            $this->EncargadoId = $EncargadoId;
            $this->AnimalNombre = $AnimalNombre;
            $this->AnimalEspecie = $AnimalEspecie;
            $this->AnimalRaza = $AnimalRaza;
            $this->AnimalfechaNacimiento = $AnimalfechaNacimiento;
            $this->AnimalPeso = $AnimalPeso;
            $this->FechaDiagnostico = $FechaDiagnostico;
            $this->DescripcionDiagnostico = $DescripcionDiagnostico;
        }

        /*GET*/
        public function getEncargadoId() {
            return $this->EncargadoId;
        }

        public function getAnimalNombre() {
            return $this->$AnimalNombre;
        }

        public function getAnimalEspecie() {
            return $this->$AnimalEspecie;
        }

        public function getAnimalRaza() {
            return $this->$AnimalRaza;
        }

        public function getAnimalfechaNacimiento() {
            return $this->$AnimalfechaNacimiento;
        }

        public function getAnimalPeso() {
            return $this->$AnimalPeso;
        }

        public function getFechaDiagnostico() {
            return $this->$FechaDiagnostico;
        }

        public function getDescripcionDiagnostico() {
            return $this->$DescripcionDiagnostico;
        }

        /*SET*/
        public function setEncargadoId($EncargadoId) {
            $this->EncargadoId = $EncargadoId;
        }

        public function setAnimalNombre($AnimalNombre) {
            $this->AnimalNombre = $AnimalNombre;
        }

        public function setAnimalEspecie($AnimalEspecie) {
            $this->$AnimalEspecie = $AnimalEspecie;
        }

        public function setAnimalRaza($AnimalRaza) {
            $this->AnimalRaza = $AnimalRaza;
        }

        public function setAnimalfechaNacimiento($AnimalfechaNacimiento) {
            $this->AnimalfechaNacimiento = $AnimalfechaNacimiento;
        }

        public function setAnimalPeso($AnimalPeso) {
            $this->AnimalPeso = $AnimalPeso;
        }

        public function setFechaDiagnostico($FechaDiagnostico) {
            $this->FechaDiagnostico = $FechaDiagnostico;
        }

        public function setDescripcionDiagnostico($DescripcionDiagnostico) {
            $this->DescripcionDiagnostico = $DescripcionDiagnostico;
        }
    }

?>
