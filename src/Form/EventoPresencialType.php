<?php

namespace App\Form;

use App\Entity\Evento\EventoPresencial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventoPresencialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('imagemDeDivulgacao')
            ->add('descricao')
            ->add('dataEHoraInicio')
            ->add('dataEHoraFim')
            ->add('tipoIngresso')
            ->add('visibilidade')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EventoPresencial::class,
        ]);
    }
}
