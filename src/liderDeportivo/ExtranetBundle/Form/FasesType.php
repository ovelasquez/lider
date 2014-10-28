<?php

namespace liderDeportivo\ExtranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FasesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroGrupos')
            ->add('sistemaJuego')
            ->add('puntosGanado')
            ->add('puntosEmpatados')
            ->add('puntosPerdidos')
            ->add('puntosForfeit')
            ->add('totalClasificadosAuto')
            ->add('totalClasificadosManual')
            ->add('calendario')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'liderDeportivo\ExtranetBundle\Entity\Fases'
        ));
    }

    public function getName()
    {
        return 'liderdeportivo_extranetbundle_fases';
    }
}
