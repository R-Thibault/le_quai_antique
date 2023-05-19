<?php

namespace App\Controller\Admin;

use App\Entity\Meals;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class MealsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Meals::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('title')->setLabel('Titre'),
            TextEditorField::new('description'),
            NumberField::new('price')->setLabel('Prix'),
            TextField::new('note')->setLabel('Note'),
            AssociationField::new('combosMeal')->setLabel('Menu'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPaginatorPageSize(20)
            ->setEntityLabelInSingular('formule')
            ->setEntityLabelInPlural('Formules');
            
    }
    
}
