<?php
  class productoveterinario
  {
      private $ProductoVeterinarioId;
      private $ProductoVeterinarioNombre;
      private $ProductoVeterinarioPrincipioActivo;
      private $ProductoVeterinarioContenido;
      private $ProductoVeterinarioPrecio;
      private $ProductoVeterinarioNombreComun;
      private $ProductoVeterinarioEstado;
      private $ProductoVeterinarioUnidad;/*Gramos, mililitros, pastillas*/

      function productoveterinario($ProductoVeterinarioId, $ProductoVeterinarioNombre,
      $ProductoVeterinarioPrincipioActivo, $ProductoVeterinarioContenido, $ProductoVeterinarioPrecio,
      $ProductoVeterinarioNombreComun, $ProductoVeterinarioEstado, $ProductoVeterinarioUnidad)
      {
          $this->ProductoVeterinarioId = $ProductoVeterinarioId;
          $this->ProductoVeterinarioNombre = $ProductoVeterinarioNombre;
          $this->ProductoVeterinarioPrincipioActivo = $ProductoVeterinarioPrincipioActivo;
          $this->ProductoVeterinarioContenido = $ProductoVeterinarioContenido;
          $this->ProductoVeterinarioPrecio = $ProductoVeterinarioPrecio;
          $this->ProductoVeterinarioNombreComun = $ProductoVeterinarioNombreComun;
          $this->ProductoVeterinarioEstado = $ProductoVeterinarioEstado;
          $this->ProductoVeterinarioUnidad = $ProductoVeterinarioUnidad;
      }

      /***********************************************************************
      *                        METODOS ACCESORES                             *
      ************************************************************************/

      /*GET*/
      public function getProductoVeterinarioId()
      {
          return $this->ProductoVeterinarioId;
      }

      public function getProductoVeterinarioNombre()
      {
          return $this->ProductoVeterinarioNombre;
      }

      public function getProductoVeterinarioPrincipioActivo()
      {
          return $this->ProductoVeterinarioPrincipioActivo;
      }

      public function getProductoVeterinarioContenido()
      {
          return $this->ProductoVeterinarioContenido;
      }
      public function getProductoVeterinarioPrecio()
      {
          return $this->ProductoVeterinarioPrecio;
      }
      public function getProductoVeterinarioNombreComun()
      {
          return $this->ProductoVeterinarioNombreComun;
      }

      public function getProductoVeterinarioEstado()
      {
          return $this->ProductoVeterinarioEstado;
      }

      public function getProductoVeterinarioUnidad()
      {
          return $this->ProductoVeterinarioUnidad;
      }

      /*SET*/
      public function setProductoVeterinarioId($ProductoVeterinarioId)
      {
          $this->ProductoVeterinarioId = $ProductoVeterinarioId;
      }

      public function setProductoVeterinarioNombre($ProductoVeterinarioNombre)
      {
          $this->ProductoVeterinarioNombre = $ProductoVeterinarioNombre;
      }

      public function setProductoVeterinarioPrincipioActivo($ProductoVeterinarioPrincipioActivo)
      {
          $this->ProductoVeterinarioPrincipioActivo = $ProductoVeterinarioPrincipioActivo;
      }

      public function setProductoVeterinarioEstado($ProductoVeterinarioEstado)
      {
          $this->ProductoVeterinarioEstado = $ProductoVeterinarioEstado;
      }

      public function setProductoVeterinarioContenido($ProductoVeterinarioContenido)
      {
          $this->ProductoVeterinarioContenido = $ProductoVeterinarioContenido;
      }
      public function setProductoVeterinarioPrecio($ProductoVeterinarioPrecio)
      {
          $this->ProductoVeterinarioPrecio = $ProductoVeterinarioPrecio;
      }
      public function setProductoVeterinarioNombreComun($ProductoVeterinarioNombreComun)
      {
          $this->ProductoVeterinarioNombreComun = $ProductoVeterinarioNombreComun;
      }

      public function setProductoVeterinarioUnidad($ProductoVeterinarioUnidad)
      {
          $this->ProductoVeterinarioUnidad = $ProductoVeterinarioUnidad;
      }
  }
?>
