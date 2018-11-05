<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{

    /**
     * @return \FOS\UserBundle\Doctrine\UserManager|object
     */
    public function getUserManager()
    {
        return $this->get('fos_user.user_manager');
    }


}
