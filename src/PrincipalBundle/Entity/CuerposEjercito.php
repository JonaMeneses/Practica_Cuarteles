<?php

namespace PrincipalBundle\Entity;

/**
 * CuerposEjercito
 */
class CuerposEjercito
{
    /**
     * @var integer
     */
    private $codigoCuerpo;

    /**
     * @var string
     */
    private $denominacion;

    public function __toString(){
        $string=(String)$this->codigoCuerpo;
        return $string;
    }


    /**
     * Get codigoCuerpo
     *
     * @return integer
     */
    public function getId()
    {
        return $this->codigoCuerpo;
    }

    /**
     * Set denominacion
     *
     * @param string $denominacion
     *
     * @return CuerposEjercito
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;

        return $this;
    }

    /**
     * Get denominacion
     *
     * @return string
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Get codigoCuerpo
     *
     * @return integer
     */
    public function getCodigoCuerpo()
    {
        return $this->codigoCuerpo;
    }
}
