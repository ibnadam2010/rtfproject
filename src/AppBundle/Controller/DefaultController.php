<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Departement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

	
	
	/**
     * @Route("/admin", name="administration")
     */
    public function adminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/admin.html.twig');
    }

    /**
     * @Route("/sixieme", name="link_sixieme")
     */
    public function sixiemeAction(Request $request)
    {
       
    $pro = 1;
        // replace this example code with whatever you need
        //return $this->render('default/troisieme.html.twig');
    $em = $this->getDoctrine()->getManager();

        //$programmes = $em->getRepository('AppBundle:Programme')->findAll();
    $programmes = $em->getRepository('AppBundle:Programme')->findBy(array('promotion'=>$pro));

    return $this->render('default/sixieme.html.twig', array('programmes' => $programmes));

    }

    /**
     * @Route("/cinquieme", name="link_cinquieme")
     */
    public function cinqiemeAction(Request $request)
    {
        // replace this example code with whatever you need
        $pro = 2;
        
    $em = $this->getDoctrine()->getManager();

    $programmes = $em->getRepository('AppBundle:Programme')->findBy(array('promotion'=>$pro));

    return $this->render('default/cinquieme.html.twig', array('programmes' => $programmes));
    }


    /**
     * @Route("/quatrieme", name="link_quatrieme")
     */
    public function quatriemeAction(Request $request)
    {
        // replace this example code with whatever you need
        $pro = 3;
        
    $em = $this->getDoctrine()->getManager();

        
    $programmes = $em->getRepository('AppBundle:Programme')->findBy(array('promotion'=>$pro));

    return $this->render('default/quatrieme.html.twig', array('programmes' => $programmes));
    }


    /**
     * @Route("/troisieme", name="link_troisieme")
     */
    public function troisiemeAction(Request $request)
    {
        // replace this example code with whatever you need
        $pro = 4;
        
    $em = $this->getDoctrine()->getManager();

    $programmes = $em->getRepository('AppBundle:Programme')->findBy(array('promotion'=>$pro));

    return $this->render('default/troisieme.html.twig', array('programmes' => $programmes));
    }



    /**
     * @Route("/seconde", name="link_seconde")
     */
    public function secondeAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/seconde.html.twig');
    }



    /**
     * @Route("/premiere", name="link_premiere")
     */
    public function premiereAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/premiere.html.twig');
    }


    /**
     * @Route("/terminale", name="link_terminale")
     */
    public function terminaleAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/terminale.html.twig');
    }


    /**
     * @Route("/cours_exercice", name="link_coursetexercice")
     */
    public function coursAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/cours_exercice.html.twig');
    }


    /**
     * @Route("/bepc", name="link_bepc")
     */
    public function bepcAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/bepc.html.twig');
    }


    /**
     * @Route("/bac", name="link_bac")
     */
    public function bacAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/bac.html.twig');
    }


    /**
     * @Route("/repetiteur", name="link_repetiteur")
     */
    public function repetiteurAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/repetiteur.html.twig');
    }


    /**
     * @Route("/annuaire/college", name="link_annuaire_college")
     */
    public function annuaireCollegeAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/annuaire_college.html.twig');
    }

    /**
     * @Route("/sixieme/ouvrage", name="link_sixieme_ouvrage")
     */
    public function sixiemeOuvrageAction(Request $request)
    {
        $pro=1;
        // replace this example code with whatever you need
        $em = $this->getDoctrine()->getManager();

        $ouvrages = $em->getRepository('AppBundle:Ouvrage')->findBy(array('promotion'=>$pro));

        return $this->render('ouvrage/sixieme_ouvrage.html.twig', array(
            'ouvrages' => $ouvrages,
        ));
        //return $this->render('ouvrage/sixieme_ouvrage.html.twig');
    }
	

}
