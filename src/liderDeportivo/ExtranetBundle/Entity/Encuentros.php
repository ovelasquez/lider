<?php

namespace liderDeportivo\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Encuentros
 *
 * @ORM\Table(name="encuentros", indexes={@ORM\Index(name="calendarios_encuentros_fk", columns={"calendario_id"}), @ORM\Index(name="fases_encuentros_fk", columns={"fase_id"}), @ORM\Index(name="grupos_encuentros_fk", columns={"grupo_id"})})
 * @ORM\Entity
 */
class Encuentros
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var \Grupos
     *
     * @ORM\ManyToOne(targetEntity="Grupos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grupo_id", referencedColumnName="id")
     * })
     */
    private $grupo;

    /**
     * @var \Calendarios
     *
     * @ORM\ManyToOne(targetEntity="Calendarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="calendario_id", referencedColumnName="id")
     * })
     */
    private $calendario;

    /**
     * @var \Fases
     *
     * @ORM\ManyToOne(targetEntity="Fases")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fase_id", referencedColumnName="id")
     * })
     */
    private $fase;



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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Encuentros
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set grupo
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Grupos $grupo
     * @return Encuentros
     */
    public function setGrupo(\liderDeportivo\ExtranetBundle\Entity\Grupos $grupo = null)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\Grupos 
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set calendario
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Calendarios $calendario
     * @return Encuentros
     */
    public function setCalendario(\liderDeportivo\ExtranetBundle\Entity\Calendarios $calendario = null)
    {
        $this->calendario = $calendario;

        return $this;
    }

    /**
     * Get calendario
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\Calendarios 
     */
    public function getCalendario()
    {
        return $this->calendario;
    }

    /**
     * Set fase
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Fases $fase
     * @return Encuentros
     */
    public function setFase(\liderDeportivo\ExtranetBundle\Entity\Fases $fase = null)
    {
        $this->fase = $fase;

        return $this;
    }

    /**
     * Get fase
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\Fases 
     */
    public function getFase()
    {
        return $this->fase;
    }
}
