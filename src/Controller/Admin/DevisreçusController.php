<?php

namespace App\Controller\Admin;

use App\Repository\DevisRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevisreçusController extends AbstractController
{
    #[Route('/admin/devisre/us', name: 'app_admin_devisre_us')]
    public function index(DevisRepository $devisRepository): Response
    {
        $deviss = $devisRepository->findAll();

        return $this->render('admin/devisreçus/index.html.twig', [
            'deviss' => $deviss,
        ]);
    }
}
