<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskformType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;
class AddTaskController extends AbstractController
{
    private $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    #[Route('/add-task', name: 'app_add_task')]
    public function index(Request $req,EntityManagerInterface $entityManager): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskformType::class, $task);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            $task1 = $form->getData();
            $entityManager->persist($task1);
            $entityManager->flush();
            return $this->redirectToRoute('app_task_list');
        }
        
        return $this->render('add_task/index.html.twig', [
            'form' => $form,
        ]);
    }
}
