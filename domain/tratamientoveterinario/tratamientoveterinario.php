<?php
    class tratamientoveterinario
    {
        private $TratamientoveterinarioId;
        private $ProductoveterinarioId;
        private $EnfermedadescomunesId;
        private $TratamientoveterinarioDosis;
        private $TratamientoveterinarioPeriodicidad;
        private $TratamientoveterinarioFecha;
        private $TratamientoveterinarioAnimalId;
        private $TratamientoveterinarioEstado;

        function tratamientoveterinario($TratamientoveterinarioId, $ProductoveterinarioId,
        $EnfermedadescomunesId, $TratamientoveterinarioDosis, $TratamientoveterinarioPeriodicidad,
        $TratamientoveterinarioFecha, $TratamientoveterinarioAnimalId, $TratamientoveterinarioEstado)
        {
            $this->TratamientoveterinarioId = $TratamientoveterinarioId;
            $this->ProductoveterinarioId = $ProductoveterinarioId;
            $this->EnfermedadescomunesId = $EnfermedadescomunesId;
            $this->TratamientoveterinarioDosis = $TratamientoveterinarioDosis;
            $this->TratamientoveterinarioPeriodicidad = $TratamientoveterinarioPeriodicidad;
            $this->TratamientoveterinarioFecha = $TratamientoveterinarioFecha;
            $this->TratamientoveterinarioAnimalId = $TratamientoveterinarioAnimalId;
            $this->TratamientoveterinarioEstado = $TratamientoveterinarioEstado;
        }

        /*GET*/
        public function getTratamientoveterinarioId()
        {
            return $this->TratamientoveterinarioId;
        }

        public function getProductoveterinarioId()
        {
            return $this->ProductoveterinarioId;
        }

        public function getEnfermedadescomunesId()
        {
            return $this->EnfermedadescomunesId;
        }

        public function getTratamientoveterinarioDosis()
        {
            return $this->TratamientoveterinarioDosis;
        }

        public function getTratamientoveterinarioPeriodicidad()
        {
            return $this->TratamientoveterinarioPeriodicidad;
        }

        public function getTratamientoveterinarioFecha()
        {
            return $this->TratamientoveterinarioFecha;
        }

        public function getTratamientoveterinarioAnimalId()
        {
            return $this->TratamientoveterinarioAnimalId;
        }

        public function getTratamientoveterinarioEstado()
        {
            return $this->TratamientoveterinarioEstado;
        }


        /*SET*/
        public function setTratamientoveterinarioId($TratamientoveterinarioId)
        {
            $this->TratamientoveterinarioId = $TratamientoveterinarioId;
        }

        public function setProductoveterinarioId($ProductoveterinarioId)
        {
            $this->ProductoveterinarioId = $ProductoveterinarioId;
        }

        public function setEnfermedadescomunesId($EnfermedadescomunesId)
        {
            $this->EnfermedadescomunesId = $EnfermedadescomunesId;
        }

        public function setTratamientoveterinarioDosis($TratamientoveterinarioDosis)
        {
            $this->TratamientoveterinarioDosis = $TratamientoveterinarioDosis;
        }

        public function setTratamientoveterinarioPeriodicidad($TratamientoveterinarioPeriodicidad)
        {
            $this->TratamientoveterinarioPeriodicidad = $TratamientoveterinarioPeriodicidad;
        }

        public function setTratamientoveterinarioFecha($TratamientoveterinarioFecha)
        {
            $this->TratamientoveterinarioFecha = $TratamientoveterinarioFecha;
        }

        public function setTratamientoveterinarioAnimalId($TratamientoveterinarioAnimalId)
        {
            $this->TratamientoveterinarioAnimalId = $TratamientoveterinarioAnimalId;
        }

        public function setTratamientoveterinarioEstado($TratamientoveterinarioEstado)
        {
            $this->TratamientoveterinarioEstado = $TratamientoveterinarioEstado;
        }
    }

?>
