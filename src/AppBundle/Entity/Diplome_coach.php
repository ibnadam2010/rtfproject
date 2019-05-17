<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Diplome_coach
 *
 * @ORM\Table(name="diplome_coach")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Diplome_coachRepository")
 */
class Diplome_coach
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
     * @ORM\ManyToOne(targetEntity="Coach")
     * @ORM\JoinColumn(nullable=false)
     */
    public $coach;


    /**
     * @ORM\ManyToOne(targetEntity="Diplome")
     * @ORM\JoinColumn(nullable=false)
     */
    public $diplome;

    /**
     * @var int
     *
     * @ORM\Column(name="anexperience_coach", type="integer")
     */
    private $anexperienceCoach;

    /**
     * @var int
     *
     * @ORM\Column(name="couthoraire_coach", type="integer")
     */
    private $couthoraireCoach;

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
     * Set anexperienceCoach.
     *
     * @param int $anexperienceCoach
     *
     * @return Diplome_coach
     */
    public function setAnexperienceCoach($anexperienceCoach)
    {
        $this->anexperienceCoach = $anexperienceCoach;

        return $this;
    }

    /**
     * Get anexperienceCoach.
     *
     * @return int
     */
    public function getAnexperienceCoach()
    {
        return $this->anexperienceCoach;
    }

    /**
     * Set couthoraireCoach.
     *
     * @param int $couthoraireCoach
     *
     * @return Diplome_coach
     */
    public function setCouthoraireCoach($couthoraireCoach)
    {
        $this->couthoraireCoach = $couthoraireCoach;

        return $this;
    }

    /**
     * Get couthoraireCoach.
     *
     * @return int
     */
    public function getCouthoraireCoach()
    {
        return $this->couthoraireCoach;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Diplome_coach
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
        $this->coachs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->diplomes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }

    
}
