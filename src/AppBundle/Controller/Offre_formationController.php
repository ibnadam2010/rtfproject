<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Offre_formation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Offre_formation controller.
 *
 * @Route("offre_formation")
 */
class Offre_formationController extends Controller
{
    /**
     * Lists all offre_formation entities.
     *
     * @Route("/", name="offre_formation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offre_formations = $em->getRepository('AppBundle:Offre_formation')->findAll();

        return $this->render('offre_formation/index.html.twig', array(
            'offre_formations' => $offre_formations,
        ));
    }

    /**
     * Creates a new offre_formation entity.
     *
     * @Route("/new", name="offre_formation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $offre_formation = new Offre_formation();
        $form = $this->createForm('AppBundle\Form\Offre_formationType', $offre_formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offre_formation);
            $em->flush();

            //return $this->redirectToRoute('offre_formation_show', array('id' => $offre_formation->getId()));
            return $this->redirectToRoute('offre_formation_index');
        }

        return $this->render('offre_formation/new.html.twig', array(
            'offre_formation' => $offre_formation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offre_formation entity.
     *
     * @Route("/{id}", name="offre_formation_show")
     * @Method("GET")
     */
    public function showAction(Offre_formation $offre_formation)
    {
        $deleteForm = $this->createDeleteForm($offre_formation);

        return $this->render('offre_formation/show.html.twig', array(
            'offre_formation' => $offre_formation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offre_formation entity.
     *
     * @Route("/{id}/edit", name="offre_formation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Offre_formation $offre_formation)
    {
        $deleteForm = $this->createDeleteForm($offre_formation);
        $editForm = $this->createForm('AppBundle\Form\Offre_formationType', $offre_formation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

           // return $this->redirectToRoute('offre_formation_edit', array('id' => $offre_formation->getId()));
            return $this->redirectToRoute('offre_formation_index');
        }

        return $this->render('offre_formation/edit.html.twig', array(
            'offre_formation' => $offre_formation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offre_formation entity.
     *
     * @Route("delete/{id}", name="offre_formation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Offre_formation $offre_formation)
    {
        //$form = $this->createDeleteForm($offre_formation);
        //$form->handleRequest($request);

       // if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offre_formation);
            $em->flush();
        //}

        return $this->redirectToRoute('offre_formation_index');
    }

    /**
     * Creates a form to delete a offre_formation entity.
     *
     * @param Offre_formation $offre_formation The offre_formation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Offre_formation $offre_formation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offre_formation_delete', array('id' => $offre_formation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
