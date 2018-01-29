<?php
    class tratamientoveterinario
    {
        private $TratamientoveterinarioId;
        private $ProductoveterinarioId;
        private $EnfermedadescomunesId;
        private $TratamientoveterinarioDosis;
        private $TratamientoveterinarioPeriodicidad;
        private $TratamientoveterinarioFecha;

        function tratamientoveterinario($TratamientoveterinarioId, $ProductoveterinarioId,
        $EnfermedadescomunesId, $TratamientoveterinarioDosis, $TratamientoveterinarioPeriodicidad,
        $TratamientoveterinarioFecha)
        {
            $this->TratamientoveterinarioId = $TratamientoveterinarioId;
            $this->ProductoveterinarioId = $ProductoveterinarioId;
            $this->EnfermedadescomunesId = $EnfermedadescomunesId;
            $this->TratamientoveterinarioDosis = $TratamientoveterinarioDosis;
            $this->TratamientoveterinarioPeriodicidad = $TratamientoveterinarioPeriodicidad;
            $this->TratamientoveterinarioFecha = $TratamientoveterinarioFecha;
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

        /*SET*/
        public function setTratamientoveterinarioId($TratamientoveterinarioId)
        {
            $this->TratamientoveterinarioId = $TratamientoveterinarioId;
        }

        public function setProductoveterinarioId($ProductoveterinarioId)
        {
            $this->ProductoveterinarioId = $ProductoveterinarioId;
        }

        public function getEnfermedadescomunesId($EnfermedadescomunesId)
        {
            $this->EnfermedadescomunesId = $EnfermedadescomunesId;
        }

        public function getTratamientoveterinarioDosis($TratamientoveterinarioDosis)
        {
            $this->TratamientoveterinarioDosis = $TratamientoveterinarioDosis;
        }

        public function getTratamientoveterinarioPeriodicidad($TratamientoveterinarioPeriodicidad)
        {
            $this->TratamientoveterinarioPeriodicidad = $TratamientoveterinarioPeriodicidad;
        }

        public function getTratamientoveterinarioFecha($TratamientoveterinarioFecha)
        {
            $this->TratamientoveterinarioFecha = $TratamientoveterinarioFecha;
        }
    }

?>
