<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\DailyStatusRepository;
use Doctrine\ORM\EntityManagerInterface;


use App\Entity\User;
use App\Entity\DailyStatus;

final class DailyStatusController extends AbstractController
{
    #[Route('/dailystatus-getLast', methods: ['GET'])]
    public function getLast(): JsonResponse
    {
        $user = $this->getUser();
        $lastdaily = $dsRepo->findLast($user);
        return $this->json($lastdaily);
    }

    #[Route('/dailystatus-createNew', methods: ['POST'])]
    public function createNew(EntityManagerInterface $entityManagerInterface, Request $req): Response
    {
        $user = $this->getUser();
        $dailyStatus = new DailyStatus();
        $dailyStatus->setCreatedAt(new \DateTimeImmutable());
        $dailyStatus->setUser($user);
        $dailyStatus->setMood(/**/);
        $dailyStatus->setBodyStatus(/**/);
        $dailyStatus->setSleepDuration(/**/);
        $entityManagerInterface->persist($dailyStatus);
        $entityManagerInterface->flush();
        return $this->redirectToRoute(/*modal activity*/);
    }

    // =========== NOT TO DO ==========
    // Modifier un daily status : updateDailyStatus()
    // Supprimer un daily status : deleteDailyStatus()
    
    // =========== TO DO ==========
    // Créer un daily status : createDailyStatus()
    // Récupérer le dernier dail status : getLastDailyStatus()
}
