<?php

namespace App\Controller\Admin;

use App\Entity\Images;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
           
            yield TextField::new('title');
            yield NumberField::new('size');
            yield DateTimeField::new('updatedAt')
            ->setDisabled();
            yield AssociationField::new('dishes');
            yield CollectionField::new('imageFile')->setFormType(VichImageType::class)->setLabel('Image');
            //yield CollectionField::new('imageFile')->setFormType(ImagesCrudController::class)->setLabel('Images');
            
        
    }


   
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Image')
            ->setEntityLabelInPlural('Images');
            
    }
}
