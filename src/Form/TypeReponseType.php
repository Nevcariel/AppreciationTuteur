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


class TypeReponseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('intitule', TextType::class, array(
            'label' => 'Donnez un nom au type de question : *',
        ));
        $builder->add('choix', EntityType::class, array(
            'label' => 'Est-ce une question à choix ? *',
            'choices' => array(
                'Oui' => true,
                'Non' => false,
            ),
            'expanded' => true,
        ));
        $builder->add('multiple', EntityType::class, array(
            'label' => 'Est-ce une question à choix multiples ? *',
            'choices' => array(
                'Oui' => true,
                'Non' => false,
            ),
            'expanded' => true,
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => TypeReponse::class,
        ));
    }
}