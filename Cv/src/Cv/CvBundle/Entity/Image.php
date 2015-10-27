<?php

namespace Cv\CvBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Description of Image
 *
 * @author skontomarko
 */
/**
 * Class Image
 *
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 */
class Image
{
     /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * Image path
     *
     * @var string
     *
     * @ORM\Column(type="text", length=255, nullable=false)
     */
    protected $path;
    
      /**
     * Image file
     *
     * @var File
     *
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "The maxmimum allowed file size is 5MB.",
     *     mimeTypesMessage = "Only the filetypes image are allowed."
     * )
     */
    protected $file;
    
  /**
   *
   * @var type 
   * @ORM\ManyToOne(targetEntity="Cv\CvBundle\Entity\Profile",inversedBy="images")
   * 
   */
    protected $profile;
    /**
     * get id
     * @return type
     */
     public function getId()
    {
        return $this->id;
    }
    
   /**
    * 
    * @return type
    * 
    */
    public function getPath()
    {
        return $this->path;
    }

   /**
    * 
    * @param type $path
    * 
    * @return \Image
    * 
    */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }
    /**
     * 
     * @return type
     */
    public function getFile()
    {
        return $this->file;
    }

   /**
    * 
    * @param type $file
    * 
    * @return \Image
    */ 
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
    
    /**
 * Called before saving the entity
 * 
 * @ORM\PrePersist()
 * @ORM\PreUpdate()
 */
public function preUpload()
{   
    if (null !== $this->file) {
        // do whatever you want to generate a unique name
        $filename = sha1(uniqid(mt_rand(), true));
        $this->path = $filename.'.'.$this->file->guessExtension();
    }
}

/**
 * Called before entity removal
 *
 * @ORM\PreRemove()
 */
public function removeUpload()
{
    if ($file = $this->getAbsolutePath()) {
        unlink($file); 
    }
}

/**
 * Called after entity persistence
 *
 * @ORM\PostPersist()
 * @ORM\PostUpdate()
 */
public function upload()
{
    // The file property can be empty if the field is not required
    if (null === $this->file) {
        return;
    }

    // Use the original file name here but you should
    // sanitize it at least to avoid any security issues
 
    // move takes the target directory and then the
    // target filename to move to
    $this->file->move(
        $this->getUploadRootDir(),
        $this->path
    );

    // Set the path property to the filename where you've saved the file
    $this->path = $this->file->getClientOriginalName();

    //Create future attibut alt of <img>
    $this->alt->$this->path;
    
    // Clean up the file property as you won't need it anymore
    $this->file = null;
}



/**
 * Returns the name folder where the image will be saved
 * 
 */

public function getUploadDir(){
  
    return 'images';
    
}

/**
 * Rerurns the relative root dir of image
 * @return type
 */
public function getUploadRootDir(){
    
    return __DIR__.'/'.$this->getUploadDir();
}


public function isFileUploadedOrExists(ExecutionContextInterface $context)
{
    if(null === $this->image_path && null === $this->file)
        $context->addViolationAt('file', 'Vous devez choisir un fichier', array(), null);   
}

    /**
     * Set profile
     *
     * @param \Cv\CvBundle\Entity\Profile $profile
     * @return Image
     */
    public function setProfile(\Cv\CvBundle\Entity\Profile $profile = null)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \Cv\CvBundle\Entity\Profile 
     */
    public function getProfile()
    {
        return $this->profile;
    }
}
