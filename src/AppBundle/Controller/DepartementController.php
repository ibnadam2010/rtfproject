<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Departement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Departement controller.
 *
 * @Route("departement")
 */
class DepartementController extends Controller
{
    /**
     * Lists all departement entities.
     *
     * @Route("/", name="index_departement")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $departements = $em->getRepository('AppBundle:Departement')->findAll();
        return $this->render('departement/index.html.twig', array(
            'departements' => $departements,
        ));
    }

    /**
     * Creates a new departement entity.
     *
     * @Route("/new", name="departement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $departement = new Departement();
        $form = $this->createForm('AppBundle\Form\DepartementType', $departement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $departement->setDateEnreg(new \DateTime('now'));
            $em->persist($departement);
            $em->flush();
            return $this->redirectToRoute('gestion_departement');
        }

        return $this->render('departement/index.html.twig', array(
            'form' => $form->createView()
        ));
    }


    /**
     * Displays a form to edit an existing departement entity.
     *
     * @Route("/departement/edit", name="update_departements")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request)
    {
        $nom = $request->get('nom');
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $departement = $em->getRepository('AppBundle:Departement')->find(intval($id));
        $departement->setNomDepartement($nom);
        $em->persist($departement);
        $em->flush();
        return $this->redirectToRoute('gestion_departement');
    }

    /**
     * Deletes a departement entity.
     *
     * @Route("/departement/delete/{id} ", name="departement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Departement $departement)
    {
            $form = $this->createDeleteForm($departement);
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->remove($departement);
            $em->flush();


        return $this->redirectToRoute('gestion_departement');
    }

    /**
     * Creates a form to delete a departement entity.
     *
     * @param Departement $departement The departement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Departement $departement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('departement_delete', array('id' => $departement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
