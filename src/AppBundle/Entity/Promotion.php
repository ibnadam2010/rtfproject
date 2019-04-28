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

    //association

        /**
     * @ORM\ManyToMany(targetEntity="Matiere", inversedBy="promotions", cascade={"persist"})
     * @ORM\JoinTable(
     *     name="programmaaaa",
     *     joinColumns={
     *          @ORM\JoinColumn(name="promotion_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="matiere_id", referencedColumnName="id")
     *     }
     * )
     */
    private $matieres;
 
    public function __construct()
    {
        $this->matieres = new ArrayCollection();
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

    public function getMatieres(): Collection
    {
        return $this->matieres;
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
       // return $this->dateEnreg;
        $this->dateEnreg = new \DateTime();
    }
}
