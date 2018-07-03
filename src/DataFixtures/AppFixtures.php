<?php

namespace App\DataFixtures;

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
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $formations = ["2eme année DUT Info", "AS Info", "LP RGI"];
      $domaines = ["Dev", "Infra", "Réseau", "Polyvalent", "Autre"];
      $stagiairesNom = ["Truc", "Machin", "Chose"];
      $stagiairesPnom = ["Alex", "Toto", "Léo"];
      $tuteursNom = ["Jean", "Jacques", "André"];
      $tuteursPnom = ["Bidule", "Chouette", "Voila"];
      $tuteurFonction = "Developpeur";
      $tuteurMail = "example@gmail.com";
      $entreprisesNom = ["Leclerc", "SuperU", "Auchan"];
      $entrepriseVille = "Amiens";
      $entrepriseCP = "80000";
      $typesReponseIntitule = ["Saisie", "Choix", "Choix multiple"];
      $dureesIntitule = ["9- semaines", "10/12 semaines", "12+ semaines"];
      $difficulteesIntitule = ["Facile", "Moyen", "Difficile"];
      $date = new \DateTime();
      $questionsTheme = ["Ponctualite", "Prise Initiatives", "Sèrieux"];

      for ($i = 0; $i < 3; $i++) 
      {
        $formation = new Formation();
        $domaine = new Domaine();
        $stagiaire = new Stagiaire();
        $tuteur = new Tuteur();
        $difficulte = new Difficulte();
        $duree = new Duree();
        $enquete = new Enquete();
        $entreprise = new Entreprise();
        $question = new Question();
        $stage = new Stage();
        $typeReponse = new TypeReponse();

        $entreprise->setNom($entreprisesNom[$i]);
        $entreprise->setVille($entrepriseVille);
        $entreprise->setCodePostal($entrepriseCP);

        $tuteur->setNom($tuteursNom[$i]);
        $tuteur->setPrenom($tuteursPnom[$i]);
        $tuteur->setEmail($tuteurMail);
        $tuteur->setFonction($tuteurFonction);
        $tuteur->setInformatique(true);
        $entreprise->addTuteur($tuteur);

        $difficulte->setIntitule($difficulteesIntitule[$i]);
        $duree->setIntitule($dureesIntitule[$i]);

        $stage->setDateDebut($date);
        $stage->setDateFin($date);
        $stage->setDuree($duree);
        $stage->setDifficulte($difficulte);
        $tuteur->addStage($stage);

        $formation->setIntitule($formations[$i]);
        $stagiaire->setNom($stagiairesNom[$i]);
        $stagiaire->setPrenom($stagiairesPnom[$i]);
        $formation->addStagiaire($stagiaire);
        $stagiaire->setStage($stage);
        $stage->setStagiaire($stagiaire);

        $domaine->setIntitule($domaines[$i]);
        $domaine->addTuteur($tuteur);

        $enquete->setStage($stage);
        $enquete->setTuteur($tuteur);

        $typeReponse->setIntitule($typesReponseIntitule[$i]);
        $typeReponse->setChoix(true);
        $typeReponse->setMultiple(false);

        $question->setTheme($questionsTheme[$i]);
        $question->setContenu($questionsTheme[$i]);
        $typeReponse->addQuestion($question);

        $manager->persist($difficulte);
        $manager->persist($domaine);
        $manager->persist($duree);
        $manager->persist($enquete);
        $manager->persist($entreprise);
        $manager->persist($formation);
        $manager->persist($question);
        $manager->persist($stage);
        $manager->persist($stagiaire);
        $manager->persist($tuteur);
        $manager->persist($typeReponse);
      }

      $manager->flush();
    }
}