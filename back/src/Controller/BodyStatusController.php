<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\BodyStatusRepository;

final class BodyStatusController extends AbstractController
{
    #[Route('/body-statuses', methods: ['GET'])]
    public function index(BodyStatusRepository $bsRepo): JsonResponse
    {

        $bodystatus = $bsRepo->findAll();

        return $this->json($bodystatus);
    }

    // =========== NOT TO DO ==========
    // Récupérer les émotions: getAllBodySatus()
}
