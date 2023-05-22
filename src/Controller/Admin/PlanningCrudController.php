<?php

namespace App\Controller\Admin;

use App\Entity\Planning;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class PlanningCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Planning::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
             TextField::new('day')->setLabel('Jour'),
             TextField::new('openAm')->setLabel('Ouverture midi'),
              TextField::new('closeAm')->setLabel('Fermeture midi'),
              TextField::new('openPm')->setLabel('Ouverture soir'),
               TextField::new('closePm')->setLabel('Fermeture soir'),
            BooleanField::new('isClosedAm')->setLabel('Fermeture le midi')->setFormType(CheckboxType::class),
            BooleanField::new('isClosedPm')->setLabel('Fermeture le soir')->setFormType(CheckboxType::class),
                                                
                                                        



        ];
    }
    
}
