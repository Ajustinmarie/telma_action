<?php

namespace App\Controller\Admin;

use App\Entity\Processus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProcessusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Processus::class;
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
