<?php

namespace App\Controller;

use App\Repository\PlanningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanningController extends AbstractController
{
    #[Route('/', name: 'app_planning')]
    public function index(PlanningRepository $planningRepository): Response
    {   

        $days = $planningRepository->findAll();
        return $this->render('/base.html.twig',[
            'days' => $days,
        ] );
    }
}
