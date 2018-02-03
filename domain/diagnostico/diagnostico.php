<?php
    class diagnostico
    {
        private $DiagnosticoId;
        private $AnimalId;
        private $AnimalPeso;
        private $FechaDiagnostico;
        private $DescripcionDiagnostico;
        private $DiagnosticoEstado;

        function diagnostico($DiagnosticoId, $AnimalId, $AnimalPeso,
        $FechaDiagnostico, $DescripcionDiagnostico, $DiagnosticoEstado)
        {
            $this->DiagnosticoId = $DiagnosticoId;
            $this->AnimalId = $AnimalId;
            $this->AnimalPeso = $AnimalPeso;
            $this->FechaDiagnostico = $FechaDiagnostico;
            $this->DescripcionDiagnostico = $DescripcionDiagnostico;
            $this->DiagnosticoEstado = $DiagnosticoEstado;
        }

        /*GET*/
        public function getDiagnosticoId() {
            return $this->DiagnosticoId;
        }

        public function getAnimalId() {
            return $this->AnimalId;
        }

        public function getAnimalPeso() {
            return $this->AnimalPeso;
        }

        public function getFechaDiagnostico() {
            return $this->FechaDiagnostico;
        }

        public function getDescripcionDiagnostico() {
            return $this->DescripcionDiagnostico;
        }

        public function getDiagnosticoEstado() {
            return $this->DiagnosticoEstado;
        }

        /*SET*/
        public function setDiagnosticoId($DiagnosticoId) {
            $this->DiagnosticoId = $DiagnosticoId;
        }

        public function setAnimalId($AnimalId) {
            $this->AnimalId = $AnimalId;
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

        public function setDiagnosticoEstado($DiagnosticoEstado) {
            $this->DiagnosticoEstado = $DiagnosticoEstado;
        }
    }

?>
