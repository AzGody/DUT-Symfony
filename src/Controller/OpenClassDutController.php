<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;

class OpenClassDutController extends AbstractController
{
    public function index(): Response
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::Class);
        $listeStage = $repositoryStage->findAll();
        return $this->render('open_class_dut/index.html.twig', [
            'listeStage' => $listeStage,
        ]);
    }

    public function entreprises(): Response
    {
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::Class);
        $listeEntreprise = $repositoryEntreprise->findAll();
        return $this->render('open_class_dut/entreprises.html.twig', [
            'listeEntreprise' => $listeEntreprise,
        ]);
    }

    public function entreprises_stage($id): Response
    {
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::Class);
        $entreprise = $repositoryEntreprise->find($id);
        return $this->render('open_class_dut/entreprises_stage.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }

    public function formations(): Response
    {
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::Class);
        $listeFormation = $repositoryFormation->findAll();
        return $this->render('open_class_dut/formations.html.twig', [
            'listeFormation' => $listeFormation,
        ]);
    }

    public function formations_stage($id): Response
    {
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::Class);
        $formation = $repositoryFormation->find($id);
        return $this->render('open_class_dut/formations_stage.html.twig', [
            'formation' => $formation,
        ]);
    }

    public function stages($id): Response
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::Class);
        $stage = $repositoryStage->find($id);
        return $this->render('open_class_dut/stages.html.twig', [
            'stage' => $stage,
        ]);
    }
}
