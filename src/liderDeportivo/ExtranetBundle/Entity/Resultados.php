<?php

namespace liderDeportivo\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resultados
 *
 * @ORM\Table(name="resultados", indexes={@ORM\Index(name="resultados_disciplinas_resultados_fk", columns={"resultado_disciplina_id"}), @ORM\Index(name="encuentro_equipo_resultados_fk", columns={"encuentro_equipo_id"})})
 * @ORM\Entity
 */
class Resultados
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
     * @var integer
     *
     * @ORM\Column(name="valor", type="integer", nullable=false)
     */
    private $valor;

    /**
     * @var \EncuentroEquipo
     *
     * @ORM\ManyToOne(targetEntity="EncuentroEquipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="encuentro_equipo_id", referencedColumnName="id")
     * })
     */
    private $encuentroEquipo;

    /**
     * @var \ResultadosDisciplinas
     *
     * @ORM\ManyToOne(targetEntity="ResultadosDisciplinas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="resultado_disciplina_id", referencedColumnName="id")
     * })
     */
    private $resultadoDisciplina;



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
     * Set valor
     *
     * @param integer $valor
     * @return Resultados
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return integer 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set encuentroEquipo
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\EncuentroEquipo $encuentroEquipo
     * @return Resultados
     */
    public function setEncuentroEquipo(\liderDeportivo\ExtranetBundle\Entity\EncuentroEquipo $encuentroEquipo = null)
    {
        $this->encuentroEquipo = $encuentroEquipo;

        return $this;
    }

    /**
     * Get encuentroEquipo
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\EncuentroEquipo 
     */
    public function getEncuentroEquipo()
    {
        return $this->encuentroEquipo;
    }

    /**
     * Set resultadoDisciplina
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\ResultadosDisciplinas $resultadoDisciplina
     * @return Resultados
     */
    public function setResultadoDisciplina(\liderDeportivo\ExtranetBundle\Entity\ResultadosDisciplinas $resultadoDisciplina = null)
    {
        $this->resultadoDisciplina = $resultadoDisciplina;

        return $this;
    }

    /**
     * Get resultadoDisciplina
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\ResultadosDisciplinas 
     */
    public function getResultadoDisciplina()
    {
        return $this->resultadoDisciplina;
    }
}
