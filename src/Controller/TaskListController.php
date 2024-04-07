<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TaskListController extends AbstractController
{
    #[Route('/task-list', name: 'app_task_list')]
    public function index(): Response
    {
        return $this->render('task_list/index.html.twig', [
            'controller_name' => 'TaskListController',
        ]);
    }
}
