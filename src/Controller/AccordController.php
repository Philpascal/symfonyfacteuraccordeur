<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccordController extends AbstractController
{
    #[Route('/accord', name: 'app_accord')]
    public function index(): Response
    {
        return $this->render('accord/index.html.twig', [
            'controller_name' => 'AccordController',
        ]);
    }
}
