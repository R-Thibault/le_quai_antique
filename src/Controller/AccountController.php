<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use App\Form\UserEditFormType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PlanningRepository;
use App\Repository\ReservationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/account', name: 'app_account')]
class AccountController extends AbstractController
{
    #[Route('/account', name: '_index')]
    public function index(PlanningRepository $planningRepository, ReservationsRepository $reservationsRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_home');
        }elseif ($this->getUser()->getRoles()[0] === 'ROLE_ADMIN') {
            return $this->redirectToRoute('app_admin');
        }
        $user = $this->getUser();
        $reservation = $reservationsRepository->findBy(['user' => $user]);
        $days = $planningRepository->findAll();
        return $this->render('account/index.html.twig', compact('user', 'days', 'reservation'));  

    }

    #[Route('/account/edit/{id}', name: '_edit')]
    public function edit(Users $user, Request $request, EntityManagerInterface $entityManagerInterface, UsersRepository $usersRepository, PlanningRepository $planningRepository ): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_home');
        }elseif ($this->getUser()->getRoles()[0] === 'ROLE_ADMIN') {
            return $this->redirectToRoute('app_admin');
        }
        $userEditForm = $this->createForm(UserEditFormType::class, $user);
        $userEditForm->handleRequest($request);

        
        if ($userEditForm->isSubmitted() && $userEditForm->isValid()) {
            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();
            $this->addFlash('success', 'Votre compte a bien été modifié');
            return $this->redirectToRoute('app_account_index');
        }

        
        $days = $planningRepository->findAll();
        return $this->render('account/edit.html.twig', [
            'user' => $user,
            'userEditForm' => $userEditForm->createView(),
            'days' => $days
        ]);

    }
}
