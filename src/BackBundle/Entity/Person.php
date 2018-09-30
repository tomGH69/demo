<?php

namespace BackBundle\Entity;

use BackBundle\Traits\DoctrineIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Media
 *
 * @ORM\Table(name="person")
 * @ORM\Entity()
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"actor" = "BackBundle\Entity\Person\Actor", "director" = "BackBundle\Entity\Person\Director"})
 */
abstract class Person
{

    use DoctrineIdTrait;
    use TimestampableEntity;

    /**
     * @var
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var
     * @ORM\Column(type="string")
     */
    protected $firstname;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Person
     */
    public function setName(?string $name): Person
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Person
     */
    public function setFirstname(?string $firstname): Person
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function __toString(): ?string
    {
        return $this->getFirstname() . ' ' . $this->getName();
    }
}
