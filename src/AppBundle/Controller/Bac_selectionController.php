<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bac_selection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bac_selection controller.
 *
 * @Route("admin/bac_selection")
 */
class Bac_selectionController extends Controller
{
    /**
     * Lists all bac_selection entities.
     *
     * @Route("/", name="bac_selection_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bac_selections = $em->getRepository('AppBundle:Bac_selection')->findAll();

        return $this->render('bac_selection/index.html.twig', array(
            'bac_selections' => $bac_selections,
        ));
    }

    /**
     * Creates a new bac_selection entity.
     *
     * @Route("/new", name="bac_selection_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bac_selection = new Bac_selection();
        $form = $this->createForm('AppBundle\Form\Bac_selectionType', $bac_selection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bac_selection);
            $em->flush();

            //return $this->redirectToRoute('bac_selection_show', array('id' => $bac_selection->getId()));
            return $this->redirectToRoute('bac_selection_index');
        }

        return $this->render('bac_selection/new.html.twig', array(
            'bac_selection' => $bac_selection,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bac_selection entity.
     *
     * @Route("/{id}", name="bac_selection_show")
     * @Method("GET")
     */
    public function showAction(Bac_selection $bac_selection)
    {
        $deleteForm = $this->createDeleteForm($bac_selection);

        return $this->render('bac_selection/show.html.twig', array(
            'bac_selection' => $bac_selection,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bac_selection entity.
     *
     * @Route("/{id}/edit", name="bac_selection_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bac_selection $bac_selection)
    {
        $deleteForm = $this->createDeleteForm($bac_selection);
        $editForm = $this->createForm('AppBundle\Form\Bac_selectionType', $bac_selection);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

           // return $this->redirectToRoute('bac_selection_edit', array('id' => $bac_selection->getId()));
            return $this->redirectToRoute('bac_selection_index');
        }

        return $this->render('bac_selection/edit.html.twig', array(
            'bac_selection' => $bac_selection,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bac_selection entity.
     *
     * @Route("delete/{id}", name="bac_selection_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bac_selection $bac_selection)
    {
       // $form = $this->createDeleteForm($bac_selection);
        //$form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bac_selection);
            $em->flush();
       // }

        return $this->redirectToRoute('bac_selection_index');
    }

    /**
     * Creates a form to delete a bac_selection entity.
     *
     * @param Bac_selection $bac_selection The bac_selection entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bac_selection $bac_selection)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bac_selection_delete', array('id' => $bac_selection->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
