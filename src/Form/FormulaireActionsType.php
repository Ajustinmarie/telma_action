<?php

namespace App\Form;

use App\Entity\Actions;
use App\Entity\ListePriorite;
use App\Entity\Processus;
use App\Entity\Status;
use App\Entity\TypeAudit;
use App\Entity\TypeDeRisque;
use App\Entity\ZoneAuditee;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\User;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\File;

class FormulaireActionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Type_audit', EntityType::class,[             
             'class'=>TypeAudit::class,
            ])      

            ->add('Date_de_laudit', DateType::class,[ 
                'data' => new DateTime(), // Date par défaut, ici la date et l'heure actuelles
                // Autres options du champ...                
           ])   
        
            

            ->add('Zone_auditee', EntityType::class,[             
                'class'=>ZoneAuditee::class,
               
             ])

            ->add('Remarques_commentaires', TextareaType::class, [
                'label' => 'Remarques / commentaires / constats d\'écarts',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Veuillez rentrer un commentaire'
                ]
            ])


            ->add('Pilote_de_laction', EntityType::class,[             
                'class'=>User::class,
             ])
            ->add('cause_racine')
            ->add('action_curatif')
            ->add('action_correctif')
            ->add('Priorite', EntityType::class,[             
                  'class'=>ListePriorite::class,
              ])
            ->add('Processus', EntityType::class,[             
                'class'=>Processus::class,
            ])
            ->add('delais',DateType::class,[
                'data' => new DateTime(), // Date par défaut, ici la date et l'heure actuelles
                // Autres options du champ...                                
              ])

            ->add('date_de_cloture', DateType::class,[
                'data' => new DateTime(), // Date par défaut, ici la date et l'heure actuelles
                // Autres options du champ...
            ])

            
            ->add('Status', EntityType::class,[             
                'class'=>Status::class,
             ])
            ->add('Etat_avancement')
            ->add('case_diffusion')



         ->add('Liste_diffusion', EntityType::class, [
            'label' => 'Liste de diffusion',
            'required' => true,
            'class' => User::class,
            'multiple' => true,
            'expanded' => true
        ])


            ->add('illustration', Filetype::class,[
                'label' => 'Image (fichier image)',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image',
                    ])
                ],
                'data_class' => null,
            ])


         ->add('Type_de_risques', EntityType::class,[             
            'class'=>TypeDeRisque::class,
     ])

          //  ->add('Id_creation')

            ->add('submit', SubmitType::class,[
            'label'=>'Enregistrer l\'action',
            'attr'=>[
                'class'=>'btn-block btn-info'
            ]
        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actions::class,
        ]);
    }
}
