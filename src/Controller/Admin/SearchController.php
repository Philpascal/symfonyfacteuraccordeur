<?php

namespace App\Controller\Admin;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    public function searchBar()
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('app_admin_search'))
            ->add('query',IntegerType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Prix maxi d\'un Piano'
                ]
            ])
            ->add('recherche', SubmitType::class, [
                'attr' => [
                    'btn btn-primary btn-sm'
                    ]
            ])
            ->getForm();
        
        return $this->render('admin/search/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/admin/search', name: 'app_admin_search')]
    public function handleSearch(Request $request, ProduitRepository $produitRepository): Response
    {
        $query = $request->request->get('form')['query'];
        
        $produits = $produitRepository->findPrixBySearch($query);
        //dd($produits);
        return $this->render('admin/selection/index.html.twig', [
            'filter' => 'Suite à votre recherche de pianos inférieurs à',
            'filtervalue' => $query .' '. '€',
            'produits' => $produits
        ]);
    }
}
