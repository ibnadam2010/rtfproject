<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Agencertf;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Agencertf controller.
 *
 * @Route("agencertf")
 */
class AgencertfController extends Controller
{
    /**
     * Lists all agencertf entities.
     *
     * @Route("/", name="agencertf_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $agencertfs = $em->getRepository('AppBundle:Agencertf')->findAll();

        return $this->render('agencertf/index.html.twig', array(
            'agencertfs' => $agencertfs,
        ));
    }

    /**
     * Creates a new agencertf entity.
     *
     * @Route("/new", name="agencertf_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $agencertf = new Agencertf();
        $form = $this->createForm('AppBundle\Form\AgencertfType', $agencertf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agencertf);
            $em->flush();

            return $this->redirectToRoute('agencertf_show', array('id' => $agencertf->getId()));
           // return $this->redirectToRoute('agencertf_index');
        }

        return $this->render('agencertf/new.html.twig', array(
            'agencertf' => $agencertf,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a agencertf entity.
     *
     * @Route("/{id}", name="agencertf_show")
     * @Method("GET")
     */
    public function showAction(Agencertf $agencertf)
    {
        $deleteForm = $this->createDeleteForm($agencertf);

        return $this->render('agencertf/show.html.twig', array(
            'agencertf' => $agencertf,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing agencertf entity.
     *
     * @Route("/{id}/edit", name="agencertf_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Agencertf $agencertf)
    {
        $deleteForm = $this->createDeleteForm($agencertf);
        $editForm = $this->createForm('AppBundle\Form\AgencertfType', $agencertf);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

           // return $this->redirectToRoute('agencertf_edit', array('id' => $agencertf->getId()));
            return $this->redirectToRoute('agencertf_index');
        }

        return $this->render('agencertf/edit.html.twig', array(
            'agencertf' => $agencertf,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a agencertf entity.
     *
     * @Route("delete/{id}", name="agencertf_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Agencertf $agencertf)
    {
        //$form = $this->createDeleteForm($agencertf);
        //$form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($agencertf);
            $em->flush();
       // }

        return $this->redirectToRoute('agencertf_index');
    }

    /**
     * Creates a form to delete a agencertf entity.
     *
     * @param Agencertf $agencertf The agencertf entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Agencertf $agencertf)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agencertf_delete', array('id' => $agencertf->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
