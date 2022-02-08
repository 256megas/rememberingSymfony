<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrimerController extends AbstractController
{
    #[Route('/primer', name: 'primer')]
    public function index(): Response
    {
        return $this->render('primer/index.html.twig', [
            'controller_name' => 'PrimerController',
        ]);
    }
}
