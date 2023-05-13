<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Faker\Core\Number;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            
            TextField::new('email'),
            TextField::new('lastname')->setLabel('Nom'),
            TextField::new('firstname')->setLabel('Prénom'),
            NumberField::new('NbOfPersons')->setLabel('Nombres de personnes'),
            TextField::new('Allergies')->setLabel('Allérgies'),
            
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs');
            
    }

    
}
