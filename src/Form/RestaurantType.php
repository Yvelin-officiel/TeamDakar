<?php

namespace App\Form;

use App\Entity\Restaurant;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RestaurantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du restaurant',
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse du restaurant',
                'required' => false,
            ])
            ->add('phone', TextType::class, [
                'label' => 'Numéro de téléphone',
                'required' => false,
            ])
            ->add('email', TextType::class, [
                'label' => 'Email du restaurant',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Restaurant::class,
        ]);
    }
}
