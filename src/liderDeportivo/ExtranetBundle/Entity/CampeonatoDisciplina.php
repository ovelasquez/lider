<?php

namespace liderDeportivo\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampeonatoDisciplina
 *
 * @ORM\Table(name="campeonato_disciplina", indexes={@ORM\Index(name="disciplinas_campeonato_disciplina_fk", columns={"disciplina_id"}), @ORM\Index(name="campeonatos_campeonato_disciplina_fk", columns={"campeonato_id"})})
 * @ORM\Entity
 */
class CampeonatoDisciplina
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
     * @var \Campeonatos
     *
     * @ORM\ManyToOne(targetEntity="Campeonatos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campeonato_id", referencedColumnName="id")
     * })
     */
    private $campeonato;

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
     * Set campeonato
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Campeonatos $campeonato
     * @return CampeonatoDisciplina
     */
    public function setCampeonato(\liderDeportivo\ExtranetBundle\Entity\Campeonatos $campeonato = null)
    {
        $this->campeonato = $campeonato;

        return $this;
    }

    /**
     * Get campeonato
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\Campeonatos 
     */
    public function getCampeonato()
    {
        return $this->campeonato;
    }

    /**
     * Set disciplina
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Disciplinas $disciplina
     * @return CampeonatoDisciplina
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
}
