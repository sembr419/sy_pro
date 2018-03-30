<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("/profile", name="mainpage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:profile.html.twig');
    }
    /**
     * @Route("/hello", name="hello")
     */
   public function helloAction(Request $request)
   {
    $name = $request->get('name');
      return $this->render('AppBundle:default:index.html.twig',array('name'=>$name ,'test' => '123486'));
   }

}
