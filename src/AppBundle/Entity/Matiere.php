<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * Matiere
 *
 * @ORM\Table(name="matiere")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MatiereRepository")
 */
class Matiere
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
     * @ORM\Column(name="nom_matiere", type="string", length=255)
     */
    private $nomMatiere;

    /**
     * @var string
     *
     * @ORM\Column(name="date_enreg", type="datetime", nullable=true, options={"default": "CURRENT_TIMESTAMP"})
     * @ Assert\GreaterThan("today")
     */
    private $dateEnreg;

    //relation entre matiere et ouvrage
    ///**
   //  * @ORM\OneToMany(targetEntity="Ouvrage", mappedBy="matiere")
   //  */

    //private $ouvrages;

    //association 

    /**
    * @ORM\ManyToMany(targetEntity="Promotion", mappedBy="matieres")
    */
   private $promotions;
 
   public function __construct()
   {
       $this->promotions = new ArrayCollection();
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
     * Set nomMatiere.
     *
     * @param string $nomMatiere
     *
     * @return Matiere
     */
    public function setNomMatiere($nomMatiere)
    {
        $this->nomMatiere = $nomMatiere;

        return $this;
    }

    /**
     * Get nomMatiere.
     *
     * @return string
     */
    public function getNomMatiere()
    {
        return $this->nomMatiere;
    }


   /**
     * Set dateEnreg.
     *
     * @param string $dateEnreg
     *
     * @return Matiere
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
}
