<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalsController extends AbstractController
{
    #[Route('/legals', name: 'app_legals_')]
    public function index(): Response
    {

        
        return $this->render('legals/index.html.twig', [
            'controller_name' => 'LegalsController',
        ]);
    }

    #[Route('/legals/mentions', name: 'mentions')]
    public function mentions(): Response
    {

        
        return $this->render('legals/mentions.html.twig', [
            'controller_name' => 'LegalsController',
        ]);
    }

    #[Route('/legals/privacy', name: 'privacy')]
    public function privacy(): Response
    {

        
        return $this->render('legals/policy.html.twig', [
            'controller_name' => 'LegalsController',
        ]);
    }
}
