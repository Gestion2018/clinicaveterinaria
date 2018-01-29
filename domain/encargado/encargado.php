<?php
    class encargado{
        private $EncargadoId;
        private $EncargadoNombreCompleto;
        private $EncargadoDireccion;
        private $EncargadoEstado;
        private $EncargadoTelefono;

        function encargado($EncargadoId, $EncargadoNombreCompleto,$EncargadoTelefono,
        $EncargadoDireccion, $EncargadoEstado){
            $this->EncargadoId = $EncargadoId;
            $this->EncargadoNombreCompleto = $EncargadoNombreCompleto;
            $this->EncargadoDireccion = $EncargadoDireccion;
            $this->EncargadoEstado = $EncargadoEstado;
            $this->EncargadoTelefono = $EncargadoTelefono;
        }

        /**************************************************************************
        *                        METODOS ACCESORES                                *
        ***************************************************************************/

        /*GET*/
        public function getEncargadoId(){
            return $this->EncargadoId;
        }

        public function getEncargadoNombreCompleto(){
            return $this->EncargadoNombreCompleto;
        }

        public function getEncargadoDireccion(){
            return $this->EncargadoDireccion;
        }

        public function getEncargadoEstado(){
            return $this->EncargadoEstado;
        }

        public function getEncargadoTelefono(){
            return $this->EncargadoTelefono;
        }

        /*SET*/
        public function setEncargadoId($EncargadoId){
            $this->EncargadoId = $EncargadoId;
        }

        public function setEncargadoNombreCompleto($EncargadoNombreCompleto){
            $this->EncargadoNombreCompleto = $EncargadoNombreCompleto;
        }

        public function setEncargadoDireccion($EncargadoDireccion){
            $this->EncargadoDireccion = $EncargadoDireccion;
        }

        public function setEncargadoEstado($EncargadoEstado){
            $this->EncargadoEstado = $EncargadoEstado;
        }

        public function setEncargadoTelefono($EncargadoTelefono){
            return $this->EncargadoTelefono;
        }
    }

?>
