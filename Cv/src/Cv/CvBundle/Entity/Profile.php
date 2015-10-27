<?php

namespace Cv\CvBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Profile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cv\CvBundle\Entity\ProfileRepository")
 */
class Profile
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
     * @ORM\Column(name="titreHeader", type="string", length=255)
     */
    private $titreHeader;

    /**
     * @var string
     *
     * @ORM\Column(name="titreProfession", type="string", length=255)
     */
    private $titreProfession;

    /**
     * @var string
     *
     * @ORM\Column(name="texteAccueil", type="text")
     */
    private $texteAccueil;

    /**
     * @var string
     *
     * @ORM\Column(name="backgroundImage", type="string", length=255)
     */
    private $backgroundImage;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedIn", type="string", length=255)
     */
    private $linkedIn;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Cv\CvBundle\Entity\Image",mappedBy="profile")
     */
    protected $images;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string",columnDefinition="ENUM('masculin', 'feminin')")
     */
    private $sexe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeNaissance", type="date")
     */
    private $dateDeNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

/**
 *
 * @var integer
 * 
 * @ORM\ManyToMany(targetEntity="Cv\CvBundle\Entity\Competence",mappedBy="profile") 
 */
    
    protected $competences;
   
  /**
   *
   * @var integer
   * 
   * @ORM\ManyToMany(targetEntity="Cv\CvBundle\Entity\Formation",mappedBy="profile") 
   */
    
    protected $formations;
    
    /**
     *
     * @var type 
     * 
     * @ORM\ManyToMany(targetEntity="Cv\CvBundle\Entity\Experience",mappedBy="profile") 
     */
    
    protected $experiences;
    
    /**
     *
     * @var type 
     * 
     * @ORM\ManyToMany(targetEntity="Cv\CvBundle\Entity\Interet",mappedBy="profile") 
     */
    
    protected $interets;
    
    /**
     *
     * @var type 
     * 
     * @ORM\ManyToMany(targetEntity="Cv\CvBundle\Entity\Langue",mappedBy="profile") 
     */
    
    protected  $langues;
    
    /**
     *
     * @var type 
     *
     * @ORM\ManyToMany(targetEntity="Cv\CvBundle\Entity\Projet",mappedBy="profile")      
     */
    protected $projets;
    
    /**
    * Création d'une collection de  competences,formations,experiences,interets,langues et projets
    */ 
    public function __construct()
    {
        
        $this->competences = new ArrayCollection();
        $this->formations = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->interets = new ArrayCollection();
        $this->langues = new ArrayCollection();
        $this->projets = new ArrayCollection();
        $this->images = new ArrayCollection();
       
        
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

    /**
     * Set titreHeader
     *
     * @param string $titreHeader
     * @return Profile
     */
    public function setTitreHeader($titreHeader)
    {
        $this->titreHeader = $titreHeader;

        return $this;
    }

    /**
     * Get titreHeader
     *
     * @return string 
     */
    public function getTitreHeader()
    {
        return $this->titreHeader;
    }

    /**
     * Set titreProfession
     *
     * @param string $titreProfession
     * @return Profile
     */
    public function setTitreProfession($titreProfession)
    {
        $this->titreProfession = $titreProfession;

        return $this;
    }

    /**
     * Get titreProfession
     *
     * @return string 
     */
    public function getTitreProfession()
    {
        return $this->titreProfession;
    }

    /**
     * Set texteAccueil
     *
     * @param string $texteAccueil
     * @return Profile
     */
    public function setTexteAccueil($texteAccueil)
    {
        $this->texteAccueil = $texteAccueil;

        return $this;
    }

    /**
     * Get texteAccueil
     *
     * @return string 
     */
    public function getTexteAccueil()
    {
        return $this->texteAccueil;
    }

    /**
     * Set backgroundImage
     *
     * @param string $backgroundImage
     * @return Profile
     */
    public function setBackgroundImage($backgroundImage)
    {
        $this->backgroundImage = $backgroundImage;

        return $this;
    }

    /**
     * Get backgroundImage
     *
     * @return string 
     */
    public function getBackgroundImage()
    {
        return $this->backgroundImage;
    }

    /**
     * Set linkedIn
     *
     * @param string $linkedIn
     * @return Profile
     */
    public function setLinkedIn($linkedIn)
    {
        $this->linkedIn = $linkedIn;

        return $this;
    }

    /**
     * Get linkedIn
     *
     * @return string 
     */
    public function getLinkedIn()
    {
        return $this->linkedIn;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Profile
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
     * Set prenom
     *
     * @param string $prenom
     * @return Profile
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Profile
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set dateDeNaissance
     *
     * @param \DateTime $dateDeNaissance
     * @return Profile
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    /**
     * Get dateDeNaissance
     *
     * @return \DateTime 
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Profile
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Profile
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    
    /**
     * Set image
     *
     * @param string $image
     * @return Profile
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImages()
    {
        return $this->images;
    }
    
    /**
     * Get competences
     * 
     * @return type
     */
    public function getCompetences()
    {
    return $this->competences;
    }
   
  /**
   * Set  competences  
   * 
   * @param type $competences
   * @return \Cv\CvBundle\Entity\Profile
   */
    public function setCompetences($competences)
    {
        $this->competences = $competences;
        return $this;
    }
    
    public function addCompetences(Competence  $competence)
    {
        if(!$this->competences->contains($competence)){
            $this->competences->add($competence);
            $competence->setProfile($this);
        }
        return $this;
    }
    
    public function removeCompetences(Competence  $competence)
    {
      if($this->competences->contains($competence)){
            $this->competences->removeElement($competence);          
        }
        return $this; 
    }
    
   /**
     * Get formations
     * 
     * @return type
     */
    public function getFormations()
    {
    return $this->formations;
    }
   
  /**
   * Set  formations  
   * 
   * @param type $formations
   * @return \Cv\CvBundle\Entity\Profile
   */
    public function setFormations($formations)
    {
        $this->formations = $formations;
        return $this;
    }
    
    public function addFormations(Formation  $formation)
    {
        if(!$this->formations->contains($formation)){
            $this->formations->add($formation);
            $formation->setProfile($this);
        }
        return $this;
    }
    
    public function removeFormations(Formation  $formation)
    {
      if($this->formations->contains($formation)){
            $this->formations->removeElement($formation);          
        }
        return $this; 
    }  
   
    /**
     * Get experiences
     * 
     * @return type
     */
    public function getExperiences()
    {
    return $this->experiences;
    }
   
  /**
   * Set  experiences  
   * 
   * @param type $experiences
   * @return \Cv\CvBundle\Entity\Profile
   */
    public function setExperiences($experiences)
    {
        $this->experiences = $experiences;
        return $this;
    }
    
    public function addExperiences(Experience  $experience)
    {
        if(!$this->experiences->contains($experience)){
            $this->experiences->add($experience);
            $experience->setProfile($this);
        }
        return $this;
    }
    
    public function removeExperiences(Experience  $experience)
    {
      if($this->experiences->contains($experience)){
            $this->experiences->removeElement($experience);          
        }
        return $this; 
    }  
    
     /**
     * Get interets
     * 
     * @return type
     */
    public function getInterets()
    {
    return $this->interets;
    }
   
  /**
   * Set  interets  
   * 
   * @param type $interets
   * @return \Cv\CvBundle\Entity\Profile
   */
    public function setInterets($interets)
    {
        $this->interets = $interets;
        return $this;
    }
    
    public function addInterets(Interet  $interet)
    {
        if(!$this->interets->contains($interet)){
            $this->interets->add($interet);
            $interet->setProfile($this);
        }
        return $this;
    }
    
    public function removeInterets(Interet  $interet)
    {
      if($this->interets->contains($interet)){
            $this->interets->removeElement($interet);          
        }
        return $this; 
    }
    
    /**
     * Get langues
     * 
     * @return type
     */
    public function getLangues()
    {
    return $this->langues;
    }
   
  /**
   * Set  langues  
   * 
   * @param type $langues
   * @return \Cv\CvBundle\Entity\Profile
   */
    public function setLangues($langues)
    {
        $this->langues = $langues;
        return $this;
    }
    
    public function addLangues(Langue  $langue)
    {
        if(!$this->langues->contains($langue)){
            $this->langues->add($langue);
            $langue->setProfile($this);
        }
        return $this;
    }
    
    public function removeLangues(Langue  $langue)
    {
      if($this->langues->contains($langue)){
            $this->langues->removeElement($langue);          
        }
        return $this; 
    }
    
     /**
     * Get projets
     * 
     * @return type
     */
    public function getProjets()
    {
    return $this->projets;
    }
   
  /**
   * Set  projets  
   * 
   * @param type $projets
   * @return \Cv\CvBundle\Entity\Profile
   */
    public function setProjets($projets)
    {
        $this->projets = $projets;
        return $this;
    }
    
    public function addProjets(Projet  $projet)
    {
        if(!$this->projets->contains($projet)){
            $this->projets->add($projet);
            $projet->setProfile($this);
        }
        return $this;
    }
    
    public function removeProjets(Projet  $projet)
    {
      if($this->projets->contains($projet)){
            $this->projets->removeElement($projet);          
        }
        return $this; 
    }

    /**
     * Add images
     *
     * @param \Cv\CvBundle\Entity\Image $images
     * @return Profile
     */
    public function addImage(\Cv\CvBundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Cv\CvBundle\Entity\Image $images
     */
    public function removeImage(\Cv\CvBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Add competences
     *
     * @param \Cv\CvBundle\Entity\Competence $competences
     * @return Profile
     */
    public function addCompetence(\Cv\CvBundle\Entity\Competence $competences)
    {
        $this->competences[] = $competences;

        return $this;
    }

    /**
     * Remove competences
     *
     * @param \Cv\CvBundle\Entity\Competence $competences
     */
    public function removeCompetence(\Cv\CvBundle\Entity\Competence $competences)
    {
        $this->competences->removeElement($competences);
    }

    /**
     * Add formations
     *
     * @param \Cv\CvBundle\Entity\Formation $formations
     * @return Profile
     */
    public function addFormation(\Cv\CvBundle\Entity\Formation $formations)
    {
        $this->formations[] = $formations;

        return $this;
    }

    /**
     * Remove formations
     *
     * @param \Cv\CvBundle\Entity\Formation $formations
     */
    public function removeFormation(\Cv\CvBundle\Entity\Formation $formations)
    {
        $this->formations->removeElement($formations);
    }

    /**
     * Add experiences
     *
     * @param \Cv\CvBundle\Entity\Experience $experiences
     * @return Profile
     */
    public function addExperience(\Cv\CvBundle\Entity\Experience $experiences)
    {
        $this->experiences[] = $experiences;

        return $this;
    }

    /**
     * Remove experiences
     *
     * @param \Cv\CvBundle\Entity\Experience $experiences
     */
    public function removeExperience(\Cv\CvBundle\Entity\Experience $experiences)
    {
        $this->experiences->removeElement($experiences);
    }

    /**
     * Add interets
     *
     * @param \Cv\CvBundle\Entity\Interet $interets
     * @return Profile
     */
    public function addInteret(\Cv\CvBundle\Entity\Interet $interets)
    {
        $this->interets[] = $interets;

        return $this;
    }

    /**
     * Remove interets
     *
     * @param \Cv\CvBundle\Entity\Interet $interets
     */
    public function removeInteret(\Cv\CvBundle\Entity\Interet $interets)
    {
        $this->interets->removeElement($interets);
    }

    /**
     * Add langues
     *
     * @param \Cv\CvBundle\Entity\Langue $langues
     * @return Profile
     */
    public function addLangue(\Cv\CvBundle\Entity\Langue $langues)
    {
        $this->langues[] = $langues;

        return $this;
    }

    /**
     * Remove langues
     *
     * @param \Cv\CvBundle\Entity\Langue $langues
     */
    public function removeLangue(\Cv\CvBundle\Entity\Langue $langues)
    {
        $this->langues->removeElement($langues);
    }

    /**
     * Add projets
     *
     * @param \Cv\CvBundle\Entity\Projet $projets
     * @return Profile
     */
    public function addProjet(\Cv\CvBundle\Entity\Projet $projets)
    {
        $this->projets[] = $projets;

        return $this;
    }

    /**
     * Remove projets
     *
     * @param \Cv\CvBundle\Entity\Projet $projets
     */
    public function removeProjet(\Cv\CvBundle\Entity\Projet $projets)
    {
        $this->projets->removeElement($projets);
    }
}
