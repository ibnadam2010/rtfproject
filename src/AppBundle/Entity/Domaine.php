<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Domaine
 *
 * @ORM\Table(name="domaine")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DomaineRepository")
 */
class Domaine
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
     * @ORM\Column(name="nom_domaine", type="string", length=255)
     */
    private $nomDomaine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enreg", type="datetime")
     */
    private $dateEnreg;

    //relation entre domaine et filiere
    /**
     * @ORM\OneToMany(targetEntity="Filiere", mappedBy="domaine")
     */
    public $filieres;


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
     * Set nomDomaine.
     *
     * @param string $nomDomaine
     *
     * @return Domaine
     */
    public function setNomDomaine($nomDomaine)
    {
        $this->nomDomaine = $nomDomaine;

        return $this;
    }

    /**
     * Get nomDomaine.
     *
     * @return string
     */
    public function getNomDomaine()
    {
        return $this->nomDomaine;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Domaine
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

   



  //////////////////////////

  /**
     * Constructor
     */
    public function __construct()
    {
        $this->filieres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }
    /**
     * Add filiere.
     *
     * @param \AppBundle\Entity\Filiere $filiere
     *
     * @return Domaine
     */
    public function addFiliere(\AppBundle\Entity\Filiere $filiere)
    {
        $this->filieres[] = $filiere;

        return $this;
    }
    /**
     * Remove filiere.
     *
     * @param \AppBundle\Entity\Filiere $filiere
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeFiliere(\AppBundle\Entity\Filiere $filiere)
    {
        return $this->filieres->removeElement($filiere);
    }

    /**
     * Get filieres.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFilieres()
    {
        return $this->filieres;
    }


    public function __toString()
  {
    return $this->getNomDomaine();
  }

}
