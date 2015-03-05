<?php
namespace Project\FilmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Project\FilmsBundle\Entity\Client;
use Project\FilmsBundle\Entity\Film;
use Project\FilmsBundle\Entity\Review;
use Project\FilmsBundle\Entity\Orders;
use Project\FilmsBundle\Form\ClientType;
use Project\FilmsBundle\Form\ReviewType;
use Project\FilmsBundle\Form\OrdersType;

class DefaultController extends Controller
{

    private $mid;
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
 * hobbit film action.
 * @Route("/hobbit" , name="hobbit" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:hobbit.html.twig")
 */
     public function hobbitAction()
    {
        return $this->render('ProjectFilmsBundle:Default:hobbit.html.twig', array());
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
            return $this->redirect($this->generateUrl('login'));
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

     // public function reviewAction()
     // {
     //     return $this->render('ProjectFilmsBundle:Default:review.html.twig', array());
     // }

public function getRefererRoute()
  {
    $request = $this->getRequest();

    //look for the referer route
    $referer = $request->headers->get('referer');
    $lastPath = substr($referer, strpos($referer, $request->getBaseUrl()));
    $lastPath = str_replace($request->getBaseUrl(), '', $lastPath);

    $matcher = $this->get('router')->getMatcher();
    $parameters = $matcher->match($lastPath);
    $route = $parameters['_route'];

    return $route;
  }


public function reviewAction(Request $request){

  $refleksja = new Review();
        $refleksja->setAuthor($this->getUser()->getUsername());
        $form = $this->createForm(new ReviewType(), $refleksja);
        if ($request->isMethod('POST')
                && $form->handleRequest($request)
                && $form->isValid()
                ) {
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($refleksja);
                        $em->flush();

        //                 $ruta = $this->getRefererRoute();

        // $locale = $request->get('_locale');
        // $url = $this->get('router')->generate($ruta, array('_locale' => $locale));

        // $this->getRequest()->getSession()->setFlash('notice', "your_message");   

        // return $this->redirect($url);
             

                         

                        return $this->redirect($this->generateUrl('home', array()));
                }
        return $this->render('ProjectFilmsBundle:Default:review.html.twig',  array('form' => $form->createView()));
    }
       


 public function listreviewsAction()
{

        $em = $this->getDoctrine()->getManager();
        $refleksjeRepository = $em->getRepository("ProjectFilmsBundle:Review");
        $refleksja = $refleksjeRepository->findAll();
        return $this->render('ProjectFilmsBundle:Default:listreviews.html.twig', array('review' => $refleksja));
    
    //   $product = $this->getDoctrine()
    //     ->getRepository('Project\FilmsBundle:Review')
    //     ->find($id);

    // if (!$product) {
    //     throw $this->createNotFoundException(
    //         'No product found for id '.$id
    //     );
    // }

    // ... do something, like pass the $product object into a template
}
    


        public function loginAction(Request $request)
    {
        $session = $request->getSession();
        // get the login error if there is one
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
            );
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }
        return $this->render(
            'ProjectFilmsBundle:Default:login.html.twig',
            array(
                'error'         => $error,
            )
        );
    }

     public function loginCheckAction()
    {
    }
    

    /**
 * all film action.
 * @Route("/all" , name="all" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Films:all.html.twig")
 */
     public function allAction()
    {
        return $this->render('ProjectFilmsBundle:Films:all.html.twig', array());
    }

      /**
 * action film action.
 * @Route("/action" , name="action" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Films:action.html.twig")
 */
     public function actionAction()
    {
        return $this->render('ProjectFilmsBundle:Films:action.html.twig', array());
    }

 /**
 * comedy film action.
 * @Route("/comedy" , name="comedy" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Films:comedy.html.twig")
 */
     public function comedyAction()
    {
        return $this->render('ProjectFilmsBundle:Films:comedy.html.twig', array());
    }

     /**
 * drama film action.
 * @Route("/drama" , name="drama" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Films:drama.html.twig")
 */
     public function dramaAction()
    {
        return $this->render('ProjectFilmsBundle:Films:drama.html.twig', array());
    }

