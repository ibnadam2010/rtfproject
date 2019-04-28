<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Commune
 *
 * @ORM\Table(name="commune")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommuneRepository")
 */
class Commune
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
     * @ORM\Column(name="nom_commune", type="string", length=255, unique=true)
     */
    public $nomCommune;

    /**
     * @var string
     *
     * @ORM\Column(name="date_enreg", type="datetime", nullable=true, options={"default": "CURRENT_TIMESTAMP"})
     * @ Assert\GreaterThan("today")
     */
    private $dateEnreg;

    //relation entre departement et commune
    /**
     * @ORM\ManyToOne(targetEntity="Departement", inversedBy="communes")
     * @ORM\JoinColumn(name="id_departement", referencedColumnName="id")
     */
    public $departement;

    //relation entre arrond et commune
    /**
     * @ORM\OneToMany(targetEntity="Arrondissement", mappedBy="commune")
     */

    public $arrondissements;


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
     * Set nomCommune.
     *
     * @param string $nomCommune
     *
     * @return Commune
     */
    public function setNomCommune($nomCommune)
    {
        $this->nomCommune = $nomCommune;

        return $this;
    }

    /**
     * Get nomCommune.
     *
     * @return string
     */
    public function getNomCommune()
    {
        return $this->nomCommune;
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
       // return $this->dateEnreg;
        $this->dateEnreg = new \DateTime();
    }

    /**
    * toString
    * @return string
    */
   public function __toString()
   {
           return $this->getNomCommune();
   }

}
