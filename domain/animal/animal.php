<?php
    class animal {
        private $AnimalNombre;
        private $AnimalId;
        private $EspecieRazaId;
        private $AnimalSennas; /*Señas de animales*/
        private $AnimalEstado;
        private $AnimalIdCliente

        function animal($AnimalNombre, $AnimalId, $EspecieRazaId, $AnimalSennas,
        $AnimalEstado, $AnimalIdCliente)
        {
            $this->AnimalNombre = $AnimalNombre;
            $this->AnimalId = $AnimalId;
            $this->EspecieRazaId = $EspecieRazaId;
            $this->AnimalSennas = $AnimalSennas;
            $this->AnimalEstado = $AnimalEstado;
            $this->AnimalIdCliente = $AnimalIdCliente;
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

        public function getAnimalEstado()
        {
            return $this->AnimalEstado;
        }

        public function getAnimalIdCliente()
        {
            return $this->AnimalIdCliente;
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

        public function setAnimalEstado($AnimalEstado)
        {
            $this->AnimalEstado = $AnimalEstado;
        }

        public function setAnimalIdCliente($AnimalIdCliente)
        {
            $this->AnimalIdCliente = $AnimalIdCliente;
        }
    }
?>
