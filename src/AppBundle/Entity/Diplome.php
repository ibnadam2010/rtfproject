<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\Extension\Core\Type\DateType;



/**
 * Diplome
 *
 * @ORM\Table(name="diplome")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DiplomeRepository")
 */
class Diplome
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
     * @ORM\Column(name="nom_diplome", type="string", length=255)
     */
    private $nomDiplome;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau_diplome", type="string", length=255)
     */
    private $niveauDiplome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enreg", type="datetime")
     */
    private $dateEnreg;

    //relation entre diplome et offre
    /**
     * @ORM\OneToMany(targetEntity="Offre", mappedBy="diplome")
     */
    public $offres;

    //relation entre diplome et specialite
    /**
     * @ORM\ManyToOne(targetEntity="Specialite", inversedBy="diplomes")
     * @ORM\JoinColumn(name="id_specialite", referencedColumnName="id")
     */
    public $specialite;

    //relation entre diplome et metier
    /**
     * @ORM\OneToMany(targetEntity="Metier", mappedBy="diplome")
     */
    public $metiers;


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
     * Set nomDiplome.
     *
     * @param string $nomDiplome
     *
     * @return Diplome
     */
    public function setNomDiplome($nomDiplome)
    {
        $this->nomDiplome = $nomDiplome;

        return $this;
    }

    /**
     * Get niveauDiplome.
     *
     * @return string
     */
    public function getNiveauDiplome()
    {
        return $this->niveauDiplome;
    }

    /**
     * Set niveauDiplome.
     *
     * @param string $niveauDiplome
     *
     * @return Diplome
     */
    public function setNiveauDiplome($niveauDiplome)
    {
        $this->niveauDiplome = $niveauDiplome;

        return $this;
    }

    /**
     * Get nomDiplome.
     *
     * @return string
     */
    public function getNomDiplome()
    {
        return $this->nomDiplome;
    }

    /**
     * Set dateEnreg.
     *
     * @param \DateTime $dateEnreg
     *
     * @return Diplome
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
        $this->specialites = new \Doctrine\Common\Collections\ArrayCollection();
        $this->metiers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEnreg = new \DateTime('now');
    }
    public function __toString()
  {
    return $this->getNomDiplome();
  }
}
