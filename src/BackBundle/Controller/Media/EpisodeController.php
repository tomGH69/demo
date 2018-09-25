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
     * Remove an episode
     *
     * @Route("{id}/remove", name="media_tvshow_episode_remove")
     * @Method({"GET"})
     */
    public function deleteAction(Request $request, Episode $episode)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($episode);
        $em->flush();

        return $this->redirectToRoute('media_tvshow_episode_show_all', array('id' => $episode->getTvShow()->getId()));

    }


}
