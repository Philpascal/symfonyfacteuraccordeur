<?php

namespace App\Controller\Admin;

use App\Entity\Photoaccueil;
use App\Form\PhotoaccueilType;
use App\Repository\PhotoaccueilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/photoaccueil', name:'app_photoaccueil_')]
class PhotoaccueilController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(PhotoaccueilRepository $photoaccueilRepository): Response
    {
        return $this->render('admin/photoaccueil/index.html.twig', [
            'photoaccueils' => $photoaccueilRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, PhotoaccueilRepository $photoaccueilRepository): Response
    {
        $photoaccueil = new Photoaccueil();
        $form = $this->createForm(PhotoaccueilType::class, $photoaccueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photoaccueilRepository->add($photoaccueil, true);

            return $this->redirectToRoute('app_photoaccueil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/photoaccueil/new.html.twig', [
            'photoaccueil' => $photoaccueil,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Photoaccueil $photoaccueil): Response
    {
        return $this->render('admin/photoaccueil/show.html.twig', [
            'photoaccueil' => $photoaccueil,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Photoaccueil $photoaccueil, PhotoaccueilRepository $photoaccueilRepository): Response
    {
        $form = $this->createForm(PhotoaccueilType::class, $photoaccueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photoaccueilRepository->add($photoaccueil, true);

            return $this->redirectToRoute('app_photoaccueil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/photoaccueil/edit.html.twig', [
            'photoaccueil' => $photoaccueil,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Photoaccueil $photoaccueil, PhotoaccueilRepository $photoaccueilRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photoaccueil->getId(), $request->request->get('_token'))) {
            $photoaccueilRepository->remove($photoaccueil, true);
        }

        return $this->redirectToRoute('admin/app_photoaccueil_index', [], Response::HTTP_SEE_OTHER);
    }
}
