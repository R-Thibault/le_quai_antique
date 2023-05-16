<?php

namespace App\Controller;

use App\Repository\ImagesRepository;
use App\Repository\PlanningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ImagesRepository $imagesRepository, PlanningRepository $planningRepository): Response
    {
        $images = $imagesRepository->findAll();
        $days = $planningRepository->findAll();
        
        return $this->render('home/index.html.twig', compact('images','days'));
    }
}
