<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Actuality;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Actuality controller.
 *
 * @Route("actuality")
 */
class ActualityController extends Controller
{
    /**
     * Lists all actuality entities.
     *
     * @Route("/", name="actuality_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actualities = $em->getRepository('AppBundle:Actuality')->findAll();

        return $this->render('actuality/index.html.twig', array(
            'actualities' => $actualities,
        ));
    }

    /**
     * Creates a new actuality entity.
     *
     * @Route("/new", name="actuality_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $actuality = new Actuality();
        $form = $this->createForm('AppBundle\Form\ActualityType', $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actuality);
            $em->flush();

            return $this->redirectToRoute('actuality_show', array('id' => $actuality->getId()));
        }

        return $this->render('actuality/new.html.twig', array(
            'actuality' => $actuality,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a actuality entity.
     *
     * @Route("/{id}", name="actuality_show")
     * @Method("GET")
     */
    public function showAction(Actuality $actuality)
    {
        $deleteForm = $this->createDeleteForm($actuality);

        return $this->render('actuality/show.html.twig', array(
            'actuality' => $actuality,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing actuality entity.
     *
     * @Route("/{id}/edit", name="actuality_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Actuality $actuality)
    {
        $deleteForm = $this->createDeleteForm($actuality);
        $editForm = $this->createForm('AppBundle\Form\ActualityType', $actuality);
       // var_dump($editForm);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('actuality_index');
        }

        return $this->render('actuality/edit.html.twig', array(
            'actuality' => $actuality,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a actuality entity.
     *
     * @Route("delete/{id}", name="actuality_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Actuality $actuality)
    {

            $em = $this->getDoctrine()->getManager();
            $em->remove($actuality);
            $em->flush();

        return $this->redirectToRoute('actuality_index');
    }

    /**
     * Creates a form to delete a actuality entity.
     *
     * @param Actuality $actuality The actuality entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Actuality $actuality)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actuality_delete', array('id' => $actuality->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
