<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BodyStatusContollerController extends AbstractController
{
    #[Route('/body/status/contoller', name: 'app_body_status_contoller')]
    public function index(): Response
    {
        return $this->render('body_status_contoller/index.html.twig', [
            'controller_name' => 'BodyStatusContollerController',
        ]);
    }
}
