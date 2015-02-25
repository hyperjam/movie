<?php

namespace Student\ShrimpsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

/**
 * Tiger action.
 * @Route("/tiger.html")
 * @Route("/tiger", name="tiger")
 * @Method({"GET", "POST"})
 * @Template("ShrimpsBundle:Default:tiger.html.twig")
 */
    public function indexAction()
    {
        return $this->render('ShrimpsBundle:Default:tiger.html.twig', array());
    }
/**
 * Sri action.
 * @Route("/sri.html")
 * @Route("/sri_lanka", name="sri_lanka")
 * @Method({"GET", "POST"})
 * @Template("ShrimpsBundle:Default:sri.html.twig")
 */

    public function sriAction()
    {
        return $this->render('ShrimpsBundle:Default:sri.html.twig', array());
    }

/**
 * Zebra action.
 * @Route("/zebra.html")
 * @Route("/zebra", name="zebra")
 * @Method({"GET", "POST"})
 * @Template("ShrimpsBundle:Default:zebra.html.twig")
 */


public function zebraAction()
    {
        return $this->render('ShrimpsBundle:Default:zebra.html.twig', array());
    }

}
