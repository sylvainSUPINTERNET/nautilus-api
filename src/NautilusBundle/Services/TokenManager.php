<?php

namespace NautilusBundle\Services;


use Symfony\Component\HttpFoundation\Session\Session;


class TokenManager {

    protected $strSecret = "";
    protected $intSecret = 0;
    protected $container;


    public function __construct($str) {
        $this->strSecret = $this->setStrSecret($str);
        $this->intSecret = $this->setIntSecret();
    }

    public function setStrSecret($strToRandomfy){
        $generateStr = "";
        $salt = "azeaieu1122225489754787784422111111AZIEAEIAEUIueaizeu5445aieuiuIEAIZUEA45445445IEUieuaiueizaueiazuiUEAIZUEAIU";
        $generateStr = "".str_shuffle($strToRandomfy)."".str_shuffle($salt) ;
        return $generateStr;
    }

    public function setIntSecret(){
        return mt_rand();
    }


    public function getStrSecret(){
        return $this->strSecret;
    }

    public function getIntSecret(){
        return $this->intSecret;
    }

    /*
    public function getCurrentSession(){
        return $this->container->get('session')->isStarted();

    }

    public function generateSession(){

        $currentSession ="";


        if($this->getCurrentSession() == true){
            var_dump("session existe deja");
            //get session
            // stocker dans la variable
        }else{
            //creer sessioon
            //set strSecret intSecret
            //stocker dans la variable
        }
        //return variable
    }
    */

}


