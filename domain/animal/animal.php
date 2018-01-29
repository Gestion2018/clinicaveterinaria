<?php
    class animal {
        private $AnimalNombre;
        private $AnimalId;
        private $EspecieRazaId;
        private $AnimalSennas; /*Señas de animales*/
        private $AnimalPeso;
        private $AnimalMedidaPeso;
        private $AnimalEstado;

        function animal($AnimalNombre, $AnimalId, $EspecieRazaId, $AnimalSennas,
        $AnimalPeso, $AnimalMedidaPeso, $AnimalEstado)
        {
            $this->AnimalNombre = $AnimalNombre;
            $this->AnimalId = $AnimalId;
            $this->EspecieRazaId = $EspecieRazaId;
            $this->AnimalSennas = $AnimalSennas;
            $this->AnimalPeso = $AnimalPeso;
            $this->AnimalMedidaPeso = $AnimalMedidaPeso;
            $this->AnimalEstado = $AnimalEstado;
        }

        /***********************************************************************
        *                        METODOS ACCESORES                             *
        ************************************************************************/

        /*GET*/
        public function getAnimalNombre()
        {
            return $this->AnimalNombre;
        }

        public function getAnimalId()
        {
            return $this->AnimalId;
        }

        public function getAnimalEspecieRazaId()
        {
            return $this->EspecieRazaId;
        }

        public function getAnimalSennas()
        {
            return $this->AnimalSennas;
        }

        public function getAnimalPeso()
        {
            return $this->AnimalPeso;
        }

        public function getAnimalMedidaPeso()
        {
            return $this->AnimalMedidaPeso;
        }

        public function getAnimalEstado()
        {
            return $this->AnimalEstado;
        }

        /*SET*/
        public function setAnimalNombre($AnimalNombre)
        {
            $this->AnimalNombre = $AnimalNombre;
        }

        public function setAnimalId($AnimalId)
        {
            $this->AnimalId = $AnimalId;
        }

        public function setAnimalEspecieRazaId($EspecieRazaId)
        {
            $this->EspecieRazaId = $EspecieRazaId;
        }

        public function setAnimalSennas($AnimalSennas)
        {
            $this->AnimalSennas = $AnimalSennas;
        }

        public function setAnimalPeso($AnimalPeso)
        {
            $this->AnimalPeso = $AnimalPeso;
        }

        public function setAnimalMedidaPeso($AnimalMedidaPeso)
        {
            $this->AnimalMedidaPeso = $AnimalMedidaPeso;
        }

        public function setAnimalEstado($AnimalEstado)
        {
            $this->AnimalEstado = $AnimalEstado;
        }
    }
?>
