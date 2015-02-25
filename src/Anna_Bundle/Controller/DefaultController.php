<?php

namespace Anna_Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\hello-world.html;

class DefaultController extends Controller
{
    public function indexAction($fname,$lname)
	//public function indexAction()
    {

   
   //return $this->render('HelloBundle:Default:hello.html.twig');
   //return $this->render('HelloBundle:Default:index.html.twig', array() );
   return $this->render('HelloBundle:Default:index.html.twig', array('fname' => $fname, 'lname' =>$lname));

    }
}
