<?php

namespace App\Form;

use App\Entity\Filmoteca;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmotecaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                "label" => "Título"
            ])
            ->add('year', null, [
                "label" => "Año"
            ])
            ->add('sinopsis', TextareaType::class, [
                "label" => "Sinopsis"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Filmoteca::class,
        ]);
    }
}
