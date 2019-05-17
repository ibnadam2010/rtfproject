<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Diplome_coach;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Diplome_coach controller.
 *
 * @Route("diplome_coach")
 */
class Diplome_coachController extends Controller
{
    /**
     * Lists all diplome_coach entities.
     *
     * @Route("/", name="diplome_coach_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $diplome_coaches = $em->getRepository('AppBundle:Diplome_coach')->findAll();

        return $this->render('diplome_coach/index.html.twig', array(
            'diplome_coaches' => $diplome_coaches,
        ));
    }

    /**
     * Creates a new diplome_coach entity.
     *
     * @Route("/new", name="diplome_coach_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $diplome_coach = new Diplome_coach();
        $form = $this->createForm('AppBundle\Form\Diplome_coachType', $diplome_coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($diplome_coach);
            $em->flush();

           // return $this->redirectToRoute('diplome_coach_show', array('id' => $diplome_coach->getId()));
            return $this->redirectToRoute('diplome_coach_index');
        }

        return $this->render('diplome_coach/new.html.twig', array(
            'diplome_coach' => $diplome_coach,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a diplome_coach entity.
     *
     * @Route("/{id}", name="diplome_coach_show")
     * @Method("GET")
     */
    public function showAction(Diplome_coach $diplome_coach)
    {
        $deleteForm = $this->createDeleteForm($diplome_coach);

        return $this->render('diplome_coach/show.html.twig', array(
            'diplome_coach' => $diplome_coach,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing diplome_coach entity.
     *
     * @Route("/{id}/edit", name="diplome_coach_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Diplome_coach $diplome_coach)
    {
        $deleteForm = $this->createDeleteForm($diplome_coach);
        $editForm = $this->createForm('AppBundle\Form\Diplome_coachType', $diplome_coach);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            //return $this->redirectToRoute('diplome_coach_edit', array('id' => $diplome_coach->getId()));
            return $this->redirectToRoute('diplome_coach_index');
        }

        return $this->render('diplome_coach/edit.html.twig', array(
            'diplome_coach' => $diplome_coach,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a diplome_coach entity.
     *
     * @Route("delete/{id}", name="diplome_coach_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Diplome_coach $diplome_coach)
    {
        //$form = $this->createDeleteForm($diplome_coach);
        //$form->handleRequest($request);

       // if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($diplome_coach);
            $em->flush();
        //}

        return $this->redirectToRoute('diplome_coach_index');
    }

    /**
     * Creates a form to delete a diplome_coach entity.
     *
     * @param Diplome_coach $diplome_coach The diplome_coach entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Diplome_coach $diplome_coach)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('diplome_coach_delete', array('id' => $diplome_coach->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
