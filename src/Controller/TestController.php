<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    // #[Route('/test', name: 'test')]
    /**
     * @Route("/test2",name="test2")
     */
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/affiche",name="affiche",methods={"POST"})
     */
    public function affiche(): Response
    {
        return new Response('Hello llo');
    }
}
