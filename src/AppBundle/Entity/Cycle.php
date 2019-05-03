<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cycle
 *
 * @ORM\Table(name="cycle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CycleRepository")
 */
class Cycle
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
     * @var text
     *
     * @ORM\Column(name="commentaire", type="text",nullable=true)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cycle", type="string", length=255)
     */
    private $nomCycle;

    /**
     * @var string
     *
     * @ORM\Column(name="date_enreg", type="datetime", nullable=true, options={"default": "CURRENT_TIMESTAMP"})
     * @ Assert\GreaterThan("today")
     */
    private $dateEnreg;

    //relation entre cycle et promotion
    /**
     * @ORM\OneToMany(targetEntity="Promotion", mappedBy="cycle")
     */

    public $promotions;



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
     * Set nomCycle.
     *
     * @param string $nomCycle
     *
     * @return Cycle
     */
    public function setNomCycle($nomCycle)
    {
        $this->nomCycle = $nomCycle;

        return $this;
    }

    /**
     * Get nomCycle.
     *
     * @return string
     */
    public function getNomCycle()
    {
        return $this->nomCycle;
    }

    /**
     * Set dateEnreg.
     *
     * @param string $dateEnreg
     *
     * @return Cycle
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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Cycle
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
           return $this->getNomCycle();
   }
}
