<?php

namespace App\Form;

use App\Entity\Reservations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', options: [
                'label' => 'Prénom'
            ])
        
            ->add('lastname', options: [
                'label' => 'Nom'
            ])

            ->add('email', EmailType::class)

            ->add('date', DateType::class,[
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'        
                ]
                
            ])
            ->add('hour', TimeType::class,
            options: [
                'label' => 'Heure'
            ])
            ->add('nbOfPersons', options: [
                'label' => 'Nombre de personnes'
            ])
            ->add('allergies')

            ->add('comments', options: [
                'label' => 'Commentaires'
            ])
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservations::class,
        ]);
    }
}
