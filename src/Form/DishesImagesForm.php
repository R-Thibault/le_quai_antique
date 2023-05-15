<?php

namespace App\Form;

use App\Entity\Images;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DishesImagesForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options):void
  {
    $builder
      ->add('imageFile', VichImageType::class, [
        'label' => 'Image',
        'allow-add' => true
      ])
    ;
  }
  
  public function configureOptions(OptionsResolver $resolver):void
  {
    $resolver->setDefaults([
      'data_class' => Images::class,
    ]);
  }

  
}