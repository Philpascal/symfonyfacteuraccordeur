<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Form\DevisType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormulaireController extends AbstractController
{
    #[Route('/formulaire/add', name: 'app_formulaire')]
    public function formulaireadd(Request $request, ManagerRegistry $doctrine ): Response
    {
        // dd($this->getUser().isVerified);
        
        if ($this->getUser()->isVerified()) {
            
            $devis = new Devis();

            $form = $this->createForm(DevisType::class, $devis);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $devis->setUser($this->getUser());
                $em = $doctrine->getManager();
                $em->persist($devis);
                $em->flush();
                return $this->redirectToRoute('home');
            }
        }
        else {
            return $this->redirectToRoute('page_contact');
        }
        return $this->render('formulaire/index.html.twig', [ 'titrepage' => 'Formulaire - Facteur Accordeur Piano',
            'form' => $form->createView(),
        ]);
    }
}