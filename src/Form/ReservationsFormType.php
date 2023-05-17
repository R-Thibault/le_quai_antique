<?php

namespace App\Form;

use App\Entity\Reservations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nbOfPersons', options: [
                'label' => 'Nombre de personnes',
            ])
            ->add('booking_date', options: [
                'label' => 'Date de réservation',
            ])
            ->add('allergies')
            ->add('comments', options: [
                'label' => 'Commentaires',
            ])
            ->add('firstname', options: [
                'label' => 'Prénom',
            ])
            ->add('lastname', options: [
                'label' => 'Nom',
            ])
            ->add('email')
            ->add('hour', options: [
                'label' => 'Heure de réservation',
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
