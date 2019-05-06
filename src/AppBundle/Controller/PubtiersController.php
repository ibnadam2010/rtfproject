<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pubtiers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pubtier controller.
 *
 * @Route("pubtiers")
 */
class PubtiersController extends Controller
{
    /**
     * Lists all pubtier entities.
     *
     * @Route("/", name="pubtiers_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pubtiers = $em->getRepository('AppBundle:Pubtiers')->findAll();

        return $this->render('pubtiers/index.html.twig', array(
            'pubtiers' => $pubtiers,
        ));
    }

    /**
     * Creates a new pubtier entity.
     *
     * @Route("/new", name="pubtiers_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pubtier = new Pubtiers();
        $form = $this->createForm('AppBundle\Form\PubtiersType', $pubtier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pubtier);
            $em->flush();

            return $this->redirectToRoute('pubtiers_index');
        }

        return $this->render('pubtiers/new.html.twig', array(
            'pubtier' => $pubtier,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pubtier entity.
     *
     * @Route("/{id}", name="pubtiers_show")
     * @Method("GET")
     */
    public function showAction(Pubtiers $pubtier)
    {
        $deleteForm = $this->createDeleteForm($pubtier);

        return $this->render('pubtiers/show.html.twig', array(
            'pubtier' => $pubtier,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pubtier entity.
     *
     * @Route("/{id}/edit", name="pubtiers_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pubtiers $pubtier)
    {
        $deleteForm = $this->createDeleteForm($pubtier);
        $editForm = $this->createForm('AppBundle\Form\PubtiersType', $pubtier);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pubtiers_index');
        }

        return $this->render('pubtiers/edit.html.twig', array(
            'pubtier' => $pubtier,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pubtier entity.
     *
     * @Route("delete/{id}", name="pubtiers_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pubtiers $pubtier)
    {


            $em = $this->getDoctrine()->getManager();
            $em->remove($pubtier);
            $em->flush();

        return $this->redirectToRoute('pubtiers_index');
    }

    /**
     * Creates a form to delete a pubtier entity.
     *
     * @param Pubtiers $pubtier The pubtier entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pubtiers $pubtier)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pubtiers_delete', array('id' => $pubtier->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
