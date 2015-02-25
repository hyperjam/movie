<?php


namespace Project\FilmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
/**
 * Menu action.
 * @Route("/" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:home.html.twig")
 */

    public function homeAction()
    {
        return $this->render('ProjectFilmsBundle:Default:home.html.twig', array());
    }

/**
 * first film action.
 * @Route("/first.html" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:first.html.twig")
 */
     public function oneAction()
    {
        return $this->render('ProjectFilmsBundle:Default:first.html.twig', array());
    }
}

