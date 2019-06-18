<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Programme
 * @ORM\Table(name="programme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProgrammeRepository")
 */
class Programme
{

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="coef", type="decimal", precision=10, scale=0)
     */
    private $coef;


    /**
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;


    /**
     * @ORM\ManyToOne(targetEntity="Promotion")
     * @ORM\JoinColumn(nullable=false)
     */
    private $promotion;


    /**
     * @var string
     *
     * @ORM\Column(name="masse_horaire", type="decimal", precision=10, scale=0)
     */
    private $masseHoraire;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="date_enreg", type="datetime", nullable=true, options={"default": "CURRENT_TIMESTAMP"})
     * @ Assert\GreaterThan("today")
     */
    private $dateEnreg;


    /**
     * Set coef.
     *
     * @param string $coef
     *
     * @return Programme
     */
    public function setCoef($coef)
    {
        $this->coef = $coef;

        return $this;
    }

    /**
     * Get coef.
     *
     * @return string
     */
    public function getCoef()
    {
        return $this->coef;
    }

    /**
     * Set masseHoraire.
     * @param string $masseHoraire
     * @return Programme
     */
    public function setMasseHoraire($masseHoraire)
    {
        $this->masseHoraire = $masseHoraire;

        return $this;
    }

    /**
     * Get masseHoraire.
     *
     * @return string
     */
    public function getMasseHoraire()
    {
        return $this->masseHoraire;
    }




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     *
     * @return Programme
     */
    public function setMatiere(\AppBundle\Entity\Matiere $matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return \AppBundle\Entity\Matiere
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     *
     * @return Programme
     */
    public function setPromotion(\AppBundle\Entity\Promotion $promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return \AppBundle\Entity\Promotion
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Set dateEnreg.
     *
     * @param string $dateEnreg
     *
     * @return Ouvrage
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
     * Constructor
     */
    public function __construct()
    {
        $this->promotions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->matieres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Programme
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    
}
