<?php

namespace Cv\CvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cv\CvBundle\Entity\InteretRepository")
 */
class Interet
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

     /**
     * @ var integer
     * 
     * @ORM\ManyToMany(targetEntity="Cv\CvBundle\Entity\Profile",inversedBy="interets")
     */
 protected  $profile;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Interet
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }
    
     /**
     * Set profile
     *
     * @param string $profile
     * @return Profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return string 
     */
    public function getProfile()
    {
        return $this->profile;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->profile = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add profile
     *
     * @param \Cv\CvBundle\Entity\Profile $profile
     * @return Interet
     */
    public function addProfile(\Cv\CvBundle\Entity\Profile $profile)
    {
        $this->profile[] = $profile;

        return $this;
    }

    /**
     * Remove profile
     *
     * @param \Cv\CvBundle\Entity\Profile $profile
     */
    public function removeProfile(\Cv\CvBundle\Entity\Profile $profile)
    {
        $this->profile->removeElement($profile);
    }
}
