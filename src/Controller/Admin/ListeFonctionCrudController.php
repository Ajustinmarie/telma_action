<?php

namespace App\Controller\Admin;

use App\Entity\ListeFonction;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ListeFonctionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ListeFonction::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
