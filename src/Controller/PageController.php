<?php

namespace App\Controller;

use App\Repository\TypeRepository;
//use App\Repository\ProduitRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function indexhome(): Response
    {
        return $this->render('page/home.html.twig', [
            'titrepage' => 'Antoine BERTHIER - Facteur Accordeur Piano',
        ]);
    }

    #[Route('/contact', name: 'page_contact')]
    public function indexcontact(): Response
    {
        return $this->render('page/contact.html.twig', [
            'titrepage' => 'Contact - Facteur Accordeur Piano',
        ]);
    }

    #[Route('/accord', name: 'page_accord')]
    public function indexaccord(): Response
    {
        return $this->render('page/accord.html.twig', [
            'titrepage' => 'Accord - Harmonisation - Facteur Accordeur Piano',
        ]);
    }

    #[Route('/reparation', name: 'page_reparation')]
    public function indexreparation(): Response
    {
        return $this->render('page/reparation.html.twig', [
            'titrepage' => 'Reparation - Restauration - Facteur Accordeur Piano',
        ]);
    }

    #[Route('/conseil', name: 'page_conseil')]
    public function indexconseil(): Response
    {
        return $this->render('page/conseil.html.twig', [
            'titrepage' => 'Conseil Achat - Location - Facteur Accordeur Piano',
        ]);
    }

    #[Route('/urgence', name: 'page_urgence')]
    public function indexurgence(): Response
    {
        return $this->render('page/urgence.html.twig', [
            'titrepage' => 'Urgence - Facteur Accordeur Piano',
        ]);
    }

    #[Route('/zone', name: 'page_zone')]
    public function indexzone(): Response
    {
        return $this->render('page/zone.html.twig', [
            'titrepage' => 'Zone Intervention - Facteur Accordeur Piano',
        ]);
    }

    #[Route('/pianodroit', name: 'page_pianodroit')]
    public function pianodroit(ProduitRepository $produitRepository): Response
    {
        $produits = $produitRepository->pianodroit();

        return $this->render('page/pianos.html.twig', [
            'titrepage' => 'Présentation Pianos Droits - Facteur Accordeur Piano',
            'produits' => $produits,
        ]);
    }
    
    #[Route('/pianoaqueue', name: 'page_pianoaqueue')]
    public function pianoaqueue(ProduitRepository $produitRepository): Response
    {
        $produits = $produitRepository->pianoaqueue();

        return $this->render('page/pianos.html.twig', [
            'titrepage' => 'Présentation Pianos à Queues - Facteur Accordeur Piano',
            'produits' => $produits,
        ]);
    }
}
