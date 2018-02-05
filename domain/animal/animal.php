<?php
    class animal {
        private $AnimalNombre;
        private $AnimalId;
        private $EspecieRazaId;
        private $AnimalEstado;
        private $AnimalIdCliente;
        private $AnimalFechaNacimiento;

        function animal($AnimalNombre, $AnimalId, $EspecieRazaId, $AnimalIdCliente, $AnimalFechaNacimiento ,
        $AnimalEstado)
        {
            $this->AnimalNombre = $AnimalNombre;
            $this->AnimalId = $AnimalId;
            $this->EspecieRazaId = $EspecieRazaId;
            $this->AnimalEstado = $AnimalEstado;
            $this->AnimalIdCliente = $AnimalIdCliente;
            $this->AnimalFechaNacimiento = $AnimalFechaNacimiento;
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

        public function getAnimalEstado()
        {
            return $this->AnimalEstado;
        }

        public function getAnimalIdCliente()
        {
            return $this->AnimalIdCliente;
        }

        public function getAnimalFechaNacimiento()
        {
            return $this->AnimalFechaNacimiento;
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

        public function setAnimalEstado($AnimalEstado)
        {
            $this->AnimalEstado = $AnimalEstado;
        }

        public function setAnimalIdCliente($AnimalIdCliente)
        {
            $this->AnimalIdCliente = $AnimalIdCliente;
        }

        public function setAnimalFechaNacimiento($AnimalFechaNacimiento)
        {
            return $this->AnimalFechaNacimiento = $AnimalFechaNacimiento;
        }
    }
?>
