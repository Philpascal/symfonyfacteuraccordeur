<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UrgenceController extends AbstractController
{
    #[Route('/urgence', name: 'app_urgence')]
    public function index(): Response
    {
        return $this->render('urgence/index.html.twig', [
            'controller_name' => 'UrgenceController',
        ]);
    }
}
