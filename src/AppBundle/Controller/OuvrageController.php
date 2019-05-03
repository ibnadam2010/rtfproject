<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ouvrage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ouvrage controller.
 *
 * @Route("ouvrage")
 */
class OuvrageController extends Controller
{
    /**
     * Lists all ouvrage entities.
     *
     * @Route("/", name="index_ouvrage")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ouvrages = $em->getRepository('AppBundle:Ouvrage')->findAll();

        return $this->render('ouvrage/index.html.twig', array(
            'ouvrages' => $ouvrages,
        ));
    }

    /**
     * Creates a new ouvrage entity.
     *
     * @Route("/new", name="ouvrage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ouvrage = new Ouvrage();
        $form = $this->createForm('AppBundle\Form\OuvrageType', $ouvrage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ouvrage);
            $em->flush();

            return $this->redirectToRoute('index_ouvrage', array('id' => $ouvrage->getId()));
        }

        return $this->render('ouvrage/new.html.twig', array(
            'ouvrage' => $ouvrage,
            'form' => $form->createView(),
        ));
        
       // return $this->redirectToRoute('index_ouvrage');
    }

    /**
     * Finds and displays a ouvrage entity.
     *
     * @Route("/{id}", name="ouvrage_show")
     * @Method("GET")
     */
    public function showAction(Ouvrage $ouvrage)
    {
        $deleteForm = $this->createDeleteForm($ouvrage);

        return $this->render('ouvrage/show.html.twig', array(
            'ouvrage' => $ouvrage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ouvrage entity.
     *
     * @Route("/{id}/edit", name="ouvrage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ouvrage $ouvrage)
    {
        $deleteForm = $this->createDeleteForm($ouvrage);
        $editForm = $this->createForm('AppBundle\Form\OuvrageType', $ouvrage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            //return $this->redirectToRoute('ouvrage_edit', array('id' => $ouvrage->getId()));
            return $this->redirectToRoute('index_ouvrage');
        }

        return $this->render('ouvrage/edit.html.twig', array(
            'ouvrage' => $ouvrage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ouvrage entity.
     *
     * @Route("delete/{id}", name="ouvrage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ouvrage $ouvrage)
    {
        //$form = $this->createDeleteForm($ouvrage);
        //$form->handleRequest($request);

       // if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ouvrage);
            $em->flush();
        //}

        //return $this->redirectToRoute('ouvrage_index');
        return $this->redirectToRoute('index_ouvrage');
    }

    /**
     * Creates a form to delete a ouvrage entity.
     *
     * @param Ouvrage $ouvrage The ouvrage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ouvrage $ouvrage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ouvrage_delete', array('id' => $ouvrage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
