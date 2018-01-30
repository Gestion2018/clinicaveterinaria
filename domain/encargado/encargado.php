<?php
    class encargado{
        private $EncargadoId;
        private $EncargadoNombreCompleto;
        private $EncargadoDireccion;
        private $EncargadoEstado;
        private $EncargadoTelefono;
        private $EncargadoEmail;
        private $EncargadoPueblo;

        function encargado($EncargadoId, $EncargadoNombreCompleto,$EncargadoTelefono,
        $EncargadoDireccion, $EncargadoEstado, $EncargadoEmail,$EncargadoPueblo){
            $this->EncargadoId = $EncargadoId;
            $this->EncargadoNombreCompleto = $EncargadoNombreCompleto;
            $this->EncargadoDireccion = $EncargadoDireccion;
            $this->EncargadoEstado = $EncargadoEstado;
            $this->EncargadoTelefono = $EncargadoTelefono;
            $this->EncargadoEmail = $EncargadoEmail;
            $this->EncargadoPueblo = $EncargadoPueblo;
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

        public function getEncargadoEmail(){
            return $this->EncargadoEmail;
        }

        public function getEncargadoPueblo(){
            return $this->EncargadoPueblo;
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
            $this->EncargadoTelefono = $EncargadoTelefono;
        }

        public function setEncargadoEmail($EncargadoEmail){
            $this->EncargadoEmail = $EncargadoEmail;
        }

        public function setEncargadoPueblo($EncargadoPueblo){
            $this->EncargadoPueblo = $EncargadoPueblo;
        }
    }

?>
