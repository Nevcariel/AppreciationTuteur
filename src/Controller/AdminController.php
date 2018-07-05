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


class AdminController extends Controller
{
    /**
    * @Route("/admin/dashboard", name="admin_dashboard")
    */
    public function dashboard() 
    {
        $entityManager = $this->getDoctrine()->getManager();
        $typesReponses = $entityManager->getRepository(TypeReponse::class)->findAll();

        return $this->render('admin/dashboard.html.twig', array(
          'typesReponses' => $typesReponses,
        ));
    }
    /**
    * @Route("/admin/add/typereponse", name="admin_add_typeReponse")
    */
    public function addTypeReponse() 
    {
        $entityManager = $this->getDoctrine()->getManager();
        $typeReponse = new TypeReponse();
        $typeReponseForm = $this->createForm(TypeReponseType::class, $typeReponse);
        
        $typeReponseForm->handleRequest($request);

        if($typeReponseForm->isSubmitted() && $typeReponseForm->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeReponse);
            $entityManager->flush();

            return $this->redirectToRoute('admin_add_question', array(
              'typeReponse' => $typeReponse.getId(),
            ));
        }

        return $this->render('admin/add/typeReponse.html.twig', array(
          'typeReponseForm' => $typeReponseForm,
        ));
    }
}