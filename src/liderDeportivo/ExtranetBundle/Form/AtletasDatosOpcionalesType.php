<?php

namespace liderDeportivo\ExtranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AtletasDatosOpcionalesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imagenCedula')
            ->add('tallaFranela')
            ->add('tallaPantalon')
            ->add('tallaPantalonCorto')
            ->add('tallaZapato')
            ->add('tallaGorra')
            ->add('tallaChaqueta')
            ->add('tallaMedias')
            ->add('altura')
            ->add('peso')
            ->add('tipoSangre')
            ->add('alergias')
            ->add('contactoNombre')
            ->add('contactoTelefono')
            ->add('atleta')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'liderDeportivo\ExtranetBundle\Entity\AtletasDatosOpcionales'
        ));
    }

    public function getName()
    {
        return 'liderdeportivo_extranetbundle_atletasdatosopcionales';
    }
}
