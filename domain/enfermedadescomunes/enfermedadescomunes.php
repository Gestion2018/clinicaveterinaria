<?php
class enfermedadescomunes
{
    private $EnfermedadescomunesId;
    private $EnfermedadescomunesNombre;
    private $EnfermedadescomunesDescripcion;
    private $EnfermedadescomunesSintomas;
    private $EnfermedadescomunesEstado;
    private $EnfermedadescomunesProductosUsados;

    function enfermedadescomunes($EnfermedadescomunesId, $EnfermedadescomunesNombre,
    $EnfermedadescomunesDescripcion, $EnfermedadescomunesSintomas, $EnfermedadescomunesEstado,
    $EnfermedadescomunesProductosUsados)
    {
        $this->EnfermedadescomunesId = $EnfermedadescomunesId;
        $this->EnfermedadescomunesNombre = $EnfermedadescomunesNombre;
        $this->EnfermedadescomunesDescripcion = $EnfermedadescomunesDescripcion;
        $this->EnfermedadescomunesSintomas = $EnfermedadescomunesSintomas;
        $this->EnfermedadescomunesEstado = $EnfermedadescomunesEstado;
        $this->EnfermedadescomunesProductosUsados = $EnfermedadescomunesProductosUsados;
    }

    /***********************************************************************
    *                        METODOS ACCESORES                             *
    ************************************************************************/

    /*GET*/
    public function getEnfermedadescomunesId()
    {
        return $this->EnfermedadescomunesId;
    }

    public function getEnfermedadescomunesNombre()
    {
        return $this->EnfermedadescomunesNombre;
    }

    public function getEnfermedadescomunesDescripcion()
    {
        return $this->EnfermedadescomunesDescripcion;
    }

    public function getEnfermedadescomunesSintomas()
    {
        return $this->EnfermedadescomunesSintomas;
    }

    public function getEnfermedadescomunesEstado()
    {
        return $this->EnfermedadescomunesEstado;
    }

    public function getEnfermedadescomunesProductosUsados()
    {
        return $this->EnfermedadescomunesProductosUsados;
    }

    /*SET*/
    public function setEnfermedadescomunesId($EnfermedadescomunesId)
    {
        $this->EnfermedadescomunesId = $EnfermedadescomunesId;
    }

    public function setEnfermedadescomunesNombre($EnfermedadescomunesNombre)
    {
        $this->EnfermedadescomunesNombre = $EnfermedadescomunesNombre;
    }

    public function setEnfermedadescomunesDescripcion($EnfermedadescomunesDescripcion)
    {
        $this->EnfermedadescomunesDescripcion = $EnfermedadescomunesDescripcion;
    }

    public function setEnfermedadescomunesSintomas($EnfermedadescomunesSintomas)
    {
        $this->EnfermedadescomunesSintomas = $EnfermedadescomunesSintomas;
    }

    public function setEnfermedadescomunesEstado($EnfermedadescomunesEstado)
    {
        $this->EnfermedadescomunesEstado = $EnfermedadescomunesEstado;
    }

    public function getEnfermedadescomunesProductosUsados($EnfermedadescomunesProductosUsados)
    {
        $this->EnfermedadescomunesProductosUsados = $EnfermedadescomunesProductosUsados;
    }
}
?>
