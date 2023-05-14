<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\DishesRepository;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DishesController extends AbstractController
{
    #[Route('/la-carte', name: 'app_dishes')]
    public function index(DishesRepository $dishesRepository, Request $request,PaginatorInterface $paginatorInterface): Response
    {

        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $form =$this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
       [$min, $max] = $dishesRepository->findMinMax($data);

        $dishes = $dishesRepository->findSearch($data);

        return $this->render('la_carte/index.html.twig', [
            'dishes' => $dishes,
            'form' => $form->createView(),
            'min' => $min,
            'max' => $max,
        ]);
    }
}
