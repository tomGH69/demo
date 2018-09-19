<?php

namespace BackBundle\Controller\Media;

use BackBundle\Entity\Media\TvShow;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tvshow controller.
 *
 * @Route("media_tvshow")
 */
class TvShowController extends Controller
{
    /**
     * Lists all tvShow entities.
     *
     * @Route("/", name="media_tvshow_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tvShows = $em->getRepository('BackBundle:Media\TvShow')->findAll();

        return $this->render('@Back/media/tvshow/index.html.twig', array(
            'tvShows' => $tvShows,
        ));
    }

    /**
     * Creates a new tvShow entity.
     *
     * @Route("/new", name="media_tvshow_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tvShow = new Tvshow();
        $form = $this->createForm('BackBundle\Form\Media\TvShowType', $tvShow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tvShow);
            $em->flush();

            return $this->redirectToRoute('media_tvshow_show', array('id' => $tvShow->getId()));
        }

        return $this->render('@Back/media/tvshow/new.html.twig', array(
            'tvShow' => $tvShow,
            'form' => $form->createView(),
        ));
    }

    public function newEpisodeAction(Request $request, TvShow $tvShow)
    {



    }


    /**
     * Finds and displays a tvShow entity.
     *
     * @Route("/{id}", name="media_tvshow_show")
     * @Method("GET")
     */
    public function showAction(TvShow $tvShow)
    {
        $deleteForm = $this->createDeleteForm($tvShow);

        return $this->render('@Back/media/tvshow/show.html.twig', array(
            'tvShow' => $tvShow,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tvShow entity.
     *
     * @Route("/{id}/edit", name="media_tvshow_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TvShow $tvShow)
    {
        $deleteForm = $this->createDeleteForm($tvShow);
        $editForm = $this->createForm('BackBundle\Form\Media\TvShowType', $tvShow);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('media_tvshow_edit', array('id' => $tvShow->getId()));
        }

        return $this->render('@Back/media/tvshow/edit.html.twig', array(
            'tvShow' => $tvShow,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tvShow entity.
     *
     * @Route("/{id}", name="media_tvshow_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TvShow $tvShow)
    {
        $form = $this->createDeleteForm($tvShow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tvShow);
            $em->flush();
        }

        return $this->redirectToRoute('media_tvshow_index');
    }

    /**
     * Creates a form to delete a tvShow entity.
     *
     * @param TvShow $tvShow The tvShow entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TvShow $tvShow)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('media_tvshow_delete', array('id' => $tvShow->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
