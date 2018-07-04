<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
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
use App\Form\EnqueteType;
use App\Form\StageType;
use App\Form\QuestionnaireType;


class EnqueteController extends Controller
{
    /**
    * @Route("/", name="app_homepage")
    */
    public function index() 
    {
        return $this->redirectToRoute('enquete_saisie_stagiaire');
    }

    /**
    * @Route("/informations", name="enquete_saisie_stagiaire")
    */
    public function saisieStagiaire(Request $request) 
    {
        $entityManager = $this->getDoctrine()->getManager();
        $enquete = new Enquete();
        $questions = $entityManager->getRepository(Question::class)->findAll();
        $enqueteForm = $this->createForm(EnqueteType::class, $enquete);

        foreach($questions as $question)
        {
            $reponse = new Reponse();
            $question->addReponse($reponse);
        }
        $enqueteForm->handleRequest($request);

        

        if($enqueteForm->isSubmitted() && $enqueteForm->isValid())
        {

        }

        return $this->render('enquete/enquete.html.twig', array(
            'enqueteForm' => $enqueteForm->createView(),
        ));
    }

    /**
    * @Route("/questionnaire/{tuteur}", name="enquete_saisie_reponses")
    */
    public function saisieQuestionnaire($tuteur, Request $request) 
    {
        $entityManager = $this->getDoctrine()->getManager();
        $tut = $entityManager->getRepository(Tuteur::class)->find($tuteur);
        $questions = $entityManager->getRepository(Question::class)->findAll();
        foreach($questions as $question)
        {
            $reponse = new Reponse();
            $tut->addReponse($reponse);
            $entityManager->persist($tut);
        }
        $questionnaireForm = $this->createForm(QuestionnaireType::class, $tut);
        $questionnaireForm->handleRequest($request);

        

        if($questionnaireForm->isSubmitted() && $questionnaireForm->isValid())
        {

        }

        return $this->render('enquete/questionnaire.html.twig', array(
            'questionnaireForm' => $questionnaireForm->createView(),
            'questions' => $questions,
        ));
    }

}