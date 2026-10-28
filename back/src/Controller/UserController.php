<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    // =========== NOT TO DO ==========
    // Pouvoir consulter ses états passés : seeStatistics()
    // Donner son avis sur l'activité en cours : giveFeedback()
    // =========== TO DO ==========
    // Evaluer son statut : evaluateStatus()
    // Récupérer l'activité en cours : getCurrentActivity()
    
}
