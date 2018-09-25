<?php

namespace BackBundle\Controller\Media;

use BackBundle\Entity\Media\Episode;
use BackBundle\Entity\Media\TvShow;
use BackBundle\Utils\Util;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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

            return $this->redirectToRoute('media_tvshow_index');
        }

        return $this->render('@Back/media/tvshow/new.html.twig', array(
            'tvShow' => $tvShow,
            'form' => $form->createView(),
            'type' => Util::FORM_NEW
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
        $editForm = $this->createForm('BackBundle\Form\Media\TvShowType', $tvShow);
        $originalEpisodes = new ArrayCollection();

        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($tvShow->getEpisodes() as $episode) {
            $originalEpisodes->add($episode);
        }
        $editForm->handleRequest($request);


        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            foreach ($originalEpisodes as $episode) {
                if (false === $tvShow->getEpisodes()->contains($episode)) {
                    $em->remove($episode);
                }
            }
            foreach ($tvShow->getEpisodes() as $episode) {
                $episode->setTvShow($tvShow);
            }
            $em->persist($tvShow);
            $em->flush();
            return $this->redirectToRoute('media_tvshow_edit', array('id' => $tvShow->getId()));
        }

        return $this->render('@Back/media/tvshow/new.html.twig', array(
            'tvShow' => $tvShow,
            'form' => $editForm->createView(),
            'type' => Util::FORM_EDIT
        ));
    }

    /**
     * Deletes a movie entity.
     *
     * @Route("/{id}/delete", name="media_tvshow_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, TvShow $tvShow)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($tvShow);
        $em->flush();
        return $this->redirectToRoute('media_tvshow_index');
    }
}
