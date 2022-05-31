<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Form\ReponseType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RepondreController extends AbstractController
{
    #[Route('/repondre/{id}', name: 'app_repondre')]
    public function indexrepondre(Devis $devis, Request $request, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(ReponseType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $devis->setUserrepondre($this->getUser());
            $devis->setDatereponse(new \DateTimeImmutable('now'));/***********date auto */
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('admin_home');
        }
        
        return $this->render('repondre/index.html.twig', [ 'titrepage' => 'Réponse - Facteur Accordeur Piano',
            'form' => $form->createView(),
        ]);
    }
}