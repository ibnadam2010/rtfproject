<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * Arrondissement
 *
 * @ORM\Table(name="arrondissement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArrondissementRepository")
 */
class Arrondissement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_arrondissement", type="string", length=255)
     */
    public $nomArrondissement;

    /**
     * @var string
     *
     * @ORM\Column(name="date_enreg", type="datetime", nullable=true, options={"default": "CURRENT_TIMESTAMP"})
     * @ Assert\GreaterThan("today")
     */
    public $dateEnreg;

    //

    /**
     * @ORM\ManyToOne(targetEntity="Commune", inversedBy="arrondissements")
     * @ORM\JoinColumn(name="id_commune", referencedColumnName="id")
     */

    
    public $commune;


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
     * Set nomArrondissement.
     *
     * @param string $nomArrondissement
     *
     * @return Arrondissement
     */
    public function setNomArrondissement($nomArrondissement)
    {
        $this->nomArrondissement = $nomArrondissement;

        return $this;
    }

    /**
     * Get nomArrondissement.
     *
     * @return string
     */
    public function getNomArrondissement()
    {
        return $this->nomArrondissement;
    }

    /**
     * Set dateEnreg.
     *
     * @param string $dateEnreg
     *
     * @return Arrondissement
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
