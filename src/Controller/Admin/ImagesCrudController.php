<?php

namespace App\Controller\Admin;

use App\Entity\Images;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

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
        
           
        yield TextField::new('title', 'Titre de l\'image');
        yield TextField::new('imageName', 'Nom de l\'image')->hideOnForm();
        yield TextField::new('imagePath', 'Chemin de l\'image')
        ->hideOnIndex();
        yield AssociationField::new('dishes', 'plats')->setRequired(false);
            yield ImageField::new('imageName', 'Image')
                    ->setBasePath('/uploads/images/')
                    ->setUploadDir('public/uploads/images/');
            
        
    }


   
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Image')
            ->setEntityLabelInPlural('Images');
            
    }
}
