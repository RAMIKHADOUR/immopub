<?php

namespace App\Form;

use App\Entity\Annonces;
use App\Entity\Categorys;
use App\Entity\Propertys;
use App\Entity\Typesproperty;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertysType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('etat')
            ->add('description')
            ->add('surface')
            ->add('prix')
            ->add('chambres')
            ->add('salle_bains')
            ->add('etages')
            ->add('nomre_etages')
            ->add('internet')
            ->add('garage')
            ->add('piscine')
            ->add('camera')
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ])
           
            ->add('categorys', EntityType::class, [
                'class' => Categorys::class,
                'choice_label' => 'id',
            ])
            ->add('typesproperty', EntityType::class, [
                'class' => Typesproperty::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Propertys::class,
        ]);
    }
}
