<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Epreuve_bac;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Epreuve_bac controller.
 *
 * @Route("epreuve_bac")
 */
class Epreuve_bacController extends Controller
{
    /**
     * Lists all epreuve_bac entities.
     *
     * @Route("/", name="epreuve_bac_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $epreuve_bacs = $em->getRepository('AppBundle:Epreuve_bac')->findAll();

        return $this->render('epreuve_bac/index.html.twig', array(
            'epreuve_bacs' => $epreuve_bacs,
        ));
    }

    /**
     * Creates a new epreuve_bac entity.
     *
     * @Route("/new", name="epreuve_bac_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $epreuve_bac = new Epreuve_bac();
        $form = $this->createForm('AppBundle\Form\Epreuve_bacType', $epreuve_bac);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($epreuve_bac);
            $em->flush();

            //return $this->redirectToRoute('epreuve_bac_show', array('id' => $epreuve_bac->getId()));

            return $this->redirectToRoute('epreuve_bac_index');
        }

        return $this->render('epreuve_bac/new.html.twig', array(
            'epreuve_bac' => $epreuve_bac,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a epreuve_bac entity.
     *
     * @Route("/{id}", name="epreuve_bac_show")
     * @Method("GET")
     */
    public function showAction(Epreuve_bac $epreuve_bac)
    {
        $deleteForm = $this->createDeleteForm($epreuve_bac);

        return $this->render('epreuve_bac/show.html.twig', array(
            'epreuve_bac' => $epreuve_bac,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing epreuve_bac entity.
     *
     * @Route("/{id}/edit", name="epreuve_bac_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Epreuve_bac $epreuve_bac)
    {
        $deleteForm = $this->createDeleteForm($epreuve_bac);
        $editForm = $this->createForm('AppBundle\Form\Epreuve_bacType', $epreuve_bac);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

           // return $this->redirectToRoute('epreuve_bac_edit', array('id' => $epreuve_bac->getId()));
            return $this->redirectToRoute('epreuve_bac_index');
        }

        return $this->render('epreuve_bac/edit.html.twig', array(
            'epreuve_bac' => $epreuve_bac,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a epreuve_bac entity.
     *
     * @Route("delete/{id}", name="epreuve_bac_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Epreuve_bac $epreuve_bac)
    {
       // $form = $this->createDeleteForm($epreuve_bac);
       // $form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($epreuve_bac);
            $em->flush();
       // }

        return $this->redirectToRoute('epreuve_bac_index');
    }

    /**
     * Creates a form to delete a epreuve_bac entity.
     *
     * @param Epreuve_bac $epreuve_bac The epreuve_bac entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Epreuve_bac $epreuve_bac)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('epreuve_bac_delete', array('id' => $epreuve_bac->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
