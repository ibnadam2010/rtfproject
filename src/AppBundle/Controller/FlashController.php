<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Flash;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Flash controller.
 *
 * @Route("flash")
 */
class FlashController extends Controller
{
    /**
     * Lists all flash entities.
     *
     * @Route("/", name="flash_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $flashes = $em->getRepository('AppBundle:Flash')->findAll();

        return $this->render('flash/index.html.twig', array(
            'flashes' => $flashes,
        ));
    }

    /**
     * Creates a new flash entity.
     *
     * @Route("/new", name="flash_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $flash = new Flash();
        $form = $this->createForm('AppBundle\Form\FlashType', $flash);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($flash);
            $em->flush();

            return $this->redirectToRoute('flash_show', array('id' => $flash->getId()));
        }

        return $this->render('flash/new.html.twig', array(
            'flash' => $flash,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a flash entity.
     *
     * @Route("/{id}", name="flash_show")
     * @Method("GET")
     */
    public function showAction(Flash $flash)
    {
        $deleteForm = $this->createDeleteForm($flash);

        return $this->render('flash/show.html.twig', array(
            'flash' => $flash,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing flash entity.
     *
     * @Route("/{id}/edit", name="flash_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Flash $flash)
    {
        $deleteForm = $this->createDeleteForm($flash);
        $editForm = $this->createForm('AppBundle\Form\FlashType', $flash);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('flash_edit', array('id' => $flash->getId()));
        }

        return $this->render('flash/edit.html.twig', array(
            'flash' => $flash,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a flash entity.
     *
     * @Route("/{id}", name="flash_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Flash $flash)
    {
        $form = $this->createDeleteForm($flash);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($flash);
            $em->flush();
        }

        return $this->redirectToRoute('flash_index');
    }

    /**
     * Creates a form to delete a flash entity.
     *
     * @param Flash $flash The flash entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Flash $flash)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('flash_delete', array('id' => $flash->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
