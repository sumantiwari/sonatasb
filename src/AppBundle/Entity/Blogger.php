<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blogger
 *
 * @ORM\Table(name="blogger", indexes={@ORM\Index(name="fk_BlogPost_BlogCategory1_idx", columns={"BlogCategory_id"})})
 *  
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BloggerRepository")
 */
class Blogger {

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Sonata\MediaBundle\Entity\Media", cascade={"all"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $imageNews;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", length=255, nullable=false)
     */
    private $body;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\BloggerType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BloggerType",inversedBy="blogPosts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="BlogCategory_id", referencedColumnName="id")
     * })
     */
    private $blogcategory;

    /**
     * @var bool
     *
     * @ORM\Column(name="draft", type="boolean")
     */
    private $draft = false;

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Blogger
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return Blogger
     */
    public function setBody($body) {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set blogcategory
     *
     * @param \AppBundle\Entity\BloggerType $blogcategory
     *
     * @return Blogger
     */
    public function setBlogcategory(\AppBundle\Entity\BloggerType $blogcategory = null) {
        $this->blogcategory = $blogcategory;

        return $this;
    }

    /**
     * Get blogcategory
     *
     * @return \AppBundle\Entity\BloggerType
     */
    public function getBlogcategory() {
        return $this->blogcategory;
    }

    /**
     * Set draft
     *
     * @param boolean $draft
     *
     * @return Blogger
     */
    public function setDraft($draft) {
        $this->draft = $draft;

        return $this;
    }

    /**
     * Get draft
     *
     * @return boolean
     */
    public function getDraft() {
        return $this->draft;
    }

    /**
     * Set imageNews
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $imageNews
     *
     * @return Blogger
     */
    public function setImageNews(\Application\Sonata\MediaBundle\Entity\Media $imageNews = null) {
        $this->imageNews = $imageNews;

        return $this;
    }

    /**
     * Get imageNews
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getImageNews() {
        return $this->imageNews;
    }

    /**
     * Set image
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $image
     *
     * @return Blogger
     */
    public function setImage(\Application\Sonata\MediaBundle\Entity\Media $image = null) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getImage() {
        return $this->image;
    }

}
