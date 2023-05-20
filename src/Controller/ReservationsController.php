<?php

namespace App\Controller;


use App\Entity\Reservations;
use App\Entity\Users;
use App\Repository\ReservationsRepository;
use App\Form\ReservationsEditFormType;
use App\Repository\UsersRepository;
use App\Form\ReservationFormType;
use App\Repository\PlanningRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\SendMailService;

class ReservationsController extends AbstractController
{
    #[Route('/reservations', name: 'app_reservations')]
    public function index( UsersRepository $usersRepository, Request $request, EntityManagerInterface $entityManager, PlanningRepository $planningRepository, SendMailService $mail): Response
    {
        $reservation = new Reservations();
        
        $formReservation = $this->createForm(ReservationFormType::class, $reservation);
        $formReservation->handleRequest($request);
        if ($formReservation->isSubmitted() && $formReservation->isValid()) {
            
            
            $entityManager->persist($reservation);
            $entityManager->flush();

            $mail->sendMail(
                'no-reply@quaiantique.net',
                $reservation->getEmail(),
                'Confirmation de votre réservation',
                'reservation',
                compact('reservation')
            );

            $this->addFlash('success', 'Votre réservation a bien été prise en compte');
            return $this->redirectToRoute('app_home');
        }

        
        $days = $planningRepository->findAll();
        
       

        return $this->renderForm('reservations/index.html.twig', compact('formReservation', 'days'));
    }

    #[Route('/reservations/edit/{id}', name: 'app_reservations_edit')]
    public function editReservation( Reservations $reservations, Request $request, EntityManagerInterface $entityManagerInterface, UsersRepository $usersRepository, PlanningRepository $planningRepository, ReservationsRepository $reservationsRepository) 
    {
   
        $editReservationForm = $this->createForm(ReservationsEditFormType::class, $reservations);
        $editReservationForm->handleRequest($request);

        if ($editReservationForm->isSubmitted() && $editReservationForm->isValid()) {
            $entityManagerInterface->persist($reservations);
            $entityManagerInterface->flush();
            $this->addFlash('success', 'Votre réservation a bien été modifiée');
            return $this->redirectToRoute('app_account_index');
        }
        $days = $planningRepository->findAll();
        return $this->render('account/resaEdit.html.twig', [

            'editReservationForm' => $editReservationForm->createView(),
            'days' => $days
        ]);
    }

    #[Route('/reservations/delete/{id}', name: 'app_reservations_delete')]
    public function deleteReservation(Reservations $reservations, EntityManagerInterface $entityManagerInterface)
    {
        
        $entityManagerInterface->remove($reservations);
        $entityManagerInterface->flush();
        $this->addFlash('success', 'Votre réservation a bien été supprimée');
        return $this->redirectToRoute('app_home');
    }
}
