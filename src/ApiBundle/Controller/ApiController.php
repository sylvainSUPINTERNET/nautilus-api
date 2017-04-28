<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Put;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use NautilusBundle\Entity\User;

class ApiController extends Controller
{
    /**
     * @Route("/api/doc", name="api_index")
     */
    public function indexAction(Request $request)
    {
        //Doc index
        return $this->render('ApiBundle:Api:index.html.twig');
    }



    //Tous les users

    /**
     * @Get("/api/users", name="api_action_users")
     */
    public function getUsersActions(Request $request)
    {


        $response = new Response(); //Error HTTP

        $users = $this->getDoctrine()//recupère users
        ->getRepository('NautilusBundle:User')
            ->findAll();


        if (empty($users)) {
            $response->setStatusCode(400);
            $response->setContent('error, no users found !');
            $formatedData[] = [
                "error" => $response->getContent(),
                "status" => $response->getStatusCode(),
            ];
        } else {
            foreach ($users as $user) {
                $response->setStatusCode(200);
                $response->setContent('success');
                $formatedData[] = [
                    "id" => $user->getId(),
                    "username" => $user->getUserName(),
                    "email" => $user->getEmail(),
                    "status" => $response->getStatusCode(),
                    "error" => $response->getContent(),
                ];
            }
        }

        return new JsonResponse($formatedData);
    }


    //User by ID

    /**
     * @Get("/api/user/{id}", name="api_action_user_byId")
     */
    public function getUserByIdActions(Request $request, $id)
    {


        $response = new Response(); //Error HTTP

        $userById = $this->getDoctrine()//recupère users
        ->getRepository('NautilusBundle:User')
            ->findBy(array("id" => $id));

        if (empty($userById)) {
            $response->setStatusCode(400);
            $response->setContent('error, no user found for this id !');
            $formatedData[] = [
                "error" => $response->getContent(),
                "status" => $response->getStatusCode(),
            ];
        } else {
            foreach ($userById as $user) {
                $response->setStatusCode(200);
                $response->setContent('success');
                $formatedData[] = [
                    "id" => $user->getId(),
                    "username" => $user->getUserName(),
                    "email" => $user->getEmail(),
                    "status" => $response->getStatusCode(),
                    "error" => $response->getContent(),
                ];
            }
        }

        return new JsonResponse($formatedData);
    }
}
