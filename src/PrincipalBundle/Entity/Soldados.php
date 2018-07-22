<?php

namespace PrincipalBundle\Entity;

/**
 * Soldados
 */
class Soldados
{
    /**
     * @var integer
     */
    private $codigoSoldado;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $paterno;

    /**
     * @var string
     */
    private $materno;

    /**
     * @var string
     */
    private $graduacion;

    /**
     * @var integer
     */
    private $fkcodigoCuerpo;

    /**
     * @var integer
     */
    private $fknumCompania;

    /**
     * @var integer
     */
    private $fkcodigoCuartel;


    /**
     * Get codigoSoldado
     *
     * @return integer
     */
    public function getId()
    {
        return $this->codigoSoldado;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Soldados
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set paterno
     *
     * @param string $paterno
     *
     * @return Soldados
     */
    public function setPaterno($paterno)
    {
        $this->paterno = $paterno;

        return $this;
    }

    /**
     * Get paterno
     *
     * @return string
     */
    public function getPaterno()
    {
        return $this->paterno;
    }

    /**
     * Set materno
     *
     * @param string $materno
     *
     * @return Soldados
     */
    public function setMaterno($materno)
    {
        $this->materno = $materno;

        return $this;
    }

    /**
     * Get materno
     *
     * @return string
     */
    public function getMaterno()
    {
        return $this->materno;
    }

    /**
     * Set graduacion
     *
     * @param string $graduacion
     *
     * @return Soldados
     */
    public function setGraduacion($graduacion)
    {
        $this->graduacion = $graduacion;

        return $this;
    }

    /**
     * Get graduacion
     *
     * @return string
     */
    public function getGraduacion()
    {
        return $this->graduacion;
    }

    /**
     * Set fkcodigoCuerpo
     *
     * @param integer $fkcodigoCuerpo
     *
     * @return Soldados
     */
    public function setFkcodigoCuerpo($fkcodigoCuerpo)
    {
        $this->fkcodigoCuerpo = $fkcodigoCuerpo;

        return $this;
    }

    /**
     * Get fkcodigoCuerpo
     *
     * @return integer
     */
    public function getFkcodigoCuerpo()
    {
        return $this->fkcodigoCuerpo;
    }

    /**
     * Set fknumCompania
     *
     * @param integer $fknumCompania
     *
     * @return Soldados
     */
    public function setFknumCompania($fknumCompania)
    {
        $this->fknumCompania = $fknumCompania;

        return $this;
    }

    /**
     * Get fknumCompania
     *
     * @return integer
     */
    public function getFknumCompania()
    {
        return $this->fknumCompania;
    }

    /**
     * Set fkcodigoCuartel
     *
     * @param integer $fkcodigoCuartel
     *
     * @return Soldados
     */
    public function setFkcodigoCuartel($fkcodigoCuartel)
    {
        $this->fkcodigoCuartel = $fkcodigoCuartel;

        return $this;
    }

    /**
     * Get fkcodigoCuartel
     *
     * @return integer
     */
    public function getFkcodigoCuartel()
    {
        return $this->fkcodigoCuartel;
    }
}

