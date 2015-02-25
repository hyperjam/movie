<?php

namespace Student\ZebraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
/**
 * Zebra action.
 * @Route("/zebra.html")
 * @Route("/zebra" )
 * @Method({"GET", "POST"})
 * @Template("StudentZebraBundle:Default:zebra.html.twig")
 */

    public function zebraAction()
    {
        return $this->render('StudentZebraBundle:Default:zebra.html.twig', array());
    }
}


