<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/api/posts/post", name="api_annonce_post", methods={"POST"})
     */
    public function post(Request $request, EntityManagerInterface $manager, SerializerInterface $serializer)
    {
        try {
            //je traite les données qui doivent être formetté
            $request->request->set('weight', floatval($request->request->get('weight')));
            $request->request->set('price', floatval($request->request->get('price')));
            $request->request->set('isValid', boolval($request->request->get('isValid')));
            $post = $serializer->deserialize(json_encode($request->request->all()), Post::class, 'json');
            $post->setCreatedAt(new \DateTime());

            $target_dir = 'annonces';

            if (!\file_exists($target_dir)) {
                \mkdir($target_dir, 077, true);
            }

            $target_dir .= '/' . rand() . '_' . time() . '.jpeg';

            if (\move_uploaded_file($_FILES['image']['tmp_name'], $target_dir)) {
                $post->setImageURL('/' . $target_dir);
                $manager->persist($post);
                $manager->flush();

                return $this->json([
                    'message' => 'Upload success',
                ]);
            } else {
                return $this->json([
                    'message' => 'Error lors de l upload de l image'
                ]);
            }
        } catch (NotEncodableValueException $e) {
            return $this->json(['status' => 400, 'message' => $e->getMessage()], 400);
        }
    }
}
