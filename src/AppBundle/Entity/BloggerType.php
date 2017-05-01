<?php
namespace AppBundle\Entity;
use AppBundle\Entity\Blogger;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * BloggerType
 *
 * @ORM\Table(name="blogger_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BloggerTypeRepository")
 */
class BloggerType
{
    
    /**
    * @ORM\OneToMany(targetEntity="Blogger", mappedBy="blogcategory",cascade={"persist"})
    */
    private $blogPosts;

    public function __construct()
    {
        $this->blogPosts = new ArrayCollection();
    }

    public function getBlogPosts()
    {
        return $this->blogPosts;
    }
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return BloggerType
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    
    public function __toString()
{
    return(string) $this->getName();
}

    /**
     * Add blogPost
     *
     * @param Blogger $blogPost
     *
     * @return BloggerType
     */
    public function addBlogPost(Blogger $blogPost)
    {
        $this->blogPosts[] = $blogPost;

        return $this;
    }

    /**
     * Remove blogPost
     *
     * @param Blogger $blogPost
     */
    public function removeBlogPost(Blogger $blogPost)
    {
        $this->blogPosts->removeElement($blogPost);
    }
}
