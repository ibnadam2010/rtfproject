<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecole_sup
 *
 * @ORM\Table(name="ecole_sup")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Ecole_supRepository")
 */
class Ecole_sup
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
     * @ORM\Column(name="nom_ecole", type="string", length=255, unique=true)
     */
    private $nomEcole;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_universite", type="string", length=255)
     */
    private $nomUniversite;

    /**
     * @var string
     *
     * @ORM\Column(name="type_ecole", type="string", length=255)
     */
    private $typeEcole;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_ecole", type="string", length=255)
     */
    private $statutEcole;

    /**
     * @var string
     *
     * @ORM\Column(name="adres_ecole", type="string", length=255)
     */
    private $adresEcole;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_ecole", type="string", length=255)
     */
    private $telEcole;

    /**
     * @var string
     *
     * @ORM\Column(name="email_ecole", type="string", length=255)
     */
    private $emailEcole;

    /**
     * @var string
     *
     * @ORM\Column(name="url_ecole", type="string", length=255)
     */
    private $urlEcole;

    /**
     * @var string
     *
     * @ORM\Column(name="annee_creation", type="string", length=255)
     */
    private $anneeCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enreg", type="datetime")
     */
    private $dateEnreg;


    //relation entre ecole_sup et commune
    /**
     * @ORM\ManyToOne(targetEntity="Commune", inversedBy="ecole_sups")
     * @ORM\JoinColumn(name="id_commune", referencedColumnName="id")
     */
    public $commune;


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
     * Set nomEcole.
     *
     * @param string $nomEcole
     *
     * @return Ecole_sup
     */
    public function setNomEcole($nomEcole)
    {
        $this->nomEcole = $nomEcole;

        return $this;
    }

    /**
     * Get nomEcole.
     *
     * @return string
     */
    public function getNomEcole()
    {
        return $this->nomEcole;
    }

    /**
     * Set nomUniversite.
     *
     * @param string $nomUniversite
     *
     * @return Ecole_sup
     */
    public function setNomUniversite($nomUniversite)
    {
        $this->nomUniversite = $nomUniversite;

        return $this;
    }

    /**
     * Get nomUniversite.
     *
     * @return string
     */
    public function getNomUniversite()
    {
        return $this->nomUniversite;
    }

    /**
     * Set typeEcole.
     *
     * @param string $typeEcole
     *
     * @return Ecole_sup
     */
    public function setTypeEcole($typeEcole)
    {
        $this->typeEcole = $typeEcole;

        return $this;
    }

    /**
     * Get typeEcole.
     *
     * @return string
     */
    public function getTypeEcole()
    {
        return $this->typeEcole;
    }

    /**
     * Set statutEcole.
     *
     * @param string $statutEcole
     *
     * @return Ecole_sup
     */
    public function setStatutEcole($statutEcole)
    {
        $this->statutEcole = $statutEcole;

        return $this;
    }

    /**
     * Get statutEcole.
     *
     * @return string
     */
    public function getStatutEcole()
    {
        return $this->statutEcole;
    }

    /**
     * Set adresEcole.
     *
     * @param string $adresEcole
     *
     * @return Ecole_sup
     */
    public function setAdresEcole($adresEcole)
    {
        $this->adresEcole = $adresEcole;

        return $this;
    }

    /**
     * Get adresEcole.
     *
     * @return string
     */
    public function getAdresEcole()
    {
        return $this->adresEcole;
    }

    /**
     * Set telEcole.
     *
     * @param string $telEcole
     *
     * @return Ecole_sup
     */
    public function setTelEcole($telEcole)
    {
        $this->telEcole = $telEcole;

        return $this;
    }

    /**
     * Get telEcole.
     *
     * @return string
     */
    public function getTelEcole()
    {
        return $this->telEcole;
    }

    /**
     * Set emailEcole.
     *
     * @param string $emailEcole
     *
     * @return Ecole_sup
     */
    public function setEmailEcole($emailEcole)
    {
        $this->emailEcole = $emailEcole;

        return $this;
    }

    /**
     * Get emailEcole.
     *
     * @return string
     */
    public function getEmailEcole()
    {
        return $this->emailEcole;
    }

    /**
     * Set urlEcole.
     *
     * @param string $urlEcole
     *
     * @return Ecole_sup
     */
    public function setUrlEcole($urlEcole)
    {
        $this->urlEcole = $urlEcole;

        return $this;
    }

    /**
     * Get urlEcole.
     *
     * @return string
     */
    public function getUrlEcole()
    {
        return $this->urlEcole;
    }

    /**
     * Set anneeCreation.
     *
     * @param string $anneeCreation
     *
     * @return Ecole_sup
     */
    public function setAnneeCreation($anneeCreation)
    {
        $this->anneeCreation = $anneeCreation;

        return $this;
    }

    /**
     * Get anneeCreation.
     *
     * @return string
     */
    public function getAnneeCreation()
    {
        return $this->anneeCreation;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Ecole_sup
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
        $this->communes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }

    public function __toString()
  {
    return $this->getNomEcole();
  }
}
