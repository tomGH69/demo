<?php

namespace BackBundle\Controller;


use BackBundle\Entity\User;
use BackBundle\Form\User\UserEditType;
use BackBundle\Form\User\UserNewType;
use BackBundle\Utils\Util;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Actor controller.
 *
 * @Route("user")
 */
class UserController extends BaseController
{

    /**
     * Lists all user entities.
     *
     * @Route("/", name="user_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $users = $this->getUserManager()->findUsers();
        return $this->render("@Back/user/index.html.twig", array('users' => $users));
    }

    /**
     * add new user
     *
     * @Route("/new", name="user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = $this->getUserManager()->createUser();

        $form = $this->createForm(UserNewType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setEnabled(true);
            $user->addRole("ROLE_ADMIN");

            $this->getUserManager()->updateUser($user, true);
            $this->addFlash(
                'success',
                'User created'
            );
            return $this->redirectToRoute("user_index");
        }

        return $this->render("@Back/user/new.html.twig", array(
            'type' => Util::FORM_NEW,
            'form' => $form->createView(),
            'user' => $user
        ));
    }

    /**
     * edit user
     *
     * @Route("{id}/edit", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User $user)
    {
        $form = $this->createForm(UserEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getUserManager()->updateUser($user, true);
            $this->addFlash(
                'success',
                'User edited'
            );
            return $this->redirectToRoute("user_edit", array('id' => $user->getId()));
        }

        return $this->render("@Back/user/new.html.twig", array(
            'type' => Util::FORM_EDIT,
            'form' => $form->createView(),
            'user' => $user
        ));
    }


    /**
     * activate user
     *
     * @Route("{id}/activate", name="user_activate")
     * @Method({"GET"})
     */
    public function activateAction(Request $request, User $user)
    {
        $user->setEnabled(true);
        $this->getUserManager()->updateUser($user, true);
        $this->addFlash(
            'success',
            'User activated'
        );
        return $this->redirectToRoute('user_index');
    }

    /**
     * edit user
     *
     * @Route("{id}/deactivate", name="user_deactivate")
     * @Method({"GET"})
     */
    public function deactivateAction(Request $request, User $user)
    {
        $user->setEnabled(false);
        $this->getUserManager()->updateUser($user, true);
        $this->addFlash(
            'success',
            'User deactivated'
        );
        return $this->redirectToRoute('user_index');
    }


}
