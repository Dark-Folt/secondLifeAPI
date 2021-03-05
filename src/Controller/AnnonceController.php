<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AnnonceController.php',
        ]);
    }


    /**
     * @Route("/api/annonces/post", name="api_annonce_post", methods={"GET", "POST"})
     */
    public function post(Request $request, EntityManagerInterface $em)
    {
        // var_dump($request->get('prix'));
        // var_dump($request->get('poids'));
        var_dump($request);
        die();
    }
}
