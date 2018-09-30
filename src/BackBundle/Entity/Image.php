<?php

namespace BackBundle\Entity;

use BackBundle\Traits\DoctrineIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @ORM\Entity
 * @Vich\Uploadable
 * @ORM\Table(name="image")
 */
class Image
{
    use DoctrineIdTrait;
    use TimestampableEntity;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="image", fileNameProperty="imageName", size="imageSize")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $imageName;


    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $imageSize;


    /**
     * @param File|null $image
     * @throws \Exception
     */
    public function setImageFile(?File $image = null): void
    {
        $this->imageFile = $image;

        if (null !== $image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return null|File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }


    /**
     * Set imageName.
     *
     * @param string $imageName
     *
     * @return Image
     */
    public function setImageName(?string $imageName): Image
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName.
     *
     * @return string
     */
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * Set imageSize.
     *
     * @param int $imageSize
     *
     * @return Image
     */
    public function setImageSize(?int $imageSize): Image
    {
        $this->imageSize = $imageSize;

        return $this;
    }

    /**
     * Get imageSize.
     *
     * @return int
     */
    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

}
