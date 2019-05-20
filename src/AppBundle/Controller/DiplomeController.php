<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Diplome;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Diplome controller.
 *
 * @Route("admin/diplome")
 */
class DiplomeController extends Controller
{
    /**
     * Lists all diplome entities.
     *
     * @Route("/", name="diplome_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $diplomes = $em->getRepository('AppBundle:Diplome')->findAll();

        return $this->render('diplome/index.html.twig', array(
            'diplomes' => $diplomes,
        ));
    }

    /**
     * Creates a new diplome entity.
     *
     * @Route("/new", name="diplome_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $diplome = new Diplome();
        $form = $this->createForm('AppBundle\Form\DiplomeType', $diplome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($diplome);
            $em->flush();

            //return $this->redirectToRoute('diplome_show', array('id' => $diplome->getId()));
            return $this->redirectToRoute('diplome_index');
        }

        return $this->render('diplome/new.html.twig', array(
            'diplome' => $diplome,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a diplome entity.
     *
     * @Route("/{id}", name="diplome_show")
     * @Method("GET")
     */
    public function showAction(Diplome $diplome)
    {
        $deleteForm = $this->createDeleteForm($diplome);

        return $this->render('diplome/show.html.twig', array(
            'diplome' => $diplome,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing diplome entity.
     *
     * @Route("/{id}/edit", name="diplome_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Diplome $diplome)
    {
        $deleteForm = $this->createDeleteForm($diplome);
        $editForm = $this->createForm('AppBundle\Form\DiplomeType', $diplome);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            //return $this->redirectToRoute('diplome_edit', array('id' => $diplome->getId()));
            return $this->redirectToRoute('diplome_index');
        }

        return $this->render('diplome/edit.html.twig', array(
            'diplome' => $diplome,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a diplome entity.
     *
     * @Route("delete/{id}", name="diplome_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Diplome $diplome)
    {
        //$form = $this->createDeleteForm($diplome);
        //$form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($diplome);
            $em->flush();
       // }

        return $this->redirectToRoute('diplome_index');
    }

    /**
     * Creates a form to delete a diplome entity.
     *
     * @param Diplome $diplome The diplome entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Diplome $diplome)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('diplome_delete', array('id' => $diplome->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
