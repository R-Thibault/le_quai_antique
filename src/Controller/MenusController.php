<?php

namespace App\Controller;

use App\Repository\CombosMealsRepository;
use App\Repository\MealsRepository;
use App\Repository\PlanningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenusController extends AbstractController
{
    #[Route('/menus', name: 'app_menus')]
    public function index(CombosMealsRepository $combosMealsRepository, MealsRepository $meals, PlanningRepository $planningRepository): Response
    {

        $combos = $combosMealsRepository->findAll();
        $meals = $meals->findAll();
        $days = $planningRepository->findAll();

        return $this->render('menus/index.html.twig', compact('combos', 'meals', 'days'));
    }
}
