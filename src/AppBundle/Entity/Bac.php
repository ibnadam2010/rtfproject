<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * Bac
 *
 * @ORM\Table(name="bac")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BacRepository")
 */
class Bac
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
     * @ORM\Column(name="nom_bac", type="string", length=255)
     */
    private $nomBac;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enreg", type="datetime" , nullable=true)
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
     * Set nomBac.
     *
     * @param string $nomBac
     *
     * @return Bac
     */
    public function setNomBac($nomBac)
    {
        $this->nomBac = $nomBac;

        return $this;
    }

    /**
     * Get nomBac.
     *
     * @return string
     */
    public function getNomBac()
    {
        return $this->nomBac;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Bac
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

    public function __construct()
    {
        $this->matiere = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');

    }

    /**
     * Add matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     *
     * @return Bac
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

    public function __toString()
  {
    return $this->getNomBac();
  }
}
