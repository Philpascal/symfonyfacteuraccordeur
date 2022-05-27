<?php

namespace App\Controller\Admin;

use App\Repository\DevisRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(DevisRepository $devisRepository): Response
    {
        $deviss = $devisRepository->findAll();
        //dd($deviss);
        
        return $this->render('admin/index.html.twig', [
            'deviss' => $deviss,
        ]);
    }
}
