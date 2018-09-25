<?php

namespace BackBundle\Controller\Media;

use BackBundle\Entity\Media\Movie;
use BackBundle\Utils\Util;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Movie controller.
 *
 * @Route("media_movie")
 */
class MovieController extends Controller
{
    /**
     * Lists all movie entities.
     *
     * @Route("/", name="media_movie_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $movies = $em->getRepository('BackBundle:Media\Movie')->findAll();

        return $this->render('@Back/media/movie/index.html.twig', array(
            'movies' => $movies,
        ));
    }

    /**
     * Creates a new movie entity.
     *
     * @Route("/new", name="media_movie_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $movie = new Movie();
        $form = $this->createForm('BackBundle\Form\Media\MovieType', $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();

            return $this->redirectToRoute('media_movie_index');
        }

        return $this->render('@Back/media/movie/new.html.twig', array(
            'movie' => $movie,
            'form' => $form->createView(),
            'type' => Util::FORM_NEW
        ));
    }


    /**
     * Displays a form to edit an existing movie entity.
     *
     * @Route("/{id}/edit", name="media_movie_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Movie $movie)
    {
        $editForm = $this->createForm('BackBundle\Form\Media\MovieType', $movie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('media_movie_edit', array('id' => $movie->getId()));
        }

        return $this->render('@Back/media/movie/new.html.twig', array(
            'movie' => $movie,
            'form' => $editForm->createView(),
            'type' => Util::FORM_EDIT
        ));
    }

    /**
     * Deletes a movie entity.
     *
     * @Route("/{id}/delete", name="media_movie_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, Movie $movie)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($movie);
        $em->flush();
        return $this->redirectToRoute('media_movie_index');
    }

}