     /**
 * fantasy film action.
 * @Route("/fantasy" , name="fantasy" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Films:fantasy.html.twig")
 */
     public function fantasyAction()
    {
        return $this->render('ProjectFilmsBundle:Films:fantasy.html.twig', array());
    }

     /**
 * mystery film action.
 * @Route("/mystery" , name="mystery" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Films:mystery.html.twig")
 */
     public function mysteryAction()
    {
        return $this->render('ProjectFilmsBundle:Films:mystery.html.twig', array());
    }

         /**
 * scifi film action.
 * @Route("/scifi" , name="scifi" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Films:scifi.html.twig")
 */
     public function scifiAction()
    {
        return $this->render('ProjectFilmsBundle:Films:scifi.html.twig', array());
    }

 /**
 * borrow film action.
 * @Route("/borrow" , name="borrow" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:borrow.html.twig")
 */
     public function borrowAction(Request $request)
    {

        $refleksja = new Orders();
        $refleksja->setClientname($this->getUser()->getUsername());
        $form = $this->createForm(new OrdersType(), $refleksja);
        if ($request->isMethod('POST')
                && $form->handleRequest($request)
                && $form->isValid()
                ) {
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($refleksja);
                        $em->flush();

   

                         return $this->redirect($this->generateUrl('home', array()));
                }
        return $this->render('ProjectFilmsBundle:Default:borrow.html.twig',  array('form' => $form->createView()));
    
       
    
}


public function listorderAction()
{




$em = $this->getDoctrine()->getManager();
         $refleksjeRepository = $em->getRepository("ProjectFilmsBundle:Orders");
      $refleksja = $refleksjeRepository->findAll();

   
        return $this->render('ProjectFilmsBundle:Default:listorder.html.twig', array('orders' => $refleksja));
    

}



/**
 * bird film action.
 * @Route("/bird" , name="bird" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:bird.html.twig")
 */
     public function birdAction()
    {
        return $this->render('ProjectFilmsBundle:Default:bird.html.twig', array());
    }

/**
 * div film action.
 * @Route("/div" , name="div" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:div.html.twig")
 */
     public function divAction()
    {
        return $this->render('ProjectFilmsBundle:Default:div.html.twig', array());
    }

/**
 * edge film action.
 * @Route("/edge" , name="edge" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:edge.html.twig")
 */
     public function edgeAction()
    {
        return $this->render('ProjectFilmsBundle:Default:edge.html.twig', array());
    }


/**
 * gone film action.
 * @Route("/gone" , name="gone" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:gone.html.twig")
 */
     public function goneAction()
    {
        return $this->render('ProjectFilmsBundle:Default:gone.html.twig', array());
    }

/**
 * gurd film action.
 * @Route("/gurd " , name="gurd" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:gurd.html.twig")
 */
     public function gurdAction()
    {
        return $this->render('ProjectFilmsBundle:Default:gurd.html.twig', array());
    }

/**
 * hung film action.
 * @Route("/hung " , name="hung" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:hung.html.twig")
 */
     public function hungAction()
    {
        return $this->render('ProjectFilmsBundle:Default:hung.html.twig', array());
    }

    /**
 * int film action.
 * @Route("/int " , name="int" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:int.html.twig")
 */
     public function intAction()
    {
        return $this->render('ProjectFilmsBundle:Default:int.html.twig', array());
    }
       /**
 * jur film action.
 * @Route("/jur " , name="jur" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:jur.html.twig")
 */
     public function jurAction()
    {
        return $this->render('ProjectFilmsBundle:Default:jur.html.twig', array());
    }

           /**
 * king film action.
 * @Route("/king " , name="king" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:king.html.twig")
 */
     public function kingAction()
    {
        return $this->render('ProjectFilmsBundle:Default:king.html.twig', array());
    }

               /**
 * luce film action.
 * @Route("/luce " , name="luce" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:luce.html.twig")
 */
     public function luceAction()
    {
        return $this->render('ProjectFilmsBundle:Default:luce.html.twig', array());
    }

              /**
 * maze film action.
 * @Route("/maze " , name="maze" )
 * @Method({"GET", "POST"})
 * @Template("ProjectFilmsBundle:Default:maze.html.twig")
 */
     public function mazeAction()
    {
        return $this->render('ProjectFilmsBundle:Default:maze.html.twig', array());
    }


}
