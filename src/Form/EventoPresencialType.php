<?php

namespace App\Form;

use App\DTO\FormCriadorDeEventoPresencialInput;
use App\Entity\Evento\EnderecoEventoPresencial;
use App\Entity\Evento\EventoPresencial;
use App\Enum\TipoIngresso;
use App\Enum\Visibilidade;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventoPresencialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomeDoLocal', TextType::class,['row_attr' => ['class' => 'form-input']])
            ->add('cep', TextType::class,['row_attr' => ['class' => 'form-input']])
            ->add('rua', TextType::class,['row_attr' => ['class' => 'form-input']])
            ->add('complemento', TextType::class,['row_attr' => ['class' => 'form-input']])
            ->add('bairro', TextType::class,['row_attr' => ['class' => 'form-input']])
            ->add('cidade', TextType::class,['row_attr' => ['class' => 'form-input']])
            ->add('estado', TextType::class,['row_attr' => ['class' => 'form-input']])
            ->add('nome', TextType::class,['row_attr' => ['class' => 'form-input']])
            ->add('imagemDeDivulgacao', FileType::class)
            ->add('descricao', TextType::class,['row_attr' => ['class' => 'form-input']])
            ->add('dataEHoraInicio', DateType::class,['row_attr' => ['class' => 'form-input']])
            ->add('dataEHoraFim', DateType::class, ['row_attr' => ['class' => 'form-input']])
            ->add('tipoIngresso', ChoiceType::class,[
                'choices' => [
                    TipoIngresso::Gratuito->name => TipoIngresso::Gratuito->name,
                    TipoIngresso::Pago->name => TipoIngresso::Pago->name
                ],
                'row_attr' => ['class' => 'form-input']])
            ->add('visibilidade', ChoiceType::class,[
                'choices' => [
                    Visibilidade::Publica->name => Visibilidade::Publica->name,
                    Visibilidade::Privada->name => Visibilidade::Privada->name
                ],
                'row_attr' => ['class' => 'form-input'],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FormCriadorDeEventoPresencialInput::class
        ]);
    }
}
