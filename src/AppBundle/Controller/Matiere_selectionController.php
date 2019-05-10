<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Matiere_selection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Matiere_selection controller.
 *
 * @Route("matiere_selection")
 */
class Matiere_selectionController extends Controller
{
    /**
     * Lists all matiere_selection entities.
     *
     * @Route("/", name="matiere_selection_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $matiere_selections = $em->getRepository('AppBundle:Matiere_selection')->findAll();

        return $this->render('matiere_selection/index.html.twig', array(
            'matiere_selections' => $matiere_selections,
        ));
    }

    /**
     * Creates a new matiere_selection entity.
     *
     * @Route("/new", name="matiere_selection_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $matiere_selection = new Matiere_selection();
        $form = $this->createForm('AppBundle\Form\Matiere_selectionType', $matiere_selection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($matiere_selection);
            $em->flush();

            //return $this->redirectToRoute('matiere_selection_show', array('id' => $matiere_selection->getId()));
            return $this->redirectToRoute('matiere_selection_index');
        }

        return $this->render('matiere_selection/new.html.twig', array(
            'matiere_selection' => $matiere_selection,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a matiere_selection entity.
     *
     * @Route("/{id}", name="matiere_selection_show")
     * @Method("GET")
     */
    public function showAction(Matiere_selection $matiere_selection)
    {
        $deleteForm = $this->createDeleteForm($matiere_selection);

        return $this->render('matiere_selection/show.html.twig', array(
            'matiere_selection' => $matiere_selection,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing matiere_selection entity.
     *
     * @Route("/{id}/edit", name="matiere_selection_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Matiere_selection $matiere_selection)
    {
        $deleteForm = $this->createDeleteForm($matiere_selection);
        $editForm = $this->createForm('AppBundle\Form\Matiere_selectionType', $matiere_selection);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

           // return $this->redirectToRoute('matiere_selection_edit', array('id' => $matiere_selection->getId()));
            return $this->redirectToRoute('matiere_selection_index');
        }

        return $this->render('matiere_selection/edit.html.twig', array(
            'matiere_selection' => $matiere_selection,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a matiere_selection entity.
     *
     * @Route("delete/{id}", name="matiere_selection_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Matiere_selection $matiere_selection)
    {
        //$form = $this->createDeleteForm($matiere_selection);
        //$form->handleRequest($request);

       // if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($matiere_selection);
            $em->flush();
       // }

        return $this->redirectToRoute('matiere_selection_index');
    }

    /**
     * Creates a form to delete a matiere_selection entity.
     *
     * @param Matiere_selection $matiere_selection The matiere_selection entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Matiere_selection $matiere_selection)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('matiere_selection_delete', array('id' => $matiere_selection->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
