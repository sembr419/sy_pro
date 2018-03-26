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
    /**
     * @Route("/register-la", name="register-la")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $user = new FosUser();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('FosUserType',$user,array(
            'em' => $em
        ));
        $form->handleRequest($request);
    }
}