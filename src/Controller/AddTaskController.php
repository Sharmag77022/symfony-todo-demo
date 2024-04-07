<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskformType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AddTaskController extends AbstractController
{
    #[Route('/add-task', name: 'app_add_task')]
    public function index(): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskformType::class, $task);
        return $this->render('add_task/index.html.twig', [
            'form' => $form,
        ]);
    }
}
