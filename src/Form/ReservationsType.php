<?php

namespace App\Form;

use App\Entity\Reservations;
use App\Service\PlanningService;
use App\Repository\PlanningRepository;
use App\Repository\ReservationsRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationsType extends AbstractType
{
    private PlanningRepository $planningRepository;
    private ReservationsRepository $reservationsRepository;
    private EntityManagerInterface $entityManagerInterface;

    public function __construct(PlanningRepository $planningRepository, ReservationsRepository $reservationsRepository, EntityManagerInterface $entityManagerInterface)
    {
        $this->planningRepository = $planningRepository;
        $this->reservationsRepository = $reservationsRepository;
        $this->entityManagerInterface = $entityManagerInterface;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('dateTime', DateType::class, [
            'label' => 'Date',
            'widget' => 'single_text',
            'format' => 'dd-MM-yyyy',
            'html5' => false,
            'attr' => [
                'class' => 'js-datepicker',
            ],
        ])
        ->add('amOrPm', ChoiceType::class, [
            'choices' => [
                'Midi' => 'am',
                'Soir' => 'pm',
            ],
            'expanded' => true,
            'multiple' => false,
            'label' => 'Midi ou soir',
        ])
        ->add('time', TimeType::class, [
            'label' => 'Horaire',
            'widget' => 'choice',
            'auto_initialize' => false,
            'required' => false,
            'mapped' => false,
            'minutes' => [
                0,
                15,
                30,
                45,
            ],
            'placeholder' => [
                'hour' => 'Heure',
                'minute' => 'Minute',
            ],
            'attr' => [
                'class' => 'js-timepicker',
            ],
        ])
        ->add('nbOfPersons', NumberType::class, [
            'data' => '1',
            'auto_initialize' => false,
            'mapped' => false,
            'required' => false,
            'label' => 'Nombre de personnes',
            'attr' => [
                'min' => 1,
                'max' => 10,
            ],
        ])
        ->add('lastName', TextType::class, [
            'label' => 'Nom',
            'attr' => [
                'placeholder' => 'Nom',
            ],
        ])
        ->add('firstName', TextType::class, [
            'label' => 'Prénom',
            'attr' => [
                'placeholder' => 'Prénom',
            ],
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'attr' => [
                'placeholder' => 'Email',
            ],
        ])
        ->add('Allergies', TextType::class, [
            'label' => 'Allergies',
            'required' => false,
            'attr' => [
                'placeholder' => 'Allergies',
            ],
        ])
        ->add('comments', TextareaType::class, [
            'label' => 'Commentaire',
            'required' => false,
            'attr' => [
                'placeholder' => 'Commentaire',
            ],
        ]);

    $builder->addEventListener(
        FormEvents::POST_SUBMIT,
        function (FormEvent $event) {
            $form = $event->getForm();
            $dateTime = $form->get('dateTime')->getData();
            $time = $form->get('time')->getData();
            $dateTime->setTime($time->format('H'), $time->format('i'));
        }
    );
}

       






    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservations::class,
        ]);
    }
}
