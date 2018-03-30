<?php
namespace AppBundle\Controller;
//use incentive\AppBundle\Entity\Branch;
use incentive\AppBundle\Entity\FosUser;
//use incentive\AppBundle\Entity\Role;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/26/2018
 * Time: 12:00 PM
 */
class FosUserController extends Controller
{

  //  public function newAction(Request $request)
 //   {
        //$user = new FosUser();
   //     $em = $this->getDoctrine()->getManager();
       // $form = $this->createForm('FosUserType',$user,array(
        //    'em' => $em
      //  ));
       // $form->handleRequest($request);
 //   }
    /**
     * @Route("/reg", name="reg")
     * @Method({"GET", "POST"})x
     */

    public  function editRoleAction(Request $request){

        $fosuser = new \AppBundle\Entity\FosUser();
        $em = $this->getDoctrine()->getManager();
        $editForm = $this->createForm('AppBundle\Form\FosUserType',$fosuser,  array(
            'em' => $em
        ));
        $editForm->handleRequest($request);
 //       return $this->render('@App/FosUser/role.html.twig',array('form' => $form->createView()));
        return array(
            'twig' => $this->render('AppBundle:FosUser:role.html.twig'),

            'form' => $editForm->createView()
        );
    }
}