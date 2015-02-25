<?php

namespace Student\ShrimpMenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
/**
 * Menu action.
 * @Route("/h" )
 * @Route("/home")
 * @Method({"GET", "POST"})
 * @Template("StudentShrimpMenuBundle:Default:home.html.twig")
 */


    public function homeAction()
    {
        return $this->render('StudentShrimpMenuBundle:Default:home.html.twig', array());
    }
}



