<?php

namespace App\Controller\Admin;

use App\Entity\TypeDeRisque;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeDeRisqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeDeRisque::class;
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
