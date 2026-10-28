<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MoodRepository;


final class MoodController extends AbstractController
{
    #[Route('/mood', name: 'app_mood')]
    public function index(MoodRepository $moodRepo): Response
    {
        $moods = $moodRepo->findAll();
        
        return $this->render('mood/index.html.twig', [
            'controller_name' => 'MoodController',
        ]);
    }

    // =========== NOT TO DO ==========
    // Récupérer les émotions: getAllMood()
}
