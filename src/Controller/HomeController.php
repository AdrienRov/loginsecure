<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function homePage(): Response
    {
        if ($this->getUser()) {
            $user = $this->getUser();
            $roles = $user->getRoles();
        }


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'roles' => $roles,
            'email' => $user->getEmail()
        ]);
    }

    #[Route('/', name: 'app_source')]
    public function redirectToHome(): Response
    {
        return $this->redirectToRoute('app_home');
    }
}
