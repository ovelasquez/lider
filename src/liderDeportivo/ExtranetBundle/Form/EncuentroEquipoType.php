<?php

namespace liderDeportivo\ExtranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EncuentroEquipoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('equipo')
            ->add('encuentro')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'liderDeportivo\ExtranetBundle\Entity\EncuentroEquipo'
        ));
    }

    public function getName()
    {
        return 'liderdeportivo_extranetbundle_encuentroequipo';
    }
}
