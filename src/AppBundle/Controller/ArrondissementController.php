<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Arrondissement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Arrondissement controller.
 *
 * @Route("arrondissement")
 */
class ArrondissementController extends Controller
{
    /**
     * Lists all arrondissement entities.
     *
     * @Route("/", name="index_arrondissement")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $arrondissements = $em->getRepository('AppBundle:Arrondissement')->findAll();

        return $this->render('arrondissement/index.html.twig', array(
            'arrondissements' => $arrondissements,
        ));
    }

    /**
     * Creates a new arrondissement entity.
     *
     * @Route("/new", name="arrondissement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $arrondissement = new Arrondissement();
        $form = $this->createForm('AppBundle\Form\ArrondissementType', $arrondissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($arrondissement);
            $em->flush();

//return $this->redirectToRoute('arrondissement_show', array('id' => $arrondissement->getId()));
            return $this->redirectToRoute('index_arrondissement');
        }

        return $this->render('arrondissement/new.html.twig', array(
            'arrondissement' => $arrondissement,
            'form' => $form->createView(),
        ));

    }

    /**
     * Finds and displays a arrondissement entity.
     *
     * @Route("/{id}", name="arrondissement_show")
     * @Method("GET")
     */
    public function showAction(Arrondissement $arrondissement)
    {
        $deleteForm = $this->createDeleteForm($arrondissement);

        return $this->render('arrondissement/show.html.twig', array(
            'arrondissement' => $arrondissement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing arrondissement entity.
     *
     * @Route("/{id}/edit", name="arrondissement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Arrondissement $arrondissement)
    {
        $deleteForm = $this->createDeleteForm($arrondissement);
        $editForm = $this->createForm('AppBundle\Form\ArrondissementType', $arrondissement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            //return $this->redirectToRoute('arrondissement_edit', array('id' => $arrondissement->getId()));
            return $this->redirectToRoute('index_arrondissement');
        }

        return $this->render('arrondissement/edit.html.twig', array(
            'arrondissement' => $arrondissement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a arrondissement entity.
     *
     * @Route("/{id}", name="arrondissement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Arrondissement $arrondissement)
    {
        $form = $this->createDeleteForm($arrondissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($arrondissement);
            $em->flush();
        }

        return $this->redirectToRoute('arrondissement_index');
    }

    /**
     * Creates a form to delete a arrondissement entity.
     *
     * @param Arrondissement $arrondissement The arrondissement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Arrondissement $arrondissement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('arrondissement_delete', array('id' => $arrondissement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
