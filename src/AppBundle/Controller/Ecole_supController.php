<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ecole_sup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ecole_sup controller.
 *
 * @Route("ecole_sup")
 */
class Ecole_supController extends Controller
{
    /**
     * Lists all ecole_sup entities.
     *
     * @Route("/", name="ecole_sup_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecole_sups = $em->getRepository('AppBundle:Ecole_sup')->findAll();

        return $this->render('ecole_sup/index.html.twig', array(
            'ecole_sups' => $ecole_sups,
        ));
    }

    /**
     * Creates a new ecole_sup entity.
     *
     * @Route("/new", name="ecole_sup_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ecole_sup = new Ecole_sup();
        $form = $this->createForm('AppBundle\Form\Ecole_supType', $ecole_sup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecole_sup);
            $em->flush();

           // return $this->redirectToRoute('ecole_sup_show', array('id' => $ecole_sup->getId()));
            return $this->redirectToRoute('ecole_sup_index');
        }

        return $this->render('ecole_sup/new.html.twig', array(
            'ecole_sup' => $ecole_sup,
            'form' => $form->createView(),
        ));
        
    }

    /**
     * Finds and displays a ecole_sup entity.
     *
     * @Route("/{id}", name="ecole_sup_show")
     * @Method("GET")
     */
    public function showAction(Ecole_sup $ecole_sup)
    {
        $deleteForm = $this->createDeleteForm($ecole_sup);

        return $this->render('ecole_sup/show.html.twig', array(
            'ecole_sup' => $ecole_sup,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecole_sup entity.
     *
     * @Route("/{id}/edit", name="ecole_sup_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ecole_sup $ecole_sup)
    {
        $deleteForm = $this->createDeleteForm($ecole_sup);
        $editForm = $this->createForm('AppBundle\Form\Ecole_supType', $ecole_sup);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            //return $this->redirectToRoute('ecole_sup_edit', array('id' => $ecole_sup->getId()));
            return $this->redirectToRoute('ecole_sup_index');
        }

        return $this->render('ecole_sup/edit.html.twig', array(
            'ecole_sup' => $ecole_sup,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
        
    }

    /**
     * Deletes a ecole_sup entity.
     *
     * @Route("delete/{id}", name="ecole_sup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ecole_sup $ecole_sup)
    {
       // $form = $this->createDeleteForm($ecole_sup);
        //$form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecole_sup);
            $em->flush();
       // }

        return $this->redirectToRoute('ecole_sup_index');
    }

    /**
     * Creates a form to delete a ecole_sup entity.
     *
     * @param Ecole_sup $ecole_sup The ecole_sup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ecole_sup $ecole_sup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecole_sup_delete', array('id' => $ecole_sup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
