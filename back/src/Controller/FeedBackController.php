<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FeedBackController extends AbstractController
{
    #[Route('/feedback', name: 'app_feedback')]
    public function index(): Response
    {
        return $this->render('feed_back/index.html.twig', [
            'controller_name' => 'FeedBackController',
        ]);
    }

    // =========== NOT TO DO ==========
    // Modifier un feedback: updateFeedback()
    
    // =========== TO DO ==========
    // Créer un feedback : createFeedback()
    // Proposer des activités en fonction du feebback (acitivités aléatoires et/ préférées) : giveActivityByFeedBack()
}
