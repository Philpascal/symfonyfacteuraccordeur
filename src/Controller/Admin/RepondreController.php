<?php

namespace App\Controller\Admin;

use App\Entity\Devis;
use App\Form\ReponseType;
use Symfony\Component\Mime\Address;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RepondreController extends AbstractController
{
    #[Route('/admin/repondre/{id}', name: 'app_repondre')]
    public function indexrepondre(Devis $devis, Request $request, ManagerRegistry $doctrine, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ReponseType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $devis->setUserrepondre($this->getUser());
            $devis->setDatereponse(new \DateTimeImmutable('now'));/***********date auto */

            $email=(new TemplatedEmail())
                ->from(new Address('philippesedlacek1@gmail.com', 'company.com'))
                ->to($devis->getUser()->getEmail())
                ->subject('voici la réponse')
                ->htmlTemplate('admin/reponse.html.twig')
                ->context([
                    'message'=> $devis->getMessage(),
                    'reponse'=> $devis->getReponse()
                ]);
            $mailer->send($email);




            $em = $doctrine->getManager();
            $em->flush();

            return $this->redirectToRoute('admin_home');
        }
        
        return $this->render('admin/repondre/index.html.twig', [ 
            'titrepage' => 'Réponse - Facteur Accordeur Piano',
            'form' => $form->createView(),
        ]);
    }
}