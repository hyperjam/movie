<?php
namespace Project\FilmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Project\FilmsBundle\Entity\Client;
use Project\FilmsBundle\Form\ClientType;

class DefaultController extends Controller
{
/**
 * Menu action.
 * @Route("/" , name="home")
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:home.html.twig")
 */

    public function homeAction()
    {
        return $this->render('ProjectFilmsBundle:Default:home.html.twig', array());
    }

/**
 * first film action.
 * @Route("/first" , name="first" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:first.html.twig")
 */
     public function oneAction()
    {
        return $this->render('ProjectFilmsBundle:Default:first.html.twig', array());
    }

 /**
 * signup action.
 * @Route("/signup" , name="signup" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:singup.html.twig")
 */
 
     public function createAction(Request $request)
    {
       

 $entity = new Client();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('home'));
        }
       return $this->render('ProjectFilmsBundle:Default:signup.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        )); 


     }
        
         private function createCreateForm(Client $entity)
    {
        $form = $this->createForm(new ClientType(), $entity, array(
            'action' => $this->generateUrl('signup'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Create'));
        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction()
    {
        $entity = new Client();
        $form   = $this->createCreateForm($entity);
        return $this->render('ProjectFilmsBundle:Default:singup.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
}

     public function reviewAction()
    {
        return $this->render('ProjectFilmsBundle:Default:review.html.twig', array());
    }

}

