<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Matiere_selection
 *
 * @ORM\Table(name="matiere_selection")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Matiere_selectionRepository")
 */
class Matiere_selection
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
     * @var int
     *
     * @ORM\Column(name="coef_matiere", type="integer")
     */
    private $coefMatiere;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enreg", type="datetime")
     */
    private $dateEnreg;

    //association

    /**
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;


    /**
     * @ORM\ManyToOne(targetEntity="Specialite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialite;


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
     * Set coefMatiere.
     *
     * @param int $coefMatiere
     *
     * @return Matiere_selection
     */
    public function setCoefMatiere($coefMatiere)
    {
        $this->coefMatiere = $coefMatiere;

        return $this;
    }

    /**
     * Get coefMatiere.
     *
     * @return int
     */
    public function getCoefMatiere()
    {
        return $this->coefMatiere;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Matiere_selection
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

    public function __construct()
    {
        $this->matieres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->specialites = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }

}
