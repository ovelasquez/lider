<?php

namespace liderDeportivo\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorias
 *
 * @ORM\Table(name="categorias", indexes={@ORM\Index(name="liga_disciplina_equipos_fk", columns={"liga_disciplina_id"})})
 * @ORM\Entity
 */
class Categorias
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
     * @var \LigaDisciplina
     *
     * @ORM\ManyToOne(targetEntity="LigaDisciplina")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="liga_disciplina_id", referencedColumnName="id")
     * })
     */
    private $ligaDisciplina;



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
     * @return Categorias
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
     * @return Categorias
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
     * Set ligaDisciplina
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\LigaDisciplina $ligaDisciplina
     * @return Categorias
     */
    public function setLigaDisciplina(\liderDeportivo\ExtranetBundle\Entity\LigaDisciplina $ligaDisciplina = null)
    {
        $this->ligaDisciplina = $ligaDisciplina;

        return $this;
    }

    /**
     * Get ligaDisciplina
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\LigaDisciplina 
     */
    public function getLigaDisciplina()
    {
        return $this->ligaDisciplina;
    }
    
    public function __toString() {
        return $this->getNombre();
    }
}
