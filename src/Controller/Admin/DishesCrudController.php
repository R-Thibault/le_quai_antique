<?php

namespace App\Controller\Admin;

use App\DataFixtures\ImagesFixture;
use App\Entity\Dishes;
use App\Entity\Images;
use App\Controller\Admin\ImagesCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\PriceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField as FieldCollectionField;
use Symfony\Component\Form\Extension\Core\Type\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Faker\Core\Number;

class DishesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dishes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('title')->setLabel('Titre'),
            TextEditorField::new('description'),
            NumberField::new('price')->setNumDecimals(2)->setLabel('Prix'),
            // FieldCollectionField::new('images')->setEntryType(ImagesCrudController::class)->setLabel('Images'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Plat')
            ->setEntityLabelInPlural('Plats');
            
    }
    
}
