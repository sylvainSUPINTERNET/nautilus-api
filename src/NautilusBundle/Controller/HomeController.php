<?php

namespace NautilusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use NautilusBundle\Services\TokenManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home_page")
     */
    public function homeAction()
    {

        $token = new TokenManager("eazlkeakjejaeiajiejiaje"); //RAJOUTER INJECTION SERVICE
        var_dump($token->getStrSecret()); //generate a random string
        var_dump($token->getIntSecret()); //generate a random int


        //Test role
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException(); // return page de login si pas de connection
        }else{
            $roleCurrentUser = $this->getUser()->getRoles();
            var_dump($roleCurrentUser);
        }









       
        /*
        if(!($this->container->get('session')->isStarted())){

            $session = new Session();
            $session->start();

            //creer un service qui genere une stirng random pour fair le token
            $session->set("token", "RandomGenerateByService!");
            $session->get("token");

            return $this->redirectToRoute('/login');

        }else{
            $session = $this->container->get('session')->get("token");
		    var_dump("Session already existing ! " . $session->get("token"));
        }

        */


        return $this->render('NautilusBundle:Home:home.html.twig');
    }

}
