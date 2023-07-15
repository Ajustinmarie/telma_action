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
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\File;

class FormModificationActionsType extends AbstractType
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
          $this->entityManager = $entityManager;
    }
     
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
            
       $champ_id_createur_de_actions=$options['idCreateurDeActions']; 
       $champ=$options['actions_recherches'][0];
       $champ2=$options['actions_zoneaudit'];    

  // dd($champ_id_createur_de_actions);

       /* liste deroulante Pilote_action */
       $id_pilote_de_laction=$options['id_pilote_de_laction'];
       $defaultZone3=$this->entityManager->getReference(User::class,$id_pilote_de_laction);

   //   dd($id_pilote_de_laction);
       
       /*liste deroulante Zone_auditee */
       $id_zone_audit=$options['id_zoneauditee'];
       $defaultZone= $this->entityManager->getReference(ZoneAuditee::class,$id_zone_audit);

        /*liste deroulante Type_audit */
        $id_type_audit=$options['id_type_audit'];
        $defaultZone2= $this->entityManager->getReference(TypeAudit::class,$id_type_audit);
        
        
         /* liste deroulante priorite */
         $id_priorite=$options['id_priorite'];
         $defaultZone4= $this->entityManager->getReference(ListePriorite::class,$id_priorite);
         
            /* liste deroulante processus */
         $id_processus=$options['id_processus'];  
         $defaultZone5= $this->entityManager->getReference(Processus::class,$id_processus);

           /* liste deroulante status */
           $id_status=$options['id_status'];  
           $defaultZone6= $this->entityManager->getReference(Status::class,$id_status);


             /* liste deroulante risques */
             $id_risques=$options['id_risques'];  
             $defaultZone7= $this->entityManager->getReference(TypeDeRisque::class,$id_risques);

           //  dd($id_risques);
        //   dd($champ['illustration']);
        
      
       $builder
        ->add('Type_audit', EntityType::class,[             
         'class'=>TypeAudit::class,
       //  'class'=>ZoneAuditee::class,
         'data'=>$defaultZone2,
         
        ])      

        ->add('Date_de_laudit', DateType::class,[ 
            'data' => new DateTime($champ['date_de_laudit']), // Date par défaut, ici la date et l'heure actuelles
            // Autres options du champ...                
       ])           
          
               
        ->add('Zone_auditee', EntityType::class,[             
            'class'=>ZoneAuditee::class, 
            'data'=>$defaultZone,
          //  'placeholder'=>$champ['zone_auditee'],
         // 'data'=> $this->entityManager->getReference(ZoneAuditee::class,1),
         ])


        ->add('Remarques_commentaires', TextareaType::class, [
            'label' => 'Remarques / commentaires / constats d\'écarts',
            'data'=>$champ['remarques_commentaires'] ?? null,
            'required' => true,
            'attr' => [
                'placeholder' => 'Veuillez rentrer un commentaire',
            ]
        ])


        ->add('Pilote_de_laction', EntityType::class,[             
            'class'=>User::class,
             'data'=>$defaultZone3
         ])

         
        ->add('cause_racine', TextareaType::class,[
             'data'=>$champ['cause_racine'] ?? null,
        ])

        ->add('action_curatif',TextareaType::class,[
            'data'=>$champ['action_curatif'] ?? null,
        ])


        ->add('action_correctif', TextareaType::class,[
            'data'=>$champ['action_correctif'] ?? null,
        ])


        ->add('Priorite', EntityType::class,[             
              'class'=>ListePriorite::class,
               'data'=>$defaultZone4,
          ])

        ->add('Processus', EntityType::class,[             
            'class'=>Processus::class,
            'data'=>$defaultZone5,

        ])
        ->add('delais',DateType::class,[
            'data' => new DateTime($champ['delais']), // Date par défaut, ici la date et l'heure actuelles
            // Autres options du champ...                                
          ])

        ->add('date_de_cloture', DateType::class,[
            'data' => new DateTime($champ['date_de_cloture']), // Date par défaut, ici la date et l'heure actuelles
            // Autres options du champ...
            
        ])

        
        ->add('Status', EntityType::class,[             
            'class'=>Status::class,
            'data'=>$defaultZone6, 
         ])


        ->add('Etat_avancement',TextareaType::class,[
            'data'=>$champ['etat_avancement'] ?? null,
           
        ])


        ->add('Type_de_risques', EntityType::class,[             
            'class'=>TypeDeRisque::class,
          //  'placeholder'=>$champ['type_de_risques'],
             'data'=>$defaultZone7
     ])


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
           // 'data' =>'1d32c829e40e89235f2c398720bd26f3.jpg'
          'empty_data' => 'images/' . $champ['illustration']

         //  'empty_data' => 'images/1d32c829e40e89235f2c398720bd26f3.jpg'
        ])


      

        ->add('id_createur_action',HiddenType::class,[
            'data'=>$champ_id_createur_de_actions, 
            'mapped'=>false,
        ])




      //  ->add('Id_creation')

        ->add('submit', SubmitType::class,[
        'label'=>'Mise à jour de l\'action',
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
            'actions_recherches' => [], 
            'actions_zoneaudit'=>[],
            'act'=>[],
            'id_zoneauditee'=>[],
            'id_type_audit'=>[],
            'id_pilote_de_laction'=>[],
            'id_priorite'=>[],
            'id_processus'=>[],
             'id_status'=>[],
             'id_risques'=>[],
             'idCreateurDeActions'=>[]
        ]);


      


    }
}
