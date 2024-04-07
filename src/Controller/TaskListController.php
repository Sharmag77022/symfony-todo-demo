<?php

namespace App\Controller;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TaskListController extends AbstractController
{
    #[Route('/task-list', name: 'app_task_list')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $tasks = $entityManager->getRepository(Task::class)->findAll();
        return $this->render('task_list/index.html.twig', [
            'tasks' => $tasks,
        ]);
    }
    #[Route('/taskCompleted/{id}', name: 'app_task_complete')]
    public function taskCompleted($id,EntityManagerInterface $entityManager): Response
    {
        $task = $entityManager->getRepository(Task::class)->find($id);
        if (!$task) {
            throw $this->createNotFoundException(
                'No task found'
            );
        }
        $entityManager->remove($task);
        $entityManager->flush();
        return $this->redirectToRoute('app_task_list');
    }
}
