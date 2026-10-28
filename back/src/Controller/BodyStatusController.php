<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BodyStatusController extends AbstractController
{
    #[Route('/body/status/controller', name: 'app_body_status_controller')]
    public function index(): Response
    {
        return $this->render('body_status_controller/index.html.twig', [
            'controller_name' => 'BodyStatusController',
        ]);
    }
}
