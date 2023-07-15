<?php

// src/Form/FilterFormType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

// 1. Import the Entity Class of Categories
use App\Entity\Categories;

class FilterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // 2. Create the Form with your fields, in this casem just a single field
        $builder
            ->add('categories', EntityType::class, [
                // Look for choices from the Categories entity
                'class' => Categories::class,
                // Display as checkboxes
                'expanded' => true,
                'multiple' => true,
                // The property of the Categories entity that will show up on the select (or checkboxes)
                'choice_label' => 'name' 
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}




/*
array:1 [▼
  0 => App\Entity\Categories {#822 ▼
    -id: "1"
    -nombre: "Prestadores de Servicios de Salud"
    -slug: "prestadores-de-servicios-de-salud"
  },
  1 => App\Entity\Categories {#823 ▼
    -id: "2"
    -nombre: "Bancos de sangre"
    -slug: "bancos-de-sangre"
  }
]



array:2 [▼
  "categories" => array:1 [▼
    0 => "1",
    1 => "2",
  ]
  "_token" => "ZrHIxYstXtq86hljZ8C_nRpMlQhcXIMoGSVSij3gGwY"
]
*/