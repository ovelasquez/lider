<?php

namespace liderDeportivo\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campeonatos
 *
 * @ORM\Table(name="campeonatos", indexes={@ORM\Index(name="ligas_campeonatos_fk", columns={"liga_id"})})
 * @ORM\Entity
 */
class Campeonatos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=false)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inicio", type="date", nullable=false)
     */
    private $inicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="date", nullable=false)
     */
    private $fin;

    /**
     * @var string
     *
     * @ORM\Column(name="sede", type="string", length=255, nullable=false)
     */
    private $sede;

    /**
     * @var \Ligas
     *
     * @ORM\ManyToOne(targetEntity="Ligas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="liga_id", referencedColumnName="id")
     * })
     */
    private $liga;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Campeonatos
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Campeonatos
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
     * Set inicio
     *
     * @param \DateTime $inicio
     * @return Campeonatos
     */
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;

        return $this;
    }

    /**
     * Get inicio
     *
     * @return \DateTime 
     */
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     * @return Campeonatos
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime 
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set sede
     *
     * @param string $sede
     * @return Campeonatos
     */
    public function setSede($sede)
    {
        $this->sede = $sede;

        return $this;
    }

    /**
     * Get sede
     *
     * @return string 
     */
    public function getSede()
    {
        return $this->sede;
    }

    /**
     * Set liga
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Ligas $liga
     * @return Campeonatos
     */
    public function setLiga(\liderDeportivo\ExtranetBundle\Entity\Ligas $liga = null)
    {
        $this->liga = $liga;

        return $this;
    }

    /**
     * Get liga
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\Ligas 
     */
    public function getLiga()
    {
        return $this->liga;
    }
}
