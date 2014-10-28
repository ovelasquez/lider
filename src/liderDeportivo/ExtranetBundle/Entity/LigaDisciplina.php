<?php

namespace liderDeportivo\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigaDisciplina
 *
 * @ORM\Table(name="liga_disciplina", indexes={@ORM\Index(name="disciplinas_liga_disciplina_fk", columns={"disciplina_id"}), @ORM\Index(name="ligas_liga_disciplina_fk", columns={"liga_id"})})
 * @ORM\Entity
 */
class LigaDisciplina
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
     * @var \Ligas
     *
     * @ORM\ManyToOne(targetEntity="Ligas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="liga_id", referencedColumnName="id")
     * })
     */
    private $liga;

    /**
     * @var \Disciplinas
     *
     * @ORM\ManyToOne(targetEntity="Disciplinas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="disciplina_id", referencedColumnName="id")
     * })
     */
    private $disciplina;



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
     * Set liga
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Ligas $liga
     * @return LigaDisciplina
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

    /**
     * Set disciplina
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Disciplinas $disciplina
     * @return LigaDisciplina
     */
    public function setDisciplina(\liderDeportivo\ExtranetBundle\Entity\Disciplinas $disciplina = null)
    {
        $this->disciplina = $disciplina;

        return $this;
    }

    /**
     * Get disciplina
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\Disciplinas 
     */
    public function getDisciplina()
    {
        return $this->disciplina;
    }
    
    public function __toString() {
        return $this->getLiga()." ".$this->getDisciplina();
    }
}
