<?php

namespace BackBundle\Controller\Person;


use BackBundle\Model\TetranzSelectModel;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Actor controller.
 *
 * @Route("person_actor")
 */
class ActorController extends Controller
{
    /**
     * Autocomplete
     *
     * @Route("/autocomplete", name="person_actor_autocomplete")
     * @Method("GET")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function autocompleteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $request->query->get('q');
        $actors = $em->getRepository('BackBundle:Person\Actor')->findLike($query);

        $jsonResults = new ArrayCollection();
        foreach ($actors as $actor) {
            $tetranzModel = new TetranzSelectModel($actor->getId(), (string)$actor);
            $jsonResults->add($tetranzModel);
        }

        return $this->json($jsonResults);
    }

}
