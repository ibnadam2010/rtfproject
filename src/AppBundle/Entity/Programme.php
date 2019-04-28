<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programme
 *
 * @ORM\Table(name="programme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProgrammeRepository")
 */
class Programme
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
     * @ORM\Column(name="coef", type="decimal", precision=10, scale=0)
     */
    private $coef;

    /**
     * @var string
     *
     * @ORM\Column(name="masse_horaire", type="decimal", precision=10, scale=0)
     */
    private $masseHoraire;


    //partie liaison

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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

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
     *
     * @param string $masseHoraire
     *
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
}
