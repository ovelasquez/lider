<?php

namespace liderDeportivo\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AtletasDatosOpcionales
 *
 * @ORM\Table(name="atletas_datos_opcionales", indexes={@ORM\Index(name="atletas_atletas_datos_opcionales_fk", columns={"atleta_id"})})
 * @ORM\Entity
 */
class AtletasDatosOpcionales
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
     * @ORM\Column(name="imagen_cedula", type="string", length=255, nullable=false)
     */
    private $imagenCedula;

    /**
     * @var string
     *
     * @ORM\Column(name="talla_franela", type="string", length=10, nullable=false)
     */
    private $tallaFranela;

    /**
     * @var string
     *
     * @ORM\Column(name="talla_pantalon", type="string", length=10, nullable=false)
     */
    private $tallaPantalon;

    /**
     * @var string
     *
     * @ORM\Column(name="talla_pantalon_corto", type="string", length=10, nullable=false)
     */
    private $tallaPantalonCorto;

    /**
     * @var string
     *
     * @ORM\Column(name="talla_zapato", type="string", length=10, nullable=false)
     */
    private $tallaZapato;

    /**
     * @var string
     *
     * @ORM\Column(name="talla_gorra", type="string", length=10, nullable=false)
     */
    private $tallaGorra;

    /**
     * @var string
     *
     * @ORM\Column(name="talla_chaqueta", type="string", length=10, nullable=false)
     */
    private $tallaChaqueta;

    /**
     * @var string
     *
     * @ORM\Column(name="talla_medias", type="string", length=10, nullable=false)
     */
    private $tallaMedias;

    /**
     * @var string
     *
     * @ORM\Column(name="altura", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $altura;

    /**
     * @var string
     *
     * @ORM\Column(name="peso", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $peso;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_sangre", type="string", length=10, nullable=false)
     */
    private $tipoSangre;

    /**
     * @var string
     *
     * @ORM\Column(name="alergias", type="text", nullable=false)
     */
    private $alergias;

    /**
     * @var string
     *
     * @ORM\Column(name="contacto_nombre", type="string", length=255, nullable=false)
     */
    private $contactoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="contacto_telefono", type="string", length=255, nullable=false)
     */
    private $contactoTelefono;

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
     * Set imagenCedula
     *
     * @param string $imagenCedula
     * @return AtletasDatosOpcionales
     */
    public function setImagenCedula($imagenCedula)
    {
        $this->imagenCedula = $imagenCedula;

        return $this;
    }

    /**
     * Get imagenCedula
     *
     * @return string 
     */
    public function getImagenCedula()
    {
        return $this->imagenCedula;
    }

    /**
     * Set tallaFranela
     *
     * @param string $tallaFranela
     * @return AtletasDatosOpcionales
     */
    public function setTallaFranela($tallaFranela)
    {
        $this->tallaFranela = $tallaFranela;

        return $this;
    }

    /**
     * Get tallaFranela
     *
     * @return string 
     */
    public function getTallaFranela()
    {
        return $this->tallaFranela;
    }

    /**
     * Set tallaPantalon
     *
     * @param string $tallaPantalon
     * @return AtletasDatosOpcionales
     */
    public function setTallaPantalon($tallaPantalon)
    {
        $this->tallaPantalon = $tallaPantalon;

        return $this;
    }

    /**
     * Get tallaPantalon
     *
     * @return string 
     */
    public function getTallaPantalon()
    {
        return $this->tallaPantalon;
    }

    /**
     * Set tallaPantalonCorto
     *
     * @param string $tallaPantalonCorto
     * @return AtletasDatosOpcionales
     */
    public function setTallaPantalonCorto($tallaPantalonCorto)
    {
        $this->tallaPantalonCorto = $tallaPantalonCorto;

        return $this;
    }

    /**
     * Get tallaPantalonCorto
     *
     * @return string 
     */
    public function getTallaPantalonCorto()
    {
        return $this->tallaPantalonCorto;
    }

    /**
     * Set tallaZapato
     *
     * @param string $tallaZapato
     * @return AtletasDatosOpcionales
     */
    public function setTallaZapato($tallaZapato)
    {
        $this->tallaZapato = $tallaZapato;

        return $this;
    }

    /**
     * Get tallaZapato
     *
     * @return string 
     */
    public function getTallaZapato()
    {
        return $this->tallaZapato;
    }

    /**
     * Set tallaGorra
     *
     * @param string $tallaGorra
     * @return AtletasDatosOpcionales
     */
    public function setTallaGorra($tallaGorra)
    {
        $this->tallaGorra = $tallaGorra;

        return $this;
    }

    /**
     * Get tallaGorra
     *
     * @return string 
     */
    public function getTallaGorra()
    {
        return $this->tallaGorra;
    }

    /**
     * Set tallaChaqueta
     *
     * @param string $tallaChaqueta
     * @return AtletasDatosOpcionales
     */
    public function setTallaChaqueta($tallaChaqueta)
    {
        $this->tallaChaqueta = $tallaChaqueta;

        return $this;
    }

    /**
     * Get tallaChaqueta
     *
     * @return string 
     */
    public function getTallaChaqueta()
    {
        return $this->tallaChaqueta;
    }

    /**
     * Set tallaMedias
     *
     * @param string $tallaMedias
     * @return AtletasDatosOpcionales
     */
    public function setTallaMedias($tallaMedias)
    {
        $this->tallaMedias = $tallaMedias;

        return $this;
    }

    /**
     * Get tallaMedias
     *
     * @return string 
     */
    public function getTallaMedias()
    {
        return $this->tallaMedias;
    }

    /**
     * Set altura
     *
     * @param string $altura
     * @return AtletasDatosOpcionales
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    /**
     * Get altura
     *
     * @return string 
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set peso
     *
     * @param string $peso
     * @return AtletasDatosOpcionales
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return string 
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set tipoSangre
     *
     * @param string $tipoSangre
     * @return AtletasDatosOpcionales
     */
    public function setTipoSangre($tipoSangre)
    {
        $this->tipoSangre = $tipoSangre;

        return $this;
    }

    /**
     * Get tipoSangre
     *
     * @return string 
     */
    public function getTipoSangre()
    {
        return $this->tipoSangre;
    }

    /**
     * Set alergias
     *
     * @param string $alergias
     * @return AtletasDatosOpcionales
     */
    public function setAlergias($alergias)
    {
        $this->alergias = $alergias;

        return $this;
    }

    /**
     * Get alergias
     *
     * @return string 
     */
    public function getAlergias()
    {
        return $this->alergias;
    }

    /**
     * Set contactoNombre
     *
     * @param string $contactoNombre
     * @return AtletasDatosOpcionales
     */
    public function setContactoNombre($contactoNombre)
    {
        $this->contactoNombre = $contactoNombre;

        return $this;
    }

    /**
     * Get contactoNombre
     *
     * @return string 
     */
    public function getContactoNombre()
    {
        return $this->contactoNombre;
    }

    /**
     * Set contactoTelefono
     *
     * @param string $contactoTelefono
     * @return AtletasDatosOpcionales
     */
    public function setContactoTelefono($contactoTelefono)
    {
        $this->contactoTelefono = $contactoTelefono;

        return $this;
    }

    /**
     * Get contactoTelefono
     *
     * @return string 
     */
    public function getContactoTelefono()
    {
        return $this->contactoTelefono;
    }

    /**
     * Set atleta
     *
     * @param \liderDeportivo\ExtranetBundle\Entity\Atletas $atleta
     * @return AtletasDatosOpcionales
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
