<?php

namespace App\Controller;

use App\Form\PassType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CghtpasswordController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/password', name: 'app_password')]

    public function password(Request $request, UserPasswordHasherInterface $userPasswordHasher, ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(PassType::class, $user);

        $form->handleRequest($request);
        if ($form->issubmitted () && $form->isValid()) {

            // on vérifie que le mot de pass actuel est correct
            $oldPassword = $form->get('oldPassword')->getData();
            if (!$userPasswordHasher->isPasswordValid($user, $oldPassword)) {

                $this->addFlash('danger', 'Mot de pass actuel éroné !');
                return $this->redirectToRoute('app_password');
            }

        //on hash le nouveau mot de pass
        $encodedPassword = $userPasswordHasher->hashPassword(
            $user,
            $form->get('plainPassword')->getData()
        );

        //on le stock dans l'instance user
        $user->setPassword($encodedPassword);

        //on update le user dans BD
        $em = $doctrine->getManager();
        $em->flush();

        //on redirige vers home avec feedback
        $this->addFlash('success', 'Le mot de passe est modifié');

        return $this->redirectToRoute('home');
        }

        return $this->render('page/chgtpassword.html.twig', [
            'titrepage' => 'Chgtmdp - Facteur Accordeur Piano',
            'form' => $form->createView(),
        ]);
    }
}