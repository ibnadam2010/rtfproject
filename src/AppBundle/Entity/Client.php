<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    //relation entre client et agencertf
    /**
     * @ORM\ManyToOne(targetEntity="Agencertf", inversedBy="clients")
     * @ORM\JoinColumn(name="id_agencertf", referencedColumnName="id")
     */
    public $agencertf;

    /**
     * @var string
     *
     * @ORM\Column(name="raisonsociale_client", type="string", length=255)
     */
    private $raisonsocialeClient;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_client", type="string", length=255)
     */
    private $nomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_client", type="string", length=255)
     */
    private $prenomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="profession_client", type="string", length=255)
     */
    private $professionClient;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe_client", type="string", length=255)
     */
    private $sexeClient;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_client", type="string", length=255)
     */
    private $adresseClient;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_client", type="string", length=255)
     */
    private $telClient;

    /**
     * @var string
     *
     * @ORM\Column(name="email_client", type="string", length=255)
     */
    private $emailClient;

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
     * Set raisonsocialeClient.
     *
     * @param string $raisonsocialeClient
     *
     * @return Client
     */
    public function setRaisonsocialeClient($raisonsocialeClient)
    {
        $this->raisonsocialeClient = $raisonsocialeClient;

        return $this;
    }

    /**
     * Get raisonsocialeClient.
     *
     * @return string
     */
    public function getRaisonsocialeClient()
    {
        return $this->raisonsocialeClient;
    }

    /**
     * Set nomClient.
     *
     * @param string $nomClient
     *
     * @return Client
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    /**
     * Get nomClient.
     *
     * @return string
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * Set prenomClient.
     *
     * @param string $prenomClient
     *
     * @return Client
     */
    public function setPrenomClient($prenomClient)
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    /**
     * Get prenomClient.
     *
     * @return string
     */
    public function getPrenomClient()
    {
        return $this->prenomClient;
    }

    /**
     * Set professionClient.
     *
     * @param string $professionClient
     *
     * @return Client
     */
    public function setProfessionClient($professionClient)
    {
        $this->professionClient = $professionClient;

        return $this;
    }

    /**
     * Get professionClient.
     *
     * @return string
     */
    public function getProfessionClient()
    {
        return $this->professionClient;
    }

    /**
     * Set sexeClient.
     *
     * @param string $sexeClient
     *
     * @return Client
     */
    public function setSexeClient($sexeClient)
    {
        $this->sexeClient = $sexeClient;

        return $this;
    }

    /**
     * Get sexeClient.
     *
     * @return string
     */
    public function getSexeClient()
    {
        return $this->sexeClient;
    }

    /**
     * Set adresseClient.
     *
     * @param string $adresseClient
     *
     * @return Client
     */
    public function setAdresseClient($adresseClient)
    {
        $this->adresseClient = $adresseClient;

        return $this;
    }

    /**
     * Get adresseClient.
     *
     * @return string
     */
    public function getAdresseClient()
    {
        return $this->adresseClient;
    }

    /**
     * Set telClient.
     *
     * @param string $telClient
     *
     * @return Client
     */
    public function setTelClient($telClient)
    {
        $this->telClient = $telClient;

        return $this;
    }

    /**
     * Get telClient.
     *
     * @return string
     */
    public function getTelClient()
    {
        return $this->telClient;
    }

    /**
     * Set emailClient.
     *
     * @param string $emailClient
     *
     * @return Client
     */
    public function setEmailClient($emailClient)
    {
        $this->emailClient = $emailClient;

        return $this;
    }

    /**
     * Get emailClient.
     *
     * @return string
     */
    public function getEmailClient()
    {
        return $this->emailClient;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Client
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
           return $this->getNomClient();
   }

    public function __construct()
    {
        //$this->coachs = new \Doctrine\Common\Collections\ArrayCollection();
        //$this->diplomes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }
}
