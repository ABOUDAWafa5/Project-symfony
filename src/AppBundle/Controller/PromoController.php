<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Promo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Promo controller.
 *
 * @Route("eshop/admin/promo")
 */
class PromoController extends Controller
{
    /**
     * Lists all promo entities.
     *
     * @Route("/", name="eshop_admin_promo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $promos = $em->getRepository('AppBundle:Promo')->findAll();

        return $this->render('eshop/admin/promo/index.html.twig', array(
            'promos' => $promos,
        ));
    }

    /**
     * Creates a new promo entity.
     *
     * @Route("/new", name="eshop_admin_promo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $promo = new Promo();
        $form = $this->createForm('AppBundle\Form\PromoType', $promo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($promo);
            $em->flush();

            return $this->redirectToRoute('eshop_admin_promo_index', array('id' => $promo->getId()));
        }

        return $this->render('eshop/admin/promo/new.html.twig', array(
            'promo' => $promo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a promo entity.
     *
     * @Route("/{id}", name="eshop_admin_promo_show")
     * @Method("GET")
     */
    public function showAction(Promo $promo)
    {
        $deleteForm = $this->createDeleteForm($promo);

        return $this->render('eshop/admin/promo/show.html.twig', array(
            'promo' => $promo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing promo entity.
     *
     * @Route("/{id}/edit", name="eshop_admin_promo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Promo $promo)
    {

        $deleteForm = $this->createDeleteForm($promo);
        $editForm = $this->createForm('AppBundle\Form\PromoType', $promo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

   

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eshop_admin_promo_edit', array('id' => $promo->getId()));
        }

        return $this->render('eshop/admin/promo/edit.html.twig', array(
            'promo' => $promo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a promo entity.
     *
     * @Route("/{id}", name="eshop_admin_promo_delete")
     
     */
    public function deleteAction(Request $request, Promo $promo)
    {
        $form = $this->createDeleteForm($promo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($promo);
            $em->flush();
        }

        return $this->redirectToRoute('eshop_admin_promo_index');
    }

    /**
     * Creates a form to delete a promo entity.
     *
     * @param Promo $promo The promo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Promo $promo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eshop_admin_promo_delete', array('id' => $promo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
