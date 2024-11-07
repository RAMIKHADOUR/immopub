<?php

namespace App\Form;

use App\Entity\Adresses;
use App\Entity\Propertys;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdressesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero_voie')
            ->add('type_voie')
            ->add('nom_voie')
            ->add('ville')
            ->add('code_postale')
            ->add('region')
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('propertya', EntityType::class, [
                'class' => Propertys::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresses::class,
        ]);
    }
}
