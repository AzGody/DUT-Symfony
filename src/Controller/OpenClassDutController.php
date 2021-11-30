<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpenClassDutController extends AbstractController
{
    /**
     * @Route("/open/class/dut", name="open_class_dut")
     */
    public function index(): Response
    {
        return $this->render('open_class_dut/index.html.twig', [
            'controller_name' => 'OpenClassDutController',
        ]);
    }
    public function entreprise(): Response
    {
        return $this->render('open_class_dut/entreprise.html.twig', [
            'controller_name' => 'OpenClassDutController',
        ]);
    }
    public function formations(): Response
    {
        return $this->render('open_class_dut/formations.html.twig', [
            'controller_name' => 'OpenClassDutController',
        ]);
    }
    public function stages($id): Response
    {
        return $this->render('open_class_dut/stages.html.twig', [
            'controller_name' => 'OpenClassDutController',
            'id' => $id,
        ]);
    }
}
