<?php

namespace App\Controller\Admin;

use App\Entity\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actions::class;
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
