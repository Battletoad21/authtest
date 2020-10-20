<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\UserType;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="users_index")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();

        $users = $this->get('serializer')->serialize($users, 'json');

        $response = new Response(json_encode($users));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/users/home", name="users_home")
     */
    public function home()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);

        $user = $this->getUser();
        $id = $user->getId();
        $user = $repository->find($id);

        return $this->render('user/home.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/users/{id}", name="users_show")
     * @return Response
    */
    public function show($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(User::class);

        $user = $repository->find($id);

        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }
}
