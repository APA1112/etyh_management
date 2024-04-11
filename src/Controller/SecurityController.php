<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'login_App')]
   public function login(AuthenticationUtils $authenticationUtils): Response
   {
       $error = $authenticationUtils->getLastAuthenticationError();


       $lastUsername = $authenticationUtils->getLastUsername();
       return $this->render('security/index.html.twig', [
           'lastUsername' => $lastUsername,
           'error'=> $error
       ]);
   }


   #[Route(path: '/logout', name: 'logout_App')]
   public function logout(): void
   {
       throw new \LogicException('Esto no debería ejecutarse nunca.');
   }

}
