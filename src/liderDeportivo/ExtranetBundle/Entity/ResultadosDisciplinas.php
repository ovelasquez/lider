<?php

namespace liderDeportivo\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResultadosDisciplinas
 *
 * @ORM\Table(name="resultados_disciplinas", indexes={@ORM\Index(name="disciplinas_resultados_disciplinas_fk", columns={"disciplina_id"})})
 * @ORM\Entity
 */
class ResultadosDisciplinas
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
     * @var boolean
     *
     * @ORM\Column(name="es_obligatorio", type="boolean", nullable=false)
     */
    private $esObligatorio = '0';

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
     * Set nombre
     *
     * @param string $nombre
     * @return ResultadosDisciplinas
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
     * Set esObligatorio
     *
     * @param boolean $esObligatorio
     * @return ResultadosDisciplinas
     */
    public function setEsObligatorio($esObligatorio)
    {
        $this->esObligatorio = $esObligatorio;

        return $this;
    }

    /**
     * Get esObligatorio
     *
     * @return boolean 
     */
    public function getEsObligatorio()
    {
        return $this->esObligatorio;
    }

    /**
     * Set disciplina
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Disciplinas $disciplina
     * @return ResultadosDisciplinas
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
