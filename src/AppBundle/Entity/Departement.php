<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DepartementRepository")
 */
class Departement
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
     * @ORM\Column(name="nom_departement", type="string", length=255, unique=true)
     */

    private $nomDepartement;

    /**
     * @var string
     *
     * @ORM\Column(name="date_enreg", type="datetime", nullable=true, options={"default": "CURRENT_TIMESTAMP"})
     * @ Assert\GreaterThan("today")
     */
    private $dateEnreg;

    //relation entre departement et commune
    /**
     * @ORM\OneToMany(targetEntity="Commune", mappedBy="departement")
     */
    public $communes;

    /**
     * @ORM\OneToMany(targetEntity="Etablissement", mappedBy="departement")
     */
    private $etablissements;

    
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
     * Set nomDepartement.
     *
     * @param string $nomDepartement
     *
     * @return Departement
     */
    public function setNomDepartement($nomDepartement)
    {
        $this->nomDepartement = $nomDepartement;

        return $this;
    }

    /**
     * Get nomDepartement.
     *
     * @return string
     */
    public function getNomDepartement()
    {
        return $this->nomDepartement;
    }

/**
     * Set dateEnreg.
     *
     * @param string $dateEnreg
     *
     * @return Departement
     */
    public function setDateEnreg($dateEnreg)
    {
        $this->dateEnreg = $dateEnreg;

        return $this;
    }

    /**
     * Get dateEnreg.
     *
     * @return string
     */
    public function getDateEnreg()
    {
       // return $this->dateEnreg;
        $this->dateEnreg = new \DateTime();
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->communes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Add commune.
     *
     * @param \AppBundle\Entity\Commune $commune
     *
     * @return Departement
     */
    public function addCommune(\AppBundle\Entity\Commune $commune)
    {
        $this->communes[] = $commune;

        return $this;
    }
    /**
     * Remove commune.
     *
     * @param \AppBundle\Entity\Commune $commune
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCommune(\AppBundle\Entity\Commune $commune)
    {
        return $this->communes->removeElement($commune);
    }

    /**
     * Get communes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommunes()
    {
        return $this->communes;
    }


    public function __toString()
  {
    return $this->getNomDepartement();
  }


    /**
     * Add etablissement
     *
     * @param \AppBundle\Entity\Etablissement $etablissement
     *
     * @return Departement
     */
    public function addEtablissement(\AppBundle\Entity\Etablissement $etablissement)
    {
        $this->etablissements[] = $etablissement;

        return $this;
    }

    /**
     * Remove etablissement
     *
     * @param \AppBundle\Entity\Etablissement $etablissement
     */
    public function removeEtablissement(\AppBundle\Entity\Etablissement $etablissement)
    {
        $this->etablissements->removeElement($etablissement);
    }

    /**
     * Get etablissements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtablissements()
    {
        return $this->etablissements;
    }
}
