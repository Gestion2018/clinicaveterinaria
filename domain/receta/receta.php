<?php
    class Receta
    {
        private $RecetaId;
        private $RecetaProductoVeterinarioId;
        private $RecetaViaAplicacionProducto;
        private $RecetaPeriodicidadProducto;
        private $RecetaDosisProducto;
        private $RecetaPrecioProducto;
        private $RecetaEstado;

        function Receta($RecetaId, $RecetaProductoVeterinarioId, $RecetaViaAplicacionProducto, $RecetaPeriodicidadProducto, $RecetaDosisProducto, $RecetaPrecioProducto, $RecetaEstado)
        {
            $this->RecetaId = $RecetaId;
            $this->RecetaProductoVeterinarioId = $RecetaProductoVeterinarioId;
            $this->RecetaViaAplicacionProducto = $RecetaViaAplicacionProducto;
            $this->RecetaPeriodicidadProducto = $RecetaPeriodicidadProducto;
            $this->RecetaDosisProducto = $RecetaDosisProducto;
            $this->RecetaPrecioProducto = $RecetaPrecioProducto;
            $this->RecetaEstado = $RecetaEstado;
        }

        /*GET*/
        public function getRecetaId()
        {
            return $this->RecetaId;
        }

        public function getRecetaProductoVeterinarioId()
        {
            return $this->RecetaProductoVeterinarioId;
        }

        public function getRecetaViaAplicacionProducto()
        {
            return $this->RecetaViaAplicacionProducto;
        }

        public function getRecetaPeriodicidadProducto()
        {
            return $this->RecetaPeriodicidadProducto;
        }

        public function getRecetaDosisProducto()
        {
            return $this->RecetaDosisProducto;
        }

        public function getRecetaPrecioProducto()
        {
            return $this->RecetaPrecioProducto;
        }

        public function getRecetaEstado()
        {
            return $this->RecetaEstado;
        }

        /*SET*/
        public function setRecetaId($RecetaId)
        {
            $this->RecetaId = $RecetaId;
        }

        public function setRecetaProductoVeterinarioId($RecetaProductoVeterinarioId)
        {
            $this->RecetaProductoVeterinarioId = $RecetaProductoVeterinarioId;
        }

        public function setRecetaViaAplicacionProducto($RecetaViaAplicacionProducto)
        {
            $this->RecetaViaAplicacionProducto = $RecetaViaAplicacionProducto;
        }

        public function setRecetaPeriodicidadProducto($RecetaPeriodicidadProducto)
        {
            $this->RecetaPeriodicidadProducto = $RecetaPeriodicidadProducto;
        }

        public function setRecetaDosisProducto($RecetaDosisProducto)
        {
            $this->RecetaDosisProducto = $RecetaDosisProducto;
        }

        public function setRecetaPrecioProducto($RecetaPrecioProducto)
        {
            $this->RecetaPrecioProducto = $RecetaPrecioProducto;
        }

        public function setRecetaEstado($RecetaEstado)
        {
            $this->RecetaEstado = $RecetaEstado;
        }
    }//class

?>
