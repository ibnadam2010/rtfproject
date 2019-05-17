<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Commune
 *
 * @ORM\Table(name="commune")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommuneRepository")
 */
class Commune
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
     * @ORM\Column(name="nom_commune", type="string", length=255, unique=true)
     */
    public $nomCommune;

    /**
     * @var string
     *
     * @ORM\Column(name="date_enreg", type="datetime", nullable=true, options={"default": "CURRENT_TIMESTAMP"})
     * @ Assert\GreaterThan("today")
     */
    private $dateEnreg;

    //relation entre  commune et agencertf
    /**
     * @ORM\OneToMany(targetEntity="Agencertf", mappedBy="commune")
     */
    public $agencertfs;

    //relation entre departement et commune
    /**
     * @ORM\ManyToOne(targetEntity="Departement", inversedBy="communes")
     * @ORM\JoinColumn(name="id_departement", referencedColumnName="id")
     */
    public $departement;

    //relation entre arrond et commune
    /**
     * @ORM\OneToMany(targetEntity="Arrondissement", mappedBy="commune")
     */
    public $arrondissements;


    /**
     * @ORM\OneToMany(targetEntity="Etablissement", mappedBy="commune")
     */
    private $etablissements;


    //relation entre commune et ecole_sup
    /**
     * @ORM\OneToMany(targetEntity="Ecole_sup", mappedBy="commune")
     */
    public $ecole_sups;

    //relation entre commune et entreprise
    /**
     * @ORM\OneToMany(targetEntity="Entreprise", mappedBy="commune")
     */
    public $entreprises;


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
     * Set nomCommune.
     *
     * @param string $nomCommune
     *
     * @return Commune
     */
    public function setNomCommune($nomCommune)
    {
        $this->nomCommune = $nomCommune;

        return $this;
    }

    /**
     * Get nomCommune.
     *
     * @return string
     */
    public function getNomCommune()
    {
        return $this->nomCommune;
    }

    /**
     * Set dateEnreg.
     *
     * @param string $dateEnreg
     *
     * @return Commune
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
       return $this->dateEnreg;
        //$this->dateEnreg = new \DateTime('now');
    }

    /**
    * toString
    * @return string
    */
   public function __toString()
   {
           return $this->getNomCommune();
   }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->arrondissements = new \Doctrine\Common\Collections\ArrayCollection();
        $this->etablissements = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }

    /**
     * Set departement
     *
     * @param \AppBundle\Entity\Departement $departement
     *
     * @return Commune
     */
    public function setDepartement(\AppBundle\Entity\Departement $departement = null)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \AppBundle\Entity\Departement
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Add arrondissement
     *
     * @param \AppBundle\Entity\Arrondissement $arrondissement
     *
     * @return Commune
     */
    public function addArrondissement(\AppBundle\Entity\Arrondissement $arrondissement)
    {
        $this->arrondissements[] = $arrondissement;

        return $this;
    }

    /**
     * Remove arrondissement
     *
     * @param \AppBundle\Entity\Arrondissement $arrondissement
     */
    public function removeArrondissement(\AppBundle\Entity\Arrondissement $arrondissement)
    {
        $this->arrondissements->removeElement($arrondissement);
    }

    /**
     * Get arrondissements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArrondissements()
    {
        return $this->arrondissements;
    }

    /**
     * Add etablissement
     *
     * @param \AppBundle\Entity\Etablissement $etablissement
     *
     * @return Commune
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
