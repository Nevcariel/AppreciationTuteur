<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Formation;
use App\Entity\Difficulte;
use App\Entity\Domaine;
use App\Entity\Duree;
use App\Entity\Enquete;
use App\Entity\Entreprise;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Entity\Stage;
use App\Entity\Stagiaire;
use App\Entity\Tuteur;
use App\Entity\TypeReponse;


class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('stagiaire', EntityType::class, array(
            'label' => 'Le stagiaire : *',
            'class' => Stagiaire::class,
        ));
        $builder->add('duree', EntityType::class, array(
            'label' => 'Le stagiaire à réalisé un stage de : *',
            'class' => Duree::class,
        ));
        $builder->add('dateDebut', DateType::class, array(
            'label' => 'Date de début du stage : *',
            'widget' => 'text',
            'format' => 'dd-MM--yyyy',
        ));
        $builder->add('dateFin', DateType::class,
            array(
                'label' => 'Date de fin du stage : *',
                'widget' => 'text',
                'format' => 'dd-MM--yyyy',
        ));
        $builder->add('difficulte', EntityType::class, array(
            'label' => 'Quel est le niveau de diffuculté informatique de la mission/projet ? *',
            'class' => Difficulte::class,
            'expanded' => true,
        ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Stage::class,
        ));
    }
}