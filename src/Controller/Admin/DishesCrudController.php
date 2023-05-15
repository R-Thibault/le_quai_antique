<?php

namespace App\Controller\Admin;


use App\Entity\Dishes;

use App\Form\DishesImagesForm;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class DishesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dishes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
            
        yield TextEditorField::new('description');
        yield NumberField::new('price')->setNumDecimals(2)->setLabel('Prix');
        yield TextField::new('title')->setLabel('Titre');
        yield CollectionField::new('image')->setEntryType(DishesImagesForm::class);
        
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Plat')
            ->setEntityLabelInPlural('Plats');
            
    }
    
}
