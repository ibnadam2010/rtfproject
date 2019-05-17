<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * Coach
 *
 * @ORM\Table(name="coach")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CoachRepository")
 */
class Coach
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    //relation entre coach et arrondissement
    /**
     * @ORM\ManyToOne(targetEntity="Arrondissement", inversedBy="coachs")
     * @ORM\JoinColumn(name="id_arrondissement", referencedColumnName="id")
     */
    public $arrondissement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_coach", type="string", length=255)
     */
    private $nomCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_coach", type="string", length=255)
     */
    private $prenomCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe_coach", type="string", length=255)
     */
    private $sexeCoach;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datenaissance_coach", type="date")
     */
    private $datenaissanceCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="piece_coach", type="string", length=255)
     */
    private $pieceCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="numpiece_coach", type="string", length=255)
     */
    private $numpieceCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_coach", type="string", length=255)
     */
    private $adresseCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_coach", type="string", length=255)
     */
    private $telCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="email_coach", type="string", length=255)
     */
    private $emailCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="type_coach", type="string", length=255)
     */
    private $typeCoach;

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
     * Set nomCoach.
     *
     * @param string $nomCoach
     *
     * @return Coach
     */
    public function setNomCoach($nomCoach)
    {
        $this->nomCoach = $nomCoach;

        return $this;
    }

    /**
     * Get nomCoach.
     *
     * @return string
     */
    public function getNomCoach()
    {
        return $this->nomCoach;
    }

    /**
     * Set prenomCoach.
     *
     * @param string $prenomCoach
     *
     * @return Coach
     */
    public function setPrenomCoach($prenomCoach)
    {
        $this->prenomCoach = $prenomCoach;

        return $this;
    }

    /**
     * Get prenomCoach.
     *
     * @return string
     */
    public function getPrenomCoach()
    {
        return $this->prenomCoach;
    }

    /**
     * Set sexeCoach.
     *
     * @param string $sexeCoach
     *
     * @return Coach
     */
    public function setSexeCoach($sexeCoach)
    {
        $this->sexeCoach = $sexeCoach;

        return $this;
    }

    /**
     * Get sexeCoach.
     *
     * @return string
     */
    public function getSexeCoach()
    {
        return $this->sexeCoach;
    }

    /**
     * Set datenaissanceCoach.
     *
     * @param \DateTime $datenaissanceCoach
     *
     * @return Coach
     */
    public function setDatenaissanceCoach($datenaissanceCoach)
    {
        $this->datenaissanceCoach = $datenaissanceCoach;

        return $this;
    }

    /**
     * Get datenaissanceCoach.
     *
     * @return \DateTime
     */
    public function getDatenaissanceCoach()
    {
        return $this->datenaissanceCoach;
    }

    /**
     * Set pieceCoach.
     *
     * @param string $pieceCoach
     *
     * @return Coach
     */
    public function setPieceCoach($pieceCoach)
    {
        $this->pieceCoach = $pieceCoach;

        return $this;
    }

    /**
     * Get pieceCoach.
     *
     * @return string
     */
    public function getPieceCoach()
    {
        return $this->pieceCoach;
    }

    /**
     * Set numpieceCoach.
     *
     * @param string $numpieceCoach
     *
     * @return Coach
     */
    public function setNumpieceCoach($numpieceCoach)
    {
        $this->numpieceCoach = $numpieceCoach;

        return $this;
    }

    /**
     * Get numpieceCoach.
     *
     * @return string
     */
    public function getNumpieceCoach()
    {
        return $this->numpieceCoach;
    }

    /**
     * Set adresseCoach.
     *
     * @param string $adresseCoach
     *
     * @return Coach
     */
    public function setAdresseCoach($adresseCoach)
    {
        $this->adresseCoach = $adresseCoach;

        return $this;
    }

    /**
     * Get adresseCoach.
     *
     * @return string
     */
    public function getAdresseCoach()
    {
        return $this->adresseCoach;
    }

    /**
     * Set telCoach.
     *
     * @param string $telCoach
     *
     * @return Coach
     */
    public function setTelCoach($telCoach)
    {
        $this->telCoach = $telCoach;

        return $this;
    }

    /**
     * Get telCoach.
     *
     * @return string
     */
    public function getTelCoach()
    {
        return $this->telCoach;
    }

    /**
     * Set emailCoach.
     *
     * @param string $emailCoach
     *
     * @return Coach
     */
    public function setEmailCoach($emailCoach)
    {
        $this->emailCoach = $emailCoach;

        return $this;
    }

    /**
     * Get emailCoach.
     *
     * @return string
     */
    public function getEmailCoach()
    {
        return $this->emailCoach;
    }

    /**
     * Set typeCoach.
     *
     * @param string $typeCoach
     *
     * @return Coach
     */
    public function setTypeCoach($typeCoach)
    {
        $this->typeCoach = $typeCoach;

        return $this;
    }

    /**
     * Get typeCoach.
     *
     * @return string
     */
    public function getTypeCoach()
    {
        return $this->typeCoach;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Coach
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
           return $this->getNomCoach();
   }

    public function __construct()
    {
        //$this->coachs = new \Doctrine\Common\Collections\ArrayCollection();
        //$this->diplomes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }
}
