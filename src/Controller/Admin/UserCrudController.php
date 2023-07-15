<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;


class UserCrudController extends AbstractCrudController
{

    public $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
         /*   IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'), */
          
            TextField::new('Name', 'Nom'),
            TextField::new('Firstname', 'Prenom'),
            TextField::new('Fonction', 'Fonction'),
            EmailField::new('Email'),
            BooleanField::new('AdminActions', 'Administrateur'),
            $password = TextField::new('password', 'Mot de passe (crypté BDD, algo : bcrypt)')
            ->setFormType(PasswordType::class)      
            ->onlyOnForms(),


        /*  TextField::new('Emai', 'Prenom'),
            AssociationField::new('allerg','Types d\'Allergenes du patient'),

            EmailField::new('email'),
            $password = TextField::new('password', 'Mot de passe (crypté BDD, algo : bcrypt)')
            ->setFormType(PasswordType::class)      
            ->onlyOnForms(),
            AssociationField::new('allerg','Types d\'Allergenes du patient'),
            AssociationField::new('Regimes','Types de regimes spécifique au patient'), */
        ];
    }


    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->encodePassword($entityInstance);
        parent::persistEntity($entityManager, $entityInstance);
    }


    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->encodePassword($entityInstance);
        parent::updateEntity($entityManager, $entityInstance);
    }


    private function encodePassword(User $user)
    {
        if ($user->getPassword() !== null) {
            //$user->setSalt(base_convert(bin2hex(random_bytes(20)), 16, 36));
            // This is where you use UserPasswordEncoderInterface
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));
        }
    }

    
}
