<?php

namespace liderDeportivo\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EncuentroEquipo
 *
 * @ORM\Table(name="encuentro_equipo", indexes={@ORM\Index(name="encuentros_encuentro_equipo_fk", columns={"encuentro_id"}), @ORM\Index(name="equipos_encuentro_equipo_fk", columns={"equipo_id"})})
 * @ORM\Entity
 */
class EncuentroEquipo
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
     * @var \Equipos
     *
     * @ORM\ManyToOne(targetEntity="Equipos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="equipo_id", referencedColumnName="id")
     * })
     */
    private $equipo;

    /**
     * @var \Encuentros
     *
     * @ORM\ManyToOne(targetEntity="Encuentros")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="encuentro_id", referencedColumnName="id")
     * })
     */
    private $encuentro;



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
     * Set equipo
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Equipos $equipo
     * @return EncuentroEquipo
     */
    public function setEquipo(\liderDeportivo\ExtranetBundle\Entity\Equipos $equipo = null)
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get equipo
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\Equipos 
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set encuentro
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Encuentros $encuentro
     * @return EncuentroEquipo
     */
    public function setEncuentro(\liderDeportivo\ExtranetBundle\Entity\Encuentros $encuentro = null)
    {
        $this->encuentro = $encuentro;

        return $this;
    }

    /**
     * Get encuentro
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\Encuentros 
     */
    public function getEncuentro()
    {
        return $this->encuentro;
    }
}
