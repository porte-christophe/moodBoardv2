<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BodyStatusController extends AbstractController
{
    #[Route('/bodystatus', name: 'app_body_status')]
    public function index(): Response
    {
        return $this->render('body_status/index.html.twig', [
            'controller_name' => 'BodyStatusController',
        ]);
    }

    // =========== NOT TO DO ==========
    // Récupérer les émotions: getAllBodySatus()
}
