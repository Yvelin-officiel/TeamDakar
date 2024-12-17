<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Restaurant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// src/Form/MenuType.php

namespace App\Form;

use App\Entity\Menu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $restaurants = $options['restaurants']; // Liste des restaurants passée par le contrôleur

        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre du menu',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
            ])
            ->add('logo_url', TextType::class, [
                'label' => 'URL du logo',
                'required' => false,
            ])
            ->add('primary_color', ColorType::class, [
                'label' => 'Couleur principale',
            ])
            ->add('secondary_color', ColorType::class, [
                'label' => 'Couleur secondaire',
            ])
            ->add('font_family', TextType::class, [
                'label' => 'Famille de police',
            ])
            ->add('font_size', TextType::class, [
                'label' => 'Taille de police',
            ])
            ->add('restaurant', ChoiceType::class, [
                'label' => 'Choisissez un restaurant',
                'choices' => array_map(function ($restaurant) {
                    return $restaurant['name'];
                }, $restaurants),
                'data' => null,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
            'restaurants' => [], // Ajouter un tableau d'options pour les restaurants
        ]);
    }
}

