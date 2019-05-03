<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cycle_etablissement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cycle_etablissement controller.
 *
 * @Route("cycle_etablissement")
 */
class Cycle_etablissementController extends Controller
{
    /**
     * Lists all cycle_etablissement entities.
     *
     * @Route("/", name="cycle_etablissement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cycle_etablissements = $em->getRepository('AppBundle:Cycle_etablissement')->findAll();

        return $this->render('cycle_etablissement/index.html.twig', array(
            'cycle_etablissements' => $cycle_etablissements,
        ));
    }

    /**
     * Creates a new cycle_etablissement entity.
     *
     * @Route("/new", name="cycle_etablissement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cycle_etablissement = new Cycle_etablissement();
        $form = $this->createForm('AppBundle\Form\Cycle_etablissementType', $cycle_etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cycle_etablissement);
            $em->flush();

            return $this->redirectToRoute('cycle_etablissement_show', array('id' => $cycle_etablissement->getId()));
        }

        return $this->render('cycle_etablissement/new.html.twig', array(
            'cycle_etablissement' => $cycle_etablissement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cycle_etablissement entity.
     *
     * @Route("/{id}", name="cycle_etablissement_show")
     * @Method("GET")
     */
    public function showAction(Cycle_etablissement $cycle_etablissement)
    {
        $deleteForm = $this->createDeleteForm($cycle_etablissement);

        return $this->render('cycle_etablissement/show.html.twig', array(
            'cycle_etablissement' => $cycle_etablissement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cycle_etablissement entity.
     *
     * @Route("/{id}/edit", name="cycle_etablissement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cycle_etablissement $cycle_etablissement)
    {
        $deleteForm = $this->createDeleteForm($cycle_etablissement);
        $editForm = $this->createForm('AppBundle\Form\Cycle_etablissementType', $cycle_etablissement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cycle_etablissement_edit', array('id' => $cycle_etablissement->getId()));
        }

        return $this->render('cycle_etablissement/edit.html.twig', array(
            'cycle_etablissement' => $cycle_etablissement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cycle_etablissement entity.
     *
     * @Route("delete/{id}", name="cycle_etablissement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cycle_etablissement $cycle_etablissement)
    {
        //$form = $this->createDeleteForm($cycle_etablissement);
        //$form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cycle_etablissement);
            $em->flush();
       // }

        return $this->redirectToRoute('cycle_etablissement_index');
    }

    /**
     * Creates a form to delete a cycle_etablissement entity.
     *
     * @param Cycle_etablissement $cycle_etablissement The cycle_etablissement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cycle_etablissement $cycle_etablissement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cycle_etablissement_delete', array('id' => $cycle_etablissement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
