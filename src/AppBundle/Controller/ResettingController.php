<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ResettingController extends Controller
{
    /**
     * @Route("/forget", name="forgetPage")
     */
    public function indexAction()
    {
        return $this->render('@App/Resetting/checkEmail.html.twig');
    }
}

