<?php

namespace App\Controller;

use App\Repository\PlanningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalsController extends AbstractController
{
    #[Route('/legals', name: 'app_legals_')]
    public function index(PlanningRepository $planningRepository): Response
    {

        $days = $planningRepository->findAll();
        return $this->render('legals/index.html.twig', [
            'controller_name' => 'LegalsController',
            'days' => $days
        ]);
    }

    #[Route('/legals/mentions', name: 'mentions')]
    public function mentions(PlanningRepository $planningRepository): Response
    {

        $days = $planningRepository->findAll();
        return $this->render('legals/mentions.html.twig', [
            'controller_name' => 'LegalsController',
            'days' => $days
        ]);
    }

    #[Route('/legals/privacy', name: 'privacy')]
    public function privacy(PlanningRepository $planningRepository): Response
    {

        $days = $planningRepository->findAll();
        return $this->render('legals/policy.html.twig', [
            'controller_name' => 'LegalsController',
            'days' => $days
        ]);
    }
}
