<?php
    class especie{
        private $EspecieId;
        private $EspecieNombre;
        private $EspecieEstado;

        function especie($EspecieId, $EspecieNombre, $EspecieEstado)
        {
            $this->EspecieId = $EspecieId;
            $this->EspecieNombre = $EspecieNombre;
            $this->EspecieEstado = $EspecieEstado;
        }

        /***********************************************************************
        *                        METODOS ACCESORES                             *
        ************************************************************************/

        /*GET*/
        public function getEspecieId()
        {
            return $this->EspecieId;
        }

        public function getEspecieNombre()
        {
            return $this->EspecieNombre;
        }

        public function getEspecieEstado()
        {
            return $this->EspecieEstado;
        }

        /*SET*/
        public function setEspecieId($EspecieId)
        {
            $this->EspecieId = $EspecieId;
        }

        public function setNombreEspecie($NombreEspecie)
        {
            $this->NombreEspecie = $NombreEspecie;
        }

        public function setEspecieEstado($EspecieEstado)
        {
            $this->EspecieEstado = $EspecieEstado;
        }
    }

?>
