<?php

namespace App\Controller;

use App\Entity\Planning;
use App\Entity\Users;
use App\Form\UserEditFormType;
use App\Repository\UsersRepository;
use App\Service\SendMailService;
use App\Entity\Reservations;
use App\Form\ReservationsType;
use App\Repository\PlanningRepository;
use App\Repository\ReservationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class ReservationsCrudController extends AbstractController
{
    #[Route('/account', name: 'app_account_index', methods: ['GET'])]
    public function index(ReservationsRepository $reservationsRepository, PlanningRepository $planningRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_home');
        }elseif ($this->getUser()->getRoles()[0] === 'ROLE_ADMIN') {
            return $this->redirectToRoute('app_admin');
        }
        $user = $this->getUser();
        $reservations = $reservationsRepository->findBy(['user' => $user]);
        $days = $planningRepository->findAll();
        return $this->render('account/index.html.twig', compact('user', 'days', 'reservations')); 
    }

    #[Route('/account/edit/{id}', name: 'app_account_edit')]
    public function editUser(Users $user, Request $request, EntityManagerInterface $entityManagerInterface, UsersRepository $usersRepository, PlanningRepository $planningRepository ): Response
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

    #[Route('/reservation/new', name: 'app_reservations_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReservationsRepository $reservationsRepository, PlanningRepository $planningRepository, SendMailService $mail): Response
    {
        $reservation = new Reservations();
        $form = $this->createForm(ReservationsType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservationsRepository->save($reservation, true);

             $mail->sendMail(
                'no-reply@quaiantique.net',
                $reservation->getEmail(),
                'Confirmation de votre réservation',
                'reservation',
                compact('reservation')
            );

            $this->addFlash('success', 'Votre réservation a bien été crée');
            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        $days = $planningRepository->findAll();
        return $this->renderForm('reservations_crud/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
            'days' => $days,
        ]);
    }

    #[Route('/reservation/{id}', name: 'app_reservations_crud_show', methods: ['GET'])]
    public function show(Reservations $reservation, PlanningRepository $planningRepository): Response
    {
        $days = $planningRepository->findAll();
        return $this->render('reservations_crud/show.html.twig', [
            'reservation' => $reservation,
            'days' => $days,
        ]);
    }

    #[Route('/reservation/{id}/edit', name: 'app_reservations_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reservations $reservation, ReservationsRepository $reservationsRepository, PlanningRepository $planningRepository): Response
    {
        $form = $this->createForm(ReservationsType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservationsRepository->save($reservation, true);

            $this->addFlash('success', 'Votre réservation a bien été modifiée');
            return $this->redirectToRoute('app_account_index', [], Response::HTTP_SEE_OTHER);
        }

        $days = $planningRepository->findAll();
        return $this->renderForm('reservations_crud/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
            'days' => $days,
        ]);
    }

    #[Route('/reservation/{id}', name: 'app_reservations_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Reservations $reservation, ReservationsRepository $reservationsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->request->get('_token'))) {
            $reservationsRepository->remove($reservation, true);
        }

        $this->addFlash('success', 'Votre réservation a bien été supprimer');
        return $this->redirectToRoute('app_account_index', [], Response::HTTP_SEE_OTHER);
    }
}
