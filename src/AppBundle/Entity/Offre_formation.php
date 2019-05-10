<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Offre_formation
 *
 * @ORM\Table(name="offre_formation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Offre_formationRepository")
 */
class Offre_formation
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

    // association

    /**
     * @ORM\ManyToOne(targetEntity="Specialite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialite;


    /**
     * @ORM\ManyToOne(targetEntity="Ecole_sup")
     * @ORM\JoinColumn(nullable=false)
     */
    public $ecole_sup;

    /**
     * Set ecole_sup
     *
     * @param \AppBundle\Entity\Ecole_sup $ecole_sup
     *
     * @return Offre_formation
     */
    public function setEcole_sup(\AppBundle\Entity\Ecole_sup $ecole_sup)
    {
        $this->ecole_sup = $ecole_sup;

        return $this;
    }

    /**
     * Get ecole_sup
     *
     * @return \AppBundle\Entity\Ecole_sup
     */
    public function getEcole_sup()
    {
        return $this->ecole_sup;
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
     * @return Offre_formation
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
        $this->ecole_sups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->specialites = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }
    public function __toString()
  {
    return $this->getNomOffre_formation();
  }
}
