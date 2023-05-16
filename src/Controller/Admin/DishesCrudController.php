<?php

namespace App\Controller\Admin;


use App\Entity\Dishes;

use App\Form\DishesImagesForm;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class DishesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dishes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        
        yield TextField::new('title')->setLabel('Titre');
        yield TextEditorField::new('description');
        yield NumberField::new('price')->setNumDecimals(2)->setLabel('Prix');
        yield AssociationField::new('category')->setLabel('Catégorie')->setRequired(true);
        yield AssociationField::new('image')->setLabel('Image')->setRequired(true);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Plat')
            ->setEntityLabelInPlural('Plats');
            
    }
    
}
