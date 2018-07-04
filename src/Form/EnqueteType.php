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
use App\Form\StageType;
use App\Form\TuteurType;


class EnqueteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('stage', StageType::class, array(
        ));
        $builder->add('tuteur', TuteurType::class, array(
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Enquete::class,
        ));
    }
}