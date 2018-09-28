<?php

namespace BackBundle\Model;

/**
 * Class TetranzSelectModel
 * @package BackBundle\Model
 */
class TetranzSelectModel
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * TetranzSelectModel constructor.
     * @param $id
     * @param $text
     */
    public function __construct($id, $text)
    {
        $this->setId($id);
        $this->setText($text);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }


}