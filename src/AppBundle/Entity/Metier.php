<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Metier
 *
 * @ORM\Table(name="metier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MetierRepository")
 */
class Metier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_metier", type="string", length=255)
     */
    private $nomMetier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enreg", type="datetime")
     */
    private $dateEnreg;

    //relation entre metier et diplome
    /**
     * @ORM\ManyToOne(targetEntity="Diplome", inversedBy="metiers")
     * @ORM\JoinColumn(name="id_diplome", referencedColumnName="id")
     */
    public $diplome;

    /**
     * @ORM\ManyToOne(targetEntity="Specialite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialite;


    


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
     * Set nomMetier.
     *
     * @param string $nomMetier
     *
     * @return Metier
     */
    public function setNomMetier($nomMetier)
    {
        $this->nomMetier = $nomMetier;

        return $this;
    }

    /**
     * Get nomMetier.
     *
     * @return string
     */
    public function getNomMetier()
    {
        return $this->nomMetier;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Metier
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

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->diplomes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->specialites = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }


    //////
    /**
     * Set specialite
     *
     * @param \AppBundle\Entity\Specialite $specialite
     *
     * @return Metier
     */
    public function setSpecialite(\AppBundle\Entity\Specialite $specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return \AppBundle\Entity\Specialite
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set diplome
     *
     * @param \AppBundle\Entity\Diplome $diplome
     *
     * @return Metier
     */
    public function setDiplome(\AppBundle\Entity\Diplome $diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return \AppBundle\Entity\Diplome
     */
    public function getDiplome()
    {
        return $this->diplome;
    }


    public function __toString()
  {
    return $this->getNomMetier();
  }
}
