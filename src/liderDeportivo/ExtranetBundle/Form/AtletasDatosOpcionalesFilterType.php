<?php

namespace liderDeportivo\ExtranetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class AtletasDatosOpcionalesFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'filter_number_range')
            ->add('imagenCedula', 'filter_text')
            ->add('tallaFranela', 'filter_text')
            ->add('tallaPantalon', 'filter_text')
            ->add('tallaPantalonCorto', 'filter_text')
            ->add('tallaZapato', 'filter_text')
            ->add('tallaGorra', 'filter_text')
            ->add('tallaChaqueta', 'filter_text')
            ->add('tallaMedias', 'filter_text')
            ->add('altura', 'filter_number_range')
            ->add('peso', 'filter_number_range')
            ->add('tipoSangre', 'filter_text')
            ->add('alergias', 'filter_text')
            ->add('contactoNombre', 'filter_text')
            ->add('contactoTelefono', 'filter_text')
        ;

        $listener = function(FormEvent $event)
        {
            // Is data empty?
            foreach ($event->getData() as $data) {
                if(is_array($data)) {
                    foreach ($data as $subData) {
                        if(!empty($subData)) return;
                    }
                }
                else {
                    if(!empty($data)) return;
                }
            }

            $event->getForm()->addError(new FormError('Filter empty'));
        };
        $builder->addEventListener(FormEvents::POST_BIND, $listener);
    }

    public function getName()
    {
        return 'liderdeportivo_extranetbundle_atletasdatosopcionalesfiltertype';
    }
}
