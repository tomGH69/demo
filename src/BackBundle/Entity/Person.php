<?php

namespace BackBundle\Entity;

use BackBundle\Traits\DoctrineId;
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

    use DoctrineId;
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
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
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
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getFirstname().' '.$this->getName();
    }

    /**
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return Person
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Set updated.
     *
     * @param \DateTime $updated
     *
     * @return Person
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }
}
