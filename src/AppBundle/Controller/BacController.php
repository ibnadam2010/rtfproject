<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bac;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bac controller.
 *
 * @Route("admin/bac")
 */
class BacController extends Controller
{
    /**
     * Lists all bac entities.
     *
     * @Route("/", name="bac_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bacs = $em->getRepository('AppBundle:Bac')->findAll();

        return $this->render('bac/index.html.twig', array(
            'bacs' => $bacs,
        ));
    }

    /**
     * Creates a new bac entity.
     *
     * @Route("/new", name="bac_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bac = new Bac();
        $form = $this->createForm('AppBundle\Form\BacType', $bac);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bac);
            $em->flush();

            //return $this->redirectToRoute('bac_show', array('id' => $bac->getId()));
            return $this->redirectToRoute('bac_index');
        }

        return $this->render('bac/new.html.twig', array(
            'bac' => $bac,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bac entity.
     *
     * @Route("/{id}", name="bac_show")
     * @Method("GET")
     */
    public function showAction(Bac $bac)
    {
        $deleteForm = $this->createDeleteForm($bac);

        return $this->render('bac/show.html.twig', array(
            'bac' => $bac,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bac entity.
     *
     * @Route("/{id}/edit", name="bac_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bac $bac)
    {
        $deleteForm = $this->createDeleteForm($bac);
        $editForm = $this->createForm('AppBundle\Form\BacType', $bac);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            //return $this->redirectToRoute('bac_edit', array('id' => $bac->getId()));
            return $this->redirectToRoute('bac_index');
        }

        return $this->render('bac/edit.html.twig', array(
            'bac' => $bac,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bac entity.
     *
     * @Route("delete/{id}", name="bac_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bac $bac)
    {
       // $form = $this->createDeleteForm($bac);
       // $form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bac);
            $em->flush();
        //}

        return $this->redirectToRoute('bac_index');
    }

    /**
     * Creates a form to delete a bac entity.
     *
     * @param Bac $bac The bac entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bac $bac)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bac_delete', array('id' => $bac->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
