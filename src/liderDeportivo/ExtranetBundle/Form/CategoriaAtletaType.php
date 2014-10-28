<?php

namespace liderDeportivo\ExtranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoriaAtletaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoria')
            ->add('atleta')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'liderDeportivo\ExtranetBundle\Entity\CategoriaAtleta'
        ));
    }

    public function getName()
    {
        return 'liderdeportivo_extranetbundle_categoriaatleta';
    }
}
