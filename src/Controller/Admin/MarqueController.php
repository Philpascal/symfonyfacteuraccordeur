<?php

namespace App\Controller\Admin;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Repository\MarqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/marque', name:'app_marque_')]
class MarqueController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(MarqueRepository $marqueRepository): Response
    {
        return $this->render('admin/marque/index.html.twig', [
            'marques' => $marqueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, MarqueRepository $marqueRepository): Response
    {
        $marque = new Marque();
        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $marqueRepository->add($marque, true);

            return $this->redirectToRoute('app_marque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/marque/new.html.twig', [
            'marque' => $marque,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Marque $marque): Response
    {
        return $this->render('admin/marque/show.html.twig', [
            'marque' => $marque,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Marque $marque, MarqueRepository $marqueRepository): Response
    {
        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $marqueRepository->add($marque, true);

            return $this->redirectToRoute('app_marque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/marque/edit.html.twig', [
            'marque' => $marque,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Marque $marque, MarqueRepository $marqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$marque->getId(), $request->request->get('_token'))) {
            $marqueRepository->remove($marque, true);
        }

        return $this->redirectToRoute('app_marque_index', [], Response::HTTP_SEE_OTHER);
    }
}
