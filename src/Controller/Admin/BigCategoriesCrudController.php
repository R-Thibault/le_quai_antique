<?php

namespace App\Controller\Admin;

use App\Entity\BigCategories;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class BigCategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BigCategories::class;
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
            ->setEntityLabelInSingular('Catégorie')
            ->setEntityLabelInPlural('Catégories');
            
    }

   
    
}
