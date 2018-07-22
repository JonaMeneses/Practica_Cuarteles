<?php

namespace PrincipalBundle\Entity;

/**
 * Servicios
 */
class Servicios
{
    /**
     * @var integer
     */
    private $codigoServicio;

    /**
     * @var string
     */
    private $descripcion;


    /**
     * Get codigoServicio
     *
     * @return integer
     */
    public function getId()
    {
        return $this->codigoServicio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Servicios
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get codigoServicio
     *
     * @return integer
     */
    public function getCodigoServicio()
    {
        return $this->codigoServicio;
    }
}
