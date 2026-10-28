<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ActivityRepository;


final class ActivityController extends AbstractController
{
    #[Route('/activities', methods: ['GET'])]
    public function index(ActivityRepository $actRepo): JsonResponse
    {
        $activities = $actRepo->findTwo();
        return $this->json($activities);
    }

    // =========== NOT TO DO ==========
    // Récupérer les émotions: getAllActivity()
}
