<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceRepository")
 */
class Service
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
     * @ORM\Column(name="nom_service", type="string", length=255)
     */
    private $nomService;

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
     * Set nomService.
     *
     * @param string $nomService
     *
     * @return Service
     */
    public function setNomService($nomService)
    {
        $this->nomService = $nomService;

        return $this;
    }

    /**
     * Get nomService.
     *
     * @return string
     */
    public function getNomService()
    {
        return $this->nomService;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Service
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
           return $this->getNomService();
   }

   /**
     * Constructor
     */
    public function __construct()
    {
        
        $this->dateEnreg = new \DateTime('now');
    }
}
