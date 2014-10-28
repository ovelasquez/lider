<?php

namespace liderDeportivo\ExtranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CampeonatoDisciplinaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('campeonato')
            ->add('disciplina')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'liderDeportivo\ExtranetBundle\Entity\CampeonatoDisciplina'
        ));
    }

    public function getName()
    {
        return 'liderdeportivo_extranetbundle_campeonatodisciplina';
    }
}
