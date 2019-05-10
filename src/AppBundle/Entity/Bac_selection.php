<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Bac_selection
 *
 * @ORM\Table(name="bac_selection")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Bac_selectionRepository")
 */
class Bac_selection
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_enreg", type="datetime")
     */
    private $dateEnreg;

    //association
    /**
     * @ORM\ManyToOne(targetEntity="Specialite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialite;


    /**
     * @ORM\ManyToOne(targetEntity="Bac")
     * @ORM\JoinColumn(nullable=false)
     */
    public $bac;


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
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Bac_selection
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
     * Set specialite
     *
     * @param \AppBundle\Entity\Specialite $specialite
     *
     * @return Specialite
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
     * Constructor
     */
    public function __construct()
    {
        $this->bacs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->specialites = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }
}
