<?php

namespace App\Controller\Admin;

use App\Entity\Planning;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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
            NumberField::new('open_am')->setLabel('Ouverture midi'),
            NumberField::new('close_am')->setLabel('Fermeture midi'),
            NumberField::new('open_pm')->setLabel('Ouverture soir'),
            NumberField::new('close_pm')->setLabel('Fermeture soir'),
            
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Planning')
            ->setEntityLabelInPlural('Plannings');
            
    }
    
}
