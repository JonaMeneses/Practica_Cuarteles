<?php

namespace PrincipalBundle\Entity;

/**
 * Companias
 */
class Companias
{
    /**
     * @var integer
     */
    private $numCompania;

    /**
     * @var string
     */
    private $actividad;


public function __toString(){
        $string=(String)$this->numCompania;
        return $string;
    }


    /**
     * Get numCompania
     *
     * @return integer
     */
    public function getId()
    {
        return $this->numCompania;
    }

    /**
     * Set actividad
     *
     * @param string $actividad
     *
     * @return Companias
     */
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get actividad
     *
     * @return string
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Get numCompania
     *
     * @return integer
     */
    public function getNumCompania()
    {
        return $this->numCompania;
    }
}
