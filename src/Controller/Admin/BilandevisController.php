<?php

namespace App\Controller\Admin;

use App\Repository\DevisRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BilandevisController extends AbstractController
{
    #[Route('/admin/bilandevis', name: 'app_bilandevis')]
    public function indexbilandevis(DevisRepository $devisRepository): Response
    {
        $deviss = $devisRepository->findAll();

        return $this->render('admin/bilandevis/index.html.twig', [
            'deviss' => $deviss,
        ]);
    }
}
