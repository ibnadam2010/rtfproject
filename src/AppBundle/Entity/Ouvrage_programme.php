<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Ouvrage_programme
 *
 * @ORM\Table(name="ouvrage_programme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Ouvrage_programmeRepository")
 */
class Ouvrage_programme
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    //partie liaison (promotion & matiere & ouvrage)

    /**
   * @ORM\ManyToOne(targetEntity="Matiere")
   * @ORM\JoinColumn(nullable=false)
   */
  public $matiere;

  /**
   * @ORM\ManyToOne(targetEntity="Promotion")
   * @ORM\JoinColumn(nullable=false)
   */
  public $promotion;
  /**
   * @ORM\ManyToOne(targetEntity="Ouvrage")
   * @ORM\JoinColumn(nullable=false)
   */
  public $ouvrage;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
