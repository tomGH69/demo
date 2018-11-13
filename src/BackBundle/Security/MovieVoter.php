<?php

namespace BackBundle\Security;

use BackBundle\Entity\Media\Movie;
use BackBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

/**
 * Class MovieVoter
 * @package BackBundle\Security
 */
class MovieVoter extends Voter
{
    const EDIT = 'edit';

    /**
     * @param string $attribute
     * @param mixed $subject
     * @return bool
     */
    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, array(self::EDIT))) {
            return false;
        }

        if (!$subject instanceof Movie) {
            return false;
        }

        return true;
    }

    /**
     * @param string $attribute
     * @param mixed $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            return false;
        }

        $movie = $subject;

        switch ($attribute) {
            case self::EDIT:
                return $this->canEdit($movie, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }


    /**
     * @param Movie $movie
     * @param User $user
     * @return bool
     */
    private function canEdit(Movie $movie, User $user)
    {
        return $user === $movie->getOwner();
    }
}