<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MoodRepository;


final class MoodController extends AbstractController
{
    #[Route('/mood', methods: ['GET'])]
    public function index(MoodRepository $moodRepo): JsonResponse
    {
        $moods = $moodRepo->findAll();

        return $this->json($moods);
    }

    // =========== NOT TO DO ==========
    // Récupérer les émotions: getAllMood()
}
