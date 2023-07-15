<?php

namespace App\Controller\Admin;

use App\Entity\ListePriorite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ListePrioriteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ListePriorite::class;
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
