<?php
class sintoma
{
    private $SintomaId;
    private $SintomaNombre;
    private $SintomaDescripcion;
    private $SintomaEstado;

    function sintoma($SintomaId, $SintomaNombre,
    $SintomaDescripcion, $SintomaEstado)
    {
        $this->SintomaId = $SintomaId;
        $this->SintomaNombre = $SintomaNombre;
        $this->SintomaDescripcion = $SintomaDescripcion;
        $this->SintomaEstado = $SintomaEstado;
    }

    /***********************************************************************
    *                        METODOS ACCESORES                             *
    ************************************************************************/

    /*GET*/
    public function getSintomaId()
    {
        return $this->SintomaId;
    }

    public function getSintomaNombre()
    {
        return $this->SintomaNombre;
    }

    public function getSintomaDescripcion()
    {
        return $this->EnfermedadescomunesDescripcion;
    }

    public function getSintomaEstado()
    {
        return $this->SintomaEstado;
    }

    /*SET*/
    public function setSintomaId($SintomaId)
    {
        $this->SintomaId = $SintomaId;
    }

    public function setSintomaNombre($SintomaNombre)
    {
        $this->SintomaNombre = $SintomaNombre;
    }

    public function setSintomaDescripcion($SintomaDescripcion)
    {
        $this->SintomaDescripcion = $SintomaDescripcion;
    }

    public function setSintomaEstado($SintomaEstado)
    {
        $this->SintomaEstado = $SintomaEstado;
    }
}//class
?>