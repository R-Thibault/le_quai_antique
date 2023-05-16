<?php

namespace App\Controller;

use App\Repository\ImagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ImagesRepository $imagesRepository): Response
    {
        $images = $imagesRepository->findAll();

        return $this->render('home/index.html.twig', compact('images'));
    }
}
