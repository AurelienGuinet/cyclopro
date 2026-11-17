<?php

namespace App\Form;

use App\Entity\Reparation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extensions\Core\Type\SubmitType;

class AjoutReparationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', TextType::class, [])
            ->add('description', TextAreaType::class, [])
            ->add('dateDepot', SubmitType::class, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reparation::class,
        ]);
    }
}
