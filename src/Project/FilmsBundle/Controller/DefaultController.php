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
use Project\FilmsBundle\Form\ClientType;
use Project\FilmsBundle\Form\ReviewType;

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
                         return $this->redirect($this->generateUrl('home', array()));
                }
        return $this->render('ProjectFilmsBundle:Default:review.html.twig',  array('form' => $form->createView()));
    }
       


 public function listreviewsAction()
{

        $em = $this->getDoctrine()->getManager();
        $refleksjeRepository = $em->getRepository("ProjectFilmsBundle:Review");
        $refleksja = $refleksjeRepository->findAll();
        return $this->render('ProjectFilmsBundle:Reflection:listreviews.html.twig', array('review' => $refleksja));
    

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
    
    
       
//          $session=$this->getRequest()->getSession();
//          $em = $this->getDoctrine()->getEntityManager();
//          $repository = $em->getRepository('Project\FilmsBundle\Entity\Client');
        
//          if($session->has('username')){
//                 // $username = $session->get('username');
//                 $username=$username->getUsername();
//                  $password=$username->getPassword();
//                  $userr = $repository->findOneBy(array('username'=>$username,'password'=>$password));
                
//                  $a=$_SERVER['HTTP_REFERER'];
//                  $tokens = explode('/', $a);
//                  $mid = $tokens[sizeof($tokens)-1];
//                  $m=(int)$mid;
                
//                  $con=pg_connect("host=sbazy user=s175517 dbname=s175517 password=jjSKMFv6");
//                  $q="Select client_id from client where username='$username'";
//                  $r=pg_exec($con,$q);
//                  $cid = pg_fetch_result($r, 0, 0);
//                  $c=(int)$cid;
                
//                  $rv=$request->get('review');
                
//                  $query = "INSERT INTO review(review,film_id, client_id, ) VALUES ('$rv', $m,$c );";
//                  $r=pg_exec($con,$query);
//                  echo "<script type='text/javascript'>alert('Review was submitted!');</script>";
//                  switch($mid){
//                      case 1:
//                          $mo='hobbit';
//                          break;
//                  }

                  
//                  if($userr){
                     
//                       return $this->render("ProjectFilmsBundle:Default:hobbit.html.twig", array());
//                  }
               
           
// return $this->render("ProjectFilmsBundle:Default:hobbit.html.twig", array());
// }    


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
    

}

