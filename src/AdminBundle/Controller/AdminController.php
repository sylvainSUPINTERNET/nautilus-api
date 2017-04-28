<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use NautilusBundle\Entity\User;

class AdminController extends Controller
{
    /**
     * @Route("/admin/dashboard", name="deshboard_admin")
     */
    public function indexAction()
    {

        //List users
        $listUsers = $this->getDoctrine()
            ->getRepository('NautilusBundle:User')
            ->findAll();


        return $this->render('AdminBundle:Dashboard:index.html.twig', array(
                "users" => $listUsers,
            )
        );
    }

    /**
     * @Route("/admin/dashboard/addUser", name="deshboard_action_add")
     */
    public function addUser()
    {


        return $this->render('AdminBundle:Dashboard:addUser.html.twig');

    }
}
