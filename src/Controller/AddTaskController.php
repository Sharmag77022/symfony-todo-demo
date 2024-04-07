<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AddTaskController extends AbstractController
{
    #[Route('/add-task', name: 'app_add_task')]
    public function index(): Response
    {
        return $this->render('add_task/index.html.twig', [
            'controller_name' => 'AddTaskController',
        ]);
    }
}
