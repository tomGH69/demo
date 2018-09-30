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
     * @param int $id
     * @return TetranzSelectModel
     */
    public function setId(int $id): TetranzSelectModel
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return TetranzSelectModel
     */
    public function setText(string $text): TetranzSelectModel
    {
        $this->text = $text;

        return $this;
    }


}