<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Epreuve_bac
 *
 * @ORM\Table(name="epreuve_bac")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Epreuve_bacRepository")
 */
class Epreuve_bac
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
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

    /**
     * @var int
     *
     * @ORM\Column(name="coef_epreuve", type="integer")
     */
    private $coefEpreuve;

    /**
     * @var string
     *
     * @ORM\Column(name="type_epreuve", type="string", length=255)
     */
    private $typeEpreuve;

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
     * @ORM\ManyToOne(targetEntity="Bac")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bac;

    /**
     * Set matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     *
     * @return Epreuve_bac
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
     * Set bac
     *
     * @param \AppBundle\Entity\Bac $bac
     *
     * @return Bac
     */
    public function setBac(\AppBundle\Entity\Bac $bac)
    {
        $this->bac = $bac;

        return $this;
    }

    /**
     * Get bac
     *
     * @return \AppBundle\Entity\Bac
     */
    public function getBac()
    {
        return $this->bac;
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
     * Set duree.
     *
     * @param int $duree
     *
     * @return Epreuve_bac
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree.
     *
     * @return int
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set coefEpreuve.
     *
     * @param int $coefEpreuve
     *
     * @return Epreuve_bac
     */
    public function setCoefEpreuve($coefEpreuve)
    {
        $this->coefEpreuve = $coefEpreuve;

        return $this;
    }

    /**
     * Get coefEpreuve.
     *
     * @return int
     */
    public function getCoefEpreuve()
    {
        return $this->coefEpreuve;
    }

    /**
     * Set typeEpreuve.
     *
     * @param string $typeEpreuve
     *
     * @return Epreuve_bac
     */
    public function setTypeEpreuve($typeEpreuve)
    {
        $this->typeEpreuve = $typeEpreuve;

        return $this;
    }

    /**
     * Get typeEpreuve.
     *
     * @return string
     */
    public function getTypeEpreuve()
    {
        return $this->typeEpreuve;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Epreuve_bac
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
        $this->bacs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->matieres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }
}
