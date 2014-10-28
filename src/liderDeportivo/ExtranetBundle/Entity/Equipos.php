<?php

namespace liderDeportivo\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipos
 *
 * @ORM\Table(name="equipos", indexes={@ORM\Index(name="campeonato_disciplina_equipos_fk", columns={"campeonato_disciplina_id"})})
 * @ORM\Entity
 */
class Equipos
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
     * @ORM\Column(name="logo", type="string", length=255, nullable=false)
     */
    private $logo;

    /**
     * @var \CampeonatoDisciplina
     *
     * @ORM\ManyToOne(targetEntity="CampeonatoDisciplina")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campeonato_disciplina_id", referencedColumnName="id")
     * })
     */
    private $campeonatoDisciplina;



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
     * @return Equipos
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
     * Set logo
     *
     * @param string $logo
     * @return Equipos
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set campeonatoDisciplina
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\CampeonatoDisciplina $campeonatoDisciplina
     * @return Equipos
     */
    public function setCampeonatoDisciplina(\liderDeportivo\ExtranetBundle\Entity\CampeonatoDisciplina $campeonatoDisciplina = null)
    {
        $this->campeonatoDisciplina = $campeonatoDisciplina;

        return $this;
    }

    /**
     * Get campeonatoDisciplina
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\CampeonatoDisciplina 
     */
    public function getCampeonatoDisciplina()
    {
        return $this->campeonatoDisciplina;
    }
}
