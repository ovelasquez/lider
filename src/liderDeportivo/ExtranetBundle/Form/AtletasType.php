<?php

namespace liderDeportivo\ExtranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AtletasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cedula')
            ->add('nombres')
            ->add('apellidos')
            ->add('fechaNacimiento','birthday')
            ->add('genero')
            ->add('telefono')
            ->add('email')
            ->add('fotografia')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'liderDeportivo\ExtranetBundle\Entity\Atletas'
        ));
    }

    public function getName()
    {
        return 'liderdeportivo_extranetbundle_atletas';
    }
}
