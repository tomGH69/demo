<?php

namespace BackBundle\Controller\Person;


use BackBundle\Controller\BaseController;
use BackBundle\Entity\Person;
use BackBundle\Entity\Person\Director;
use BackBundle\Model\TetranzSelectModel;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Actor controller.
 *
 * @Route("person_director")
 */
class DirectorController extends BaseController
{
    /**
     * Autocomplete
     *
     * @Route("/autocomplete", name="person_director_autocomplete")
     * @Method("GET")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function autocompleteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $request->query->get('q');
        $directors = $em->getRepository(Person::class)->findLike($query, Director::class);

        $jsonResults = new ArrayCollection();
        foreach ($directors as $director) {
            $tetranzModel = new TetranzSelectModel($director->getId(), (string)$director);
            $jsonResults->add($tetranzModel);
        }

        return $this->json($jsonResults);
    }

}
