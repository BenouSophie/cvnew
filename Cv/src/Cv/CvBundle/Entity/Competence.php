<?php

namespace Cv\CvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competence
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cv\CvBundle\Entity\CompetenceRepository")
 */
class Competence
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
     * @ORM\Column(name="Competence", type="string", length=255)
     */
    private $competence;

    /**
     * @ var integer
     * 
     * @ORM\ManyToMany(targetEntity="Cv\CvBundle\Entity\Profile",inversedBy="competences")
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
     * Set competence
     *
     * @param string $competence
     * @return Competence
     */
    public function setCompetence($competence)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get competence
     *
     * @return string 
     */
    public function getCompetence()
    {
        return $this->competence;
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
     * @return Competence
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
