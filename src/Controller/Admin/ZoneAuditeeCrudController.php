<?php

namespace App\Controller\Admin;

use App\Entity\ZoneAuditee;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ZoneAuditeeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ZoneAuditee::class;
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
