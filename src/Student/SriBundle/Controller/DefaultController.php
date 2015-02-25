<?php

namespace Student\SriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

/**
 * Zebra action.
 * @Route("/sri.html")
 * @Route("/sri_lanka" )
 * @Method({"GET", "POST"})
 * @Template("StudentSriBundle:Default:sri.html.twig")
 */
    public function sriAction()
    {
        return $this->render('StudentSriBundle:Default:sri.html.twig', array());
    }
}
