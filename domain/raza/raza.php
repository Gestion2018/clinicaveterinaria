<?php
    class raza{
        private $RazaId;
        private $RazaNombre;
        private $RazaEstado;
        private $RazaEspecieId;
        private $RazaEspecieNombre;

        function raza($RazaId, $NombreRaza, $RazaEstado, $RazaEspecieId, $RazaEspecieNombre)
        {
            $this->RazaId = $RazaId;
            $this->RazaNombre = $NombreRaza;
            $this->RazaEstado = $RazaEstado;
            $this->RazaEspecieId = $RazaEspecieId;
            $this->RazaEspecieNombre = $RazaEspecieNombre;
        }

        /***********************************************************************
        *                        METODOS ACCESORES                             *
        ************************************************************************/

        /*GET*/
        public function getRazaId()
        {
            return $this->RazaId;
        }

        public function getRazaNombre()
        {
            return $this->RazaNombre;
        }

        public function getRazaEstado()
        {
            return $this->RazaEstado;
        }

        public function getRazaEspecieId()
        {
            return $this->RazaEspecieId;
        }

        public function getRazaEspecieNombre()
        {
            return $this->RazaEspecieNombre;
        }
 

        /*SET*/
        public function setRazaId($RazaId)
        {
            $this->RazaId = $RazaId;
        }

        public function setRazaNombre($RazaNombre)
        {
            $this->RazaNombre = $RazaNombre;
        }

        public function setRazaEstado($RazaEstado)
        {
            $this->RazaEstado = $RazaEstado;
        }

        public function setRazaEspecieId($RazaEspecieId)
        {
          $this->RazaEspecieId = $RazaEspecieId;
        }

        public function setRazaEspecieNombre($RazaEspecieNombre)
        {
          $this->RazaEspecieNombre = $RazaEspecieNombre;
        }
    }

?>
