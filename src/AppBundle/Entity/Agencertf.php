<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Agencertf
 *
 * @ORM\Table(name="agencertf")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AgencertfRepository")
 */
class Agencertf
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    //relation entre agencertf et commune
    /**
     * @ORM\ManyToOne(targetEntity="Commune", inversedBy="agencertfs")
     * @ORM\JoinColumn(name="id_commune", referencedColumnName="id")
     */
    public $commune;

     //relation entre agencertf et client
    /**
     * @ORM\OneToMany(targetEntity="Client", mappedBy="agencertf")
     */
    public $clients;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_agence", type="string", length=255)
     */
    private $nomAgence;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_agence", type="string", length=255)
     */
    private $adresseAgence;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_agence", type="string", length=255)
     */
    private $telAgence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enreg", type="datetime")
     */
    private $dateEnreg;


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
     * Set nomAgence.
     *
     * @param string $nomAgence
     *
     * @return Agencertf
     */
    public function setNomAgence($nomAgence)
    {
        $this->nomAgence = $nomAgence;

        return $this;
    }

    /**
     * Get nomAgence.
     *
     * @return string
     */
    public function getNomAgence()
    {
        return $this->nomAgence;
    }

    /**
     * Set adresseAgence.
     *
     * @param string $adresseAgence
     *
     * @return Agencertf
     */
    public function setAdresseAgence($adresseAgence)
    {
        $this->adresseAgence = $adresseAgence;

        return $this;
    }

    /**
     * Get adresseAgence.
     *
     * @return string
     */
    public function getAdresseAgence()
    {
        return $this->adresseAgence;
    }

    /**
     * Set telAgence.
     *
     * @param string $telAgence
     *
     * @return Agencertf
     */
    public function setTelAgence($telAgence)
    {
        $this->telAgence = $telAgence;

        return $this;
    }

    /**
     * Get telAgence.
     *
     * @return string
     */
    public function getTelAgence()
    {
        return $this->telAgence;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Agencertf
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
           return $this->getNomAgence();
   }

    public function __construct()
    {
        //$this->coachs = new \Doctrine\Common\Collections\ArrayCollection();
        //$this->diplomes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }
}
