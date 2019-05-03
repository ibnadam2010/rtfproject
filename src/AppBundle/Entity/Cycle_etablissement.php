<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cycle_etablissement
 *
 * @ORM\Table(name="cycle_etablissement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Cycle_etablissementRepository")
 */
class Cycle_etablissement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    //partie liaison (cycle & etablissement)

    /**
   * @ORM\ManyToOne(targetEntity="Cycle")
   * @ORM\JoinColumn(nullable=false)
   */
  public $cycle;

  /**
   * @ORM\ManyToOne(targetEntity="Etablissement")
   * @ORM\JoinColumn(nullable=false)
   */
  public $etablissement;

  /**
     * @var string
     *
     * @ORM\Column(name="date_enreg", type="datetime", nullable=true, options={"default": "CURRENT_TIMESTAMP"})
     * @ Assert\GreaterThan("today")
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
     * Constructor
     */
    public function __construct()
    {
        $this->cycles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->etablissements = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }


     /**
     * Set dateEnreg.
     *
     * @param string $dateEnreg
     *
     * @return Commune
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
}
