<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\BodyStatusRepository;

final class BodyStatusController extends AbstractController
{
    #[Route('/bodystatus', name: 'app_body_status')]
    public function index(BodyStatusRepository $bsRepo): Response
    {

        $bodystatus = $bsRepo->findAll();

        return $this->render('body_status/index.html.twig', [
            'body_status' => $bodystatus,
            'controller_name' => 'BodyStatusController',
        ]);
    }

    // =========== NOT TO DO ==========
    // Récupérer les émotions: getAllBodySatus()
}
