<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DailyStatusController extends AbstractController
{
    #[Route('/dailystatus', name: 'app_daily_status')]
    public function index(): Response
    {
        return $this->render('daily_status/index.html.twig', [
            'controller_name' => 'DailyStatusController',
        ]);
    }

    // =========== NOT TO DO ==========
    // Modifier un daily status : updateDailyStatus()
    // Supprimer un daily status : deleteDailyStatus()
    
    // =========== TO DO ==========
    // Créer un daily status : createDailyStatus()
    // Récupérer le dernier dail status : getLastDailyStatus()
}
