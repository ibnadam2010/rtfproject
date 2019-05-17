<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OffreRepository")
 */
class Offre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    //relation entre offre et entreprise
    /**
     * @ORM\ManyToOne(targetEntity="Entreprise", inversedBy="offres")
     * @ORM\JoinColumn(name="id_entreprise", referencedColumnName="id")
     */
    public $entreprise;

    //relation entre offre et diplome
    /**
     * @ORM\ManyToOne(targetEntity="Diplome", inversedBy="offres")
     * @ORM\JoinColumn(name="id_diplome", referencedColumnName="id")
     */
    public $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="intitule_offre", type="string", length=255)
     */
    private $intituleOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="nature_offre", type="string", length=255)
     */
    private $natureOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="type_offre", type="string", length=255)
     */
    private $typeOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="duree_offre", type="string", length=255)
     */
    private $dureeOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="description_offre", type="text", nullable=true)
     */
    private $descriptionOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="pj_offre", type="string", length=255)
     */
    private $pjOffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datevalidite_offre", type="date")
     */
    private $datevaliditeOffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enreg", type="datetime")
     */
    private $dateEnreg;



    //algorithme telechargement de la piece jointe

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    private $temp;


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }


    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {

        return 'uploads/documents/PhotoPubvip';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (isset($this->temp)) {
            unlink($this->temp);
        }
    }


    //fin

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Offre
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set intituleOffre.
     *
     * @param string $intituleOffre
     *
     * @return Offre
     */
    public function setIntituleOffre($intituleOffre)
    {
        $this->intituleOffre = $intituleOffre;

        return $this;
    }

    /**
     * Get intituleOffre.
     *
     * @return string
     */
    public function getIntituleOffre()
    {
        return $this->intituleOffre;
    }

    /**
     * Set natureOffre.
     *
     * @param string $natureOffre
     *
     * @return Offre
     */
    public function setNatureOffre($natureOffre)
    {
        $this->natureOffre = $natureOffre;

        return $this;
    }

    /**
     * Get natureOffre.
     *
     * @return string
     */
    public function getNatureOffre()
    {
        return $this->natureOffre;
    }

    /**
     * Set typeOffre.
     *
     * @param string $typeOffre
     *
     * @return Offre
     */
    public function setTypeOffre($typeOffre)
    {
        $this->typeOffre = $typeOffre;

        return $this;
    }

    /**
     * Get typeOffre.
     *
     * @return string
     */
    public function getTypeOffre()
    {
        return $this->typeOffre;
    }

    /**
     * Set dureeOffre.
     *
     * @param string $dureeOffre
     *
     * @return Offre
     */
    public function setDureeOffre($dureeOffre)
    {
        $this->dureeOffre = $dureeOffre;

        return $this;
    }

    /**
     * Get dureeOffre.
     *
     * @return string
     */
    public function getDureeOffre()
    {
        return $this->dureeOffre;
    }

    /**
     * Set descriptionOffre.
     *
     * @param string $descriptionOffre
     *
     * @return Offre
     */
    public function setDescriptionOffre($descriptionOffre)
    {
        $this->descriptionOffre = $descriptionOffre;

        return $this;
    }

    /**
     * Get descriptionOffre.
     *
     * @return string
     */
    public function getDescriptionOffre()
    {
        return $this->descriptionOffre;
    }

    /**
     * Set pjOffre.
     *
     * @param string $pjOffre
     *
     * @return Offre
     */
    public function setPjOffre($pjOffre)
    {
        $this->pjOffre = $pjOffre;

        return $this;
    }

    /**
     * Get pjOffre.
     *
     * @return string
     */
    public function getPjOffre()
    {
        return $this->pjOffre;
    }

    /**
     * Set datevaliditeOffre.
     *
     * @param \DateTime $datevaliditeOffre
     *
     * @return Offre
     */
    public function setDatevaliditeOffre($datevaliditeOffre)
    {
        $this->datevaliditeOffre = $datevaliditeOffre;

        return $this;
    }

    /**
     * Get datevaliditeOffre.
     *
     * @return \DateTime
     */
    public function getDatevaliditeOffre()
    {
        return $this->datevaliditeOffre;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Offre
     */
    public function setDateEnreg($dateEnreg)
    {
        $this->dateEnreg = $dateEnreg;

        return $this;
    }

    /**
     * Get dateEnreg.
     *
     * @return \DateTime
     */
    public function getDateEnreg()
    {
        return $this->dateEnreg;
    }

    public function __toString()
   {
           return $this->getIntituleOffre();
   }

   /**
     * Constructor
     */
    public function __construct()
    {
        
        $this->dateEnreg = new \DateTime('now');
        //$this->entreprises = new \Doctrine\Common\Collections\ArrayCollection();
        //$this->diplomes = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
