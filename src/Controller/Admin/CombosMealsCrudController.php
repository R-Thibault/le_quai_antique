<?php

namespace App\Controller\Admin;

use App\Entity\CombosMeals;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CombosMealsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CombosMeals::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('title')->setLabel('Titre'),
            
            
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPaginatorPageSize(15)
            ->setEntityLabelInSingular('Menu')
            ->setEntityLabelInPlural('Menus');
            
    }
   
}
