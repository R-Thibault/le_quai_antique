<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('title'),
            // ImageField::new('imageFile')->setFormType(VichImageType::class)->setLabel('Image'),
        ];
    }


   
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Image')
            ->setEntityLabelInPlural('Images');
            
    }
}
