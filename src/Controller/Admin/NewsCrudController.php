<?php

namespace App\Controller\Admin;

use App\Entity\News;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $fields = [
            TextField::new('title'),
            TextEditorField::new('content'),
            AssociationField::new('category'),
            AssociationField::new('user')->hideOnForm(),
            ImageField::new('thumbnail')->setFormType(VichImageType::class),

            ImageField::new('thumbnail', 'thumbnail ')->setBasePath('/images/thumbnails'),
            ImageField::new('thumbnail', 'thumbnail ')->setUploadDir('/public/images/thumbnails'),

            ImageField::new('image')->setFormType(VichImageType::class),
            ImageField::new('image', 'image')->setBasePath('/images/thumbnails'),
            ImageField::new('image', 'image')->setUploadDir('/public/images/thumbnails'),

        ];
        return $fields;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, 'detail');
    }
}
