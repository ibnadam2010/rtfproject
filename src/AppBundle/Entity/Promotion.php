<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * Promotion
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromotionRepository")
 */
class Promotion
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
     * @ORM\Column(name="nom_promotion", type="string", length=255)
     */
    private $nomPromotion;

    /**
     * @var string
     *
     * @ORM\Column(name="date_enreg", type="datetime", nullable=true, options={"default": "CURRENT_TIMESTAMP"})
     * @ Assert\GreaterThan("today")
     */
    private $dateEnreg;

    //association matiere promotion

    ///**
   //  * @ORM\ManyToMany(targetEntity="Matiere", cascade={"persist"})
   //  */
   // private $matiere;


    /**
     * @var text
     *
     * @ORM\Column(name="commentaire", type="text",nullable=true)
     */
    private $commentaire;

// promotion cycle
   // /**
    // * @ORM\ManyToOne(targetEntity="Cycle")
    // * @ORM\JoinColumn(nullable=false)
    // */
    //private $cycle;

    //relation entre promotion et cycle
    /**
     * @ORM\ManyToOne(targetEntity="Cycle", inversedBy="promotions")
     * @ORM\JoinColumn(name="id_cycle", referencedColumnName="id")
     */
    public $cycle;

    //relation entre Promotion et ouvrage
    /**
     * @ORM\OneToMany(targetEntity="Ouvrage", mappedBy="promotion")
     */

    public $ouvrages;

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
     * Set nomPromotion.
     *
     * @param string $nomPromotion
     *
     * @return Promotion
     */
    public function setNomPromotion($nomPromotion)
    {
        $this->nomPromotion = $nomPromotion;

        return $this;
    }

    /**
     * Get nomPromotion.
     *
     * @return string
     */
    public function getNomPromotion()
    {
        return $this->nomPromotion;
    }



    /**
     * Set dateEnreg.
     *
     * @param string $dateEnreg
     *
     * @return Promotion
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
        //$this->dateEnreg = new \DateTime();
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->matiere = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     *
     * @return Promotion
     */
    public function addMatiere(\AppBundle\Entity\Matiere $matiere)
    {
        $this->matiere[] = $matiere;

        return $this;
    }

    /**
     * Remove matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     */
    public function removeMatiere(\AppBundle\Entity\Matiere $matiere)
    {
        $this->matiere->removeElement($matiere);
    }

    /**
     * Get matiere
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set cycle
     *
     * @param \AppBundle\Entity\Cycle $cycle
     *
     * @return Promotion
     */
    public function setCycle(\AppBundle\Entity\Cycle $cycle)
    {
        $this->cycle = $cycle;

        return $this;
    }

    /**
     * Get cycle
     *
     * @return \AppBundle\Entity\Cycle
     */
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Promotion
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function __toString()
   {
           return $this->getNomPromotion();
   }
}
