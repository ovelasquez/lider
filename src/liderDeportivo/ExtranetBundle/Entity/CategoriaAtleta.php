<?php

namespace liderDeportivo\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriaAtleta
 *
 * @ORM\Table(name="categoria_atleta", indexes={@ORM\Index(name="atletas_equipo_atleta_fk", columns={"atleta_id"}), @ORM\Index(name="equipos_equipo_atleta_fk", columns={"categoria_id"})})
 * @ORM\Entity
 */
class CategoriaAtleta
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
     * @var \Categorias
     *
     * @ORM\ManyToOne(targetEntity="Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     * })
     */
    private $categoria;

    /**
     * @var \Atletas
     *
     * @ORM\ManyToOne(targetEntity="Atletas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="atleta_id", referencedColumnName="id")
     * })
     */
    private $atleta;



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
     * Set categoria
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Categorias $categoria
     * @return CategoriaAtleta
     */
    public function setCategoria(\liderDeportivo\ExtranetBundle\Entity\Categorias $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\Categorias 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set atleta
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Atletas $atleta
     * @return CategoriaAtleta
     */
    public function setAtleta(\liderDeportivo\ExtranetBundle\Entity\Atletas $atleta = null)
    {
        $this->atleta = $atleta;

        return $this;
    }

    /**
     * Get atleta
     *
     * @return \liderDeportivo\ExtranetBundle\Entity\Atletas 
     */
    public function getAtleta()
    {
        return $this->atleta;
    }
}
