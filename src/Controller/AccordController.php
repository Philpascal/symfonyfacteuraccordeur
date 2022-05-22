<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccordController extends AbstractController
{
    #[Route('/accord', name: 'app_accord')]
    public function indexaccord(): Response
    {
        return $this->render('accord/index.html.twig', [
            'controller_name' => 'AccordController',
        ]);
    }

    #[Route('/reparation', name: 'app_reparation')]
    public function indexreparation(): Response
    {
        return $this->render('reparation/index.html.twig', [
            'controller_name' => 'AccordController',
        ]);
    }

    #[Route('/conseil', name: 'app_conseil')]
    public function indexconseil(): Response
    {
        return $this->render('conseil/index.html.twig', [
            'controller_name' => 'AccordController',
        ]);
    }

    #[Route('/urgence', name: 'app_urgence')]
    public function indexurgence(): Response
    {
        return $this->render('urgence/index.html.twig', [
            'controller_name' => 'AccordController',
        ]);
    }

    #[Route('/zone', name: 'app_zone')]
    public function indexzone(): Response
    {
        return $this->render('zone/index.html.twig', [
            'controller_name' => 'AccordController',
        ]);
    }
}
