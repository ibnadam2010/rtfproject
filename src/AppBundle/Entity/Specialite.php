<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Specialite
 *
 * @ORM\Table(name="specialite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SpecialiteRepository")
 */
class Specialite
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
     * @ORM\Column(name="nom_specialite", type="string", length=255)
     */
    private $nomSpecialite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_diplome", type="string", length=255)
     */
    private $nomDiplome;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enreg", type="datetime")
     */
    private $dateEnreg;

    //relation entre specialite et filiere
    /**
     * @ORM\ManyToOne(targetEntity="Filiere", inversedBy="specialites")
     * @ORM\JoinColumn(name="id_filiere", referencedColumnName="id")
     */
    public $filiere;

    //relation entre specialite et diplome
   // /**
    // * @ORM\OneToMany(targetEntity="Diplome", mappedBy="specialite")
    // */
   // public $diplomes;




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
     * Set nomSpecialite.
     *
     * @param string $nomSpecialite
     *
     * @return Specialite
     */
    public function setNomSpecialite($nomSpecialite)
    {
        $this->nomSpecialite = $nomSpecialite;

        return $this;
    }

    /**
     * Get nomSpecialite.
     *
     * @return string
     */
    public function getNomSpecialite()
    {
        return $this->nomSpecialite;
    }

    /**
     * Set nomDiplome.
     *
     * @param string $nomDiplome
     *
     * @return Specialite
     */
    public function setNomDiplome($nomDiplome)
    {
        $this->nomDiplome = $nomDiplome;

        return $this;
    }

    /**
     * Get nomDiplome.
     *
     * @return string
     */
    public function getNomDiplome()
    {
        return $this->nomDiplome;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Specialite
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
        $this->filieres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->metiers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ecole_sups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }

    public function __toString()
   {
           return $this->getNomSpecialite();
   }

   

    /**
     * Add ecole_sup
     *
     * @param \AppBundle\Entity\Ecole_sup $ecole_sup
     *
     * @return Ecole_sup
     */
    public function addEcole_sup(\AppBundle\Entity\Ecole_sup $ecole_sup)
    {
        $this->ecole_sup[] = $ecole_sup;

        return $this;
    }

    /**
     * Remove ecole_sup
     *
     * @param \AppBundle\Entity\Ecole_sup $ecole_sup
     */
    public function removeEcole_sup(\AppBundle\Entity\Ecole_sup $ecole_sup)
    {
        $this->ecole_sup->removeElement($ecole_sup);
    }

    /**
     * Get ecole_sup
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEcole_sup()
    {
        return $this->ecole_sup;
    }


    /////////////////////
    /**
     * Set filiere.
     *
     * @param string $filiere
     *
     * @return filiere
     */
    public function setFiliere($filiere)
    {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * Get filiere.
     *
     * @return string
     */
    public function getFiliere()
    {
        return $this->filiere;
    }
}
