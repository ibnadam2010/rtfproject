<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EntrepriseRepository")
 */
class Entreprise
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    //relation entre entreprise et commune
    /**
     * @ORM\ManyToOne(targetEntity="Commune", inversedBy="entreprises")
     * @ORM\JoinColumn(name="id_commune", referencedColumnName="id")
     */
    public $commune;

    //relation entre entreprise et offre
    /**
     * @ORM\OneToMany(targetEntity="Offre", mappedBy="entreprise")
     */
    public $offres;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_entreprise", type="string", length=255)
     */
    private $nomEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_entreprise", type="string", length=255)
     */
    private $adresseEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_entreprise", type="string", length=255)
     */
    private $telEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="email_entreprise", type="string", length=255)
     */
    private $emailEntreprise;


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
     * Set nomEntreprise.
     *
     * @param string $nomEntreprise
     *
     * @return Entreprise
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    /**
     * Get nomEntreprise.
     *
     * @return string
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * Set adresseEntreprise.
     *
     * @param string $adresseEntreprise
     *
     * @return Entreprise
     */
    public function setAdresseEntreprise($adresseEntreprise)
    {
        $this->adresseEntreprise = $adresseEntreprise;

        return $this;
    }

    /**
     * Get adresseEntreprise.
     *
     * @return string
     */
    public function getAdresseEntreprise()
    {
        return $this->adresseEntreprise;
    }

    /**
     * Set telEntreprise.
     *
     * @param string $telEntreprise
     *
     * @return Entreprise
     */
    public function setTelEntreprise($telEntreprise)
    {
        $this->telEntreprise = $telEntreprise;

        return $this;
    }

    /**
     * Get telEntreprise.
     *
     * @return string
     */
    public function getTelEntreprise()
    {
        return $this->telEntreprise;
    }

    /**
     * Set emailEntreprise.
     *
     * @param string $emailEntreprise
     *
     * @return Entreprise
     */
    public function setEmailEntreprise($emailEntreprise)
    {
        $this->emailEntreprise = $emailEntreprise;

        return $this;
    }

    /**
     * Get emailEntreprise.
     *
     * @return string
     */
    public function getEmailEntreprise()
    {
        return $this->emailEntreprise;
    }

    public function __toString()
   {
           return $this->getNomEntreprise();
   }
}
