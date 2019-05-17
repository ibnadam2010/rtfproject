<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Prestation
 *
 * @ORM\Table(name="prestation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PrestationRepository")
 */
class Prestation
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
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumn(nullable=false)
     */
    public $service;


    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;


    /**
     * @var int
     *
     * @ORM\Column(name="duree_prestation", type="integer")
     */
    private $dureePrestation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut_prestation", type="date")
     */
    private $datedebutPrestation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin_prestation", type="date")
     */
    private $datefinPrestation;

    /**
     * @var string
     *
     * @ORM\Column(name="cout_prestation", type="decimal", precision=10, scale=0)
     */
    private $coutPrestation;

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
     * Set dureePrestation.
     *
     * @param int $dureePrestation
     *
     * @return Prestation
     */
    public function setDureePrestation($dureePrestation)
    {
        $this->dureePrestation = $dureePrestation;

        return $this;
    }

    /**
     * Get dureePrestation.
     *
     * @return int
     */
    public function getDureePrestation()
    {
        return $this->dureePrestation;
    }

    /**
     * Set datedebutPrestation.
     *
     * @param \DateTime $datedebutPrestation
     *
     * @return Prestation
     */
    public function setDatedebutPrestation($datedebutPrestation)
    {
        $this->datedebutPrestation = $datedebutPrestation;

        return $this;
    }

    /**
     * Get datedebutPrestation.
     *
     * @return \DateTime
     */
    public function getDatedebutPrestation()
    {
        return $this->datedebutPrestation;
    }

    /**
     * Set datefinPrestation.
     *
     * @param \DateTime $datefinPrestation
     *
     * @return Prestation
     */
    public function setDatefinPrestation($datefinPrestation)
    {
        $this->datefinPrestation = $datefinPrestation;

        return $this;
    }

    /**
     * Get datefinPrestation.
     *
     * @return \DateTime
     */
    public function getDatefinPrestation()
    {
        return $this->datefinPrestation;
    }

    /**
     * Set coutPrestation.
     *
     * @param string $coutPrestation
     *
     * @return Prestation
     */
    public function setCoutPrestation($coutPrestation)
    {
        $this->coutPrestation = $coutPrestation;

        return $this;
    }

    /**
     * Get coutPrestation.
     *
     * @return string
     */
    public function getCoutPrestation()
    {
        return $this->coutPrestation;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Prestation
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

    //////////////////
    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Prestation
     */
    public function setClient(\AppBundle\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set service
     *
     * @param \AppBundle\Entity\Service $service
     *
     * @return Prestation
     */
    public function setPromotion(\AppBundle\Entity\Service $service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \AppBundle\Entity\Service
     */
    public function getPromotion()
    {
        return $this->service;
    }

     /**
     * Constructor
     */
    public function __construct()
    {
        $this->services = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clients = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }
    
}
