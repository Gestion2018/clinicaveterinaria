<?php
  class productoveterinario
  {
      private $ProductoVeterinarioId;
      private $ProductoVeterinarioNombre;
      private $ProductoVeterinarioPrincipioActivo;
      private $ProductoVeterinarioEstado;

      function productoveterinario($ProductoVeterinarioId, $ProductoVeterinarioNombre,
      $ProductoVeterinarioPrincipioActivo, $ProductoVeterinarioEstado)
      {
          $this->ProductoVeterinarioId = $ProductoVeterinarioId;
          $this->ProductoVeterinarioNombre = $ProductoVeterinarioNombre;
          $this->ProductoVeterinarioPrincipioActivo = $ProductoVeterinarioPrincipioActivo;
          $this->ProductoVeterinarioEstado = $ProductoVeterinarioEstado;
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

      public function getProductoVeterinarioEstado()
      {
          return $this->ProductoVeterinarioEstado;
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
  }
?>
