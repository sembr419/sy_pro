<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{


    /**
     * @Route("/",  name="home")
     */
    public function homeAction()
    {
        return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * @Route("/test/{id}", name="homepage")
     */
    public function updateAction($id)
         {
//             var_dump($id);
//             exit();

         $em = $this->getDoctrine()->getManager();
         $product = $em->getRepository('AppBundle:Product')->find($id);

         if (!$product) {
         throw $this->createNotFoundException(
         'No product found for id '.$id
         );
         }

         $product->setName('New product name!');
         $em->flush();

         return $this->redirect($this->generateUrl('homepage'));
         }
}
