<?php

namespace BackBundle\Controller\Media;

use BackBundle\Controller\BaseController;
use BackBundle\Entity\Media;
use BackBundle\Entity\Media\Movie;
use BackBundle\Form\Media\MovieType;
use BackBundle\Form\Media\SearcherType;
use BackBundle\Utils\Util;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Movie controller.
 *
 * @Route("media_movie")
 */
class MovieController extends BaseController
{
    /**
     * Lists all movie entities.
     *
     * @Route("/", name="media_movie_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $movieSearcher = new Movie();
        $formSearcher = $this->createForm(SearcherType::class, $movieSearcher);
        $formSearcher->handleRequest($request);

        if ($formSearcher->isSubmitted() && $formSearcher->isValid()) {
            $movies = $em->getRepository(Media::class)->filter($movieSearcher, $this->get('back_filter'));
        } else {
            $movies = $em->getRepository(Movie::class)->findAll();
        }

        $movies = $this->get('knp_paginator')->paginate($movies, $request->query->get('page', 1), 5);


        return $this->render('@Back/media/movie/index.html.twig', array(
            'movies' => $movies,
            'formSearcher' => $formSearcher->createView()
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
        $form = $this->createForm(MovieType::class, $movie);
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
        $editForm = $this->createForm(MovieType::class, $movie);
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
