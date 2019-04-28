<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * Etablissement
 *
 * @ORM\Table(name="etablissement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtablissementRepository")
 */
class Etablissement
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
     * @ORM\Column(name="nom_etablissement", type="string", length=255)
     */
    private $nomEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="type_etablissement", type="string", length=255)
     */
    private $typeEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_etablissement", type="string", length=255)
     */
    private $statutEtablissement;


    /**
     * @var string
     *
     * @ORM\Column(name="date_creation", type="string", length=255)
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_etablissement", type="string", length=255)
     */
    private $adresseEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_etablissement", type="text")
     */
    private $telEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="email_etablissement", type="text")
     */
    private $emailEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="siteweb_etablissement", type="text")
     */
    private $sitewebEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="date_enreg", type="datetime", nullable=true, options={"default": "CURRENT_TIMESTAMP"})
     * @ Assert\GreaterThan("today")
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
     * Set nomEtablissement.
     *
     * @param string $nomEtablissement
     *
     * @return Etablissement
     */
    public function setNomEtablissement($nomEtablissement)
    {
        $this->nomEtablissement = $nomEtablissement;

        return $this;
    }

    /**
     * Get nomEtablissement.
     *
     * @return string
     */
    public function getNomEtablissement()
    {
        return $this->nomEtablissement;
    }

    /**
     * Set typeEtablissement.
     *
     * @param string $typeEtablissement
     *
     * @return Etablissement
     */
    public function setTypeEtablissement($typeEtablissement)
    {
        $this->typeEtablissement = $typeEtablissement;

        return $this;
    }

    /**
     * Get typeEtablissement.
     *
     * @return string
     */
    public function getTypeEtablissement()
    {
        return $this->typeEtablissement;
    }

    /**
     * Set statutEtablissement.
     *
     * @param string $statutEtablissement
     *
     * @return Etablissement
     */
    public function setStatutEtablissement($statutEtablissement)
    {
        $this->statutEtablissement = $statutEtablissement;

        return $this;
    }

    /**
     * Get statutEtablissement.
     *
     * @return string
     */
    public function getStatutEtablissement()
    {
        return $this->statutEtablissement;
    }

    /**
     * Set adresseEtablissement.
     *
     * @param string $adresseEtablissement
     *
     * @return Etablissement
     */
    public function setAdresseEtablissement($adresseEtablissement)
    {
        $this->adresseEtablissement = $adresseEtablissement;

        return $this;
    }

    /**
     * Get adresseEtablissement.
     *
     * @return string
     */
    public function getAdresseEtablissement()
    {
        return $this->adresseEtablissement;
    }

    /**
     * Set telEtablissement.
     *
     * @param string $telEtablissement
     *
     * @return Etablissement
     */
    public function setTelEtablissement($telEtablissement)
    {
        $this->telEtablissement = $telEtablissement;

        return $this;
    }

    /**
     * Get telEtablissement.
     *
     * @return string
     */
    public function getTelEtablissement()
    {
        return $this->telEtablissement;
    }

    /**
     * Set emailEtablissement.
     *
     * @param string $emailEtablissement
     *
     * @return Etablissement
     */
    public function setEmailEtablissement($emailEtablissement)
    {
        $this->emailEtablissement = $emailEtablissement;

        return $this;
    }

    /**
     * Get emailEtablissement.
     *
     * @return string
     */
    public function getEmailEtablissement()
    {
        return $this->emailEtablissement;
    }

    /**
     * Set sitewebEtablissement.
     *
     * @param string $sitewebEtablissement
     *
     * @return Etablissement
     */
    public function setSitewebEtablissement($sitewebEtablissement)
    {
        $this->sitewebEtablissement = $sitewebEtablissement;

        return $this;
    }

    /**
     * Get sitewebEtablissement.
     *
     * @return string
     */
    public function getSitewebEtablissement()
    {
        return $this->sitewebEtablissement;
    }

    /**
     * Set dateEnreg.
     *
     * @param string $dateEnreg
     *
     * @return Etablissement
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateEnreg.
     *
     * @return string
     */
    public function getDateCreation()
    {
       // return $this->dateEnreg;
        $this->dateCreation = new \DateTime();
    }

     

}
