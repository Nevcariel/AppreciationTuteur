<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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


class TuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('prenom', TextType::class, array(
            'label' => 'Prénom : *',
        ));
        $builder->add('nom', TextType::class, array(
            'label' => 'Nom : *',
        ));
        $builder->add('email', EmailType::class, array(
            'label' => 'Email professionnel : *',
        ));
        $builder->add('telephone', TelType::class, array(
            'label' => 'Téléphone professionnel :',
            'required' => false
        ));
        $builder->add('fonction', TextType::class, array(
                'label' => 'Fonction : *',
        ));
        $builder->add('informatique', ChoiceType::class, array(
                'label' => 'Avez vous des compétences en informatique ? *',
                'choices' => array(
                    'oui' => true,
                    'non' => false,
                ),
                'expanded' => true,
        ));
        $builder->add('domaines', EntityType::class, array(
                'label' => 'Dans quel domaine ? *',
                'class' => Domaine::class,
                'expanded' => true,
                'multiple' => true,
        ));
        $builder->add('entreprise', EntrepriseType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Tuteur::class,
        ));
    }
}