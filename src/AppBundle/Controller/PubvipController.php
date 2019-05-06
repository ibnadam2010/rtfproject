<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pubvip;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pubvip controller.
 *
 * @Route("pubvip")
 */
class PubvipController extends Controller
{
    /**
     * Lists all pubvip entities.
     *
     * @Route("/", name="pubvip_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pubvips = $em->getRepository('AppBundle:Pubvip')->findAll();

        return $this->render('pubvip/index.html.twig', array(
            'pubvips' => $pubvips,
        ));
    }

    /**
     * Creates a new pubvip entity.
     *
     * @Route("/new", name="pubvip_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pubvip = new Pubvip();
        $form = $this->createForm('AppBundle\Form\PubvipType', $pubvip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pubvip);
            $em->flush();

            return $this->redirectToRoute('pubvip_show', array('id' => $pubvip->getId()));
        }

        return $this->render('pubvip/new.html.twig', array(
            'pubvip' => $pubvip,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pubvip entity.
     *
     * @Route("/{id}", name="pubvip_show")
     * @Method("GET")
     */
    public function showAction(Pubvip $pubvip)
    {
        $deleteForm = $this->createDeleteForm($pubvip);

        return $this->render('pubvip/show.html.twig', array(
            'pubvip' => $pubvip,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pubvip entity.
     *
     * @Route("/{id}/edit", name="pubvip_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pubvip $pubvip)
    {
        $deleteForm = $this->createDeleteForm($pubvip);
        $editForm = $this->createForm('AppBundle\Form\PubvipType', $pubvip);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pubvip_index');
        }

        return $this->render('pubvip/edit.html.twig', array(
            'pubvip' => $pubvip,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pubvip entity.
     *
     * @Route("delete/{id}", name="pubvip_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pubvip $pubvip)
    {

            $em = $this->getDoctrine()->getManager();
            $em->remove($pubvip);
            $em->flush();


        return $this->redirectToRoute('pubvip_index');
    }

    /**
     * Creates a form to delete a pubvip entity.
     *
     * @param Pubvip $pubvip The pubvip entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pubvip $pubvip)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pubvip_delete', array('id' => $pubvip->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
