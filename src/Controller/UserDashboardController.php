<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserDashboardController extends AbstractController
{
    #[Route('/compte', name: 'user_dashboard')]
    public function index(): Response
    {
        return $this->render('user_dashboard/index.html.twig', [
            'controller_name' => 'UserDashboardController',
        ]);
    }
}