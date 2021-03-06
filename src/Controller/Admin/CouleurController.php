<?php

namespace App\Controller\Admin;

use App\Entity\Couleur;
use App\Form\CouleurType;
use App\Repository\CouleurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/couleur', name:'app_couleur_')]
class CouleurController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(CouleurRepository $couleurRepository): Response
    {
        return $this->render('admin/couleur/index.html.twig', [
            'couleurs' => $couleurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, CouleurRepository $couleurRepository): Response
    {
        $couleur = new Couleur();
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $couleurRepository->add($couleur, true);

            return $this->redirectToRoute('app_couleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/couleur/new.html.twig', [
            'couleur' => $couleur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Couleur $couleur): Response
    {
        return $this->render('admin/couleur/show.html.twig', [
            'couleur' => $couleur,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Couleur $couleur, CouleurRepository $couleurRepository): Response
    {
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $couleurRepository->add($couleur, true);

            return $this->redirectToRoute('app_couleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/couleur/edit.html.twig', [
            'couleur' => $couleur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Couleur $couleur, CouleurRepository $couleurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$couleur->getId(), $request->request->get('_token'))) {
            $couleurRepository->remove($couleur, true);
        }

        return $this->redirectToRoute('app_couleur_index', [], Response::HTTP_SEE_OTHER);
    }
}
