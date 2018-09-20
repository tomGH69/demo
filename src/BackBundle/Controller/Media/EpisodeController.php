<?php

namespace BackBundle\Controller\Media;

use BackBundle\Entity\Media\Episode;
use BackBundle\Entity\Media\TvShow;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Episode controller.
 *
 * @Route("media_tvshow_episode")
 */
class EpisodeController extends Controller
{

    /**
     * Creates a new episode entity.
     *
     * @Route("{id}/new", name="media_tvshow_episode_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, TvShow $tvShow)
    {
        $episode = new Episode();

        $form = $this->createForm('BackBundle\Form\Media\EpisodeType', $episode);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $episode->setTvShow($tvShow);
            $em->persist($episode);
            $em->flush();

            return $this->redirectToRoute('media_tvshow_episodes', array('id' => $tvShow->getId()));
        }

        return $this->render('@Back/media/tvshow/new_episode.html.twig', array(
            'episode' => $episode,
            'form' => $form->createView()));

    }

    /**
     * Show all episodes of a tv show.
     *
     * @Route("{id}/show-all", name="media_tvshow_episode_show_all")
     * @Method({"GET", "POST"})
     */
    public function showAllAction(Request $request, TvShow $tvShow)
    {
        $episodes = $this->getDoctrine()->getRepository('BackBundle:Media\Episode')->findBy(array('tvShow' => $tvShow));

        return $this->render('@Back/media/tvshow/show_episodes.html.twig', array('episodes' => $episodes));

    }

    /**
     * Remove an episode
     *
     * @Route("{id}/remove", name="media_tvshow_episode_show_all")
     * @Method({"GET", "POST"})
     */
    public function deleteAction(Request $request, Episode $episode)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($episode);
        $em->flush();

        return $this->redirectToRoute('media_tvshow_episode_show_all', array('id' => $episode->getTvShow()->getId()));

    }


}
