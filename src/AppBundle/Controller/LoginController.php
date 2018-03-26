<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/2/2018
 * Time: 3:21 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Login;
use http\Env\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class LoginController extends Controller
{
    /**
     * @Route("/first", name="FirstPage")
     */
        public function loginAction(){

           // $login = new Login();
           // $login->setName('mend');
           // $login->setPass('123');

          //  $username = $login->getName();
          //  $userpass = $login->getPass();



          //  $em = $this->getDoctrine()->getManager();
         //   $em-> persist($login);
          //  $em->flush();

            return $this->render('AppBundle:Default:user.html.twig',array());



        }
}