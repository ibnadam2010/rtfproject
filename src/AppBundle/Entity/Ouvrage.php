<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ouvrage
 *
 * @ORM\Table(name="ouvrage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OuvrageRepository")
 */
class Ouvrage
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
     * @ORM\Column(name="nomOuvrage", type="string", length=255)
     */
    private $nomOuvrage;

    /**
     * @var string
     *
     * @ORM\Column(name="edition", type="string", length=255)
     */
    private $edition;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="annee", type="string", length=5)
     */
    private $annee;

    /**
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;


    /**
     * @var text
     *
     * @ORM\Column(name="commentaire", type="text",nullable=true)
     */
    private $commentaire;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomOuvrage
     *
     * @param string $nomOuvrage
     *
     * @return Ouvrage
     */
    public function setNomOuvrage($nomOuvrage)
    {
        $this->nomOuvrage = $nomOuvrage;

        return $this;
    }

    /**
     * Get nomOuvrage
     *
     * @return string
     */
    public function getNomOuvrage()
    {
        return $this->nomOuvrage;
    }

    /**
     * Set edition
     *
     * @param string $edition
     *
     * @return Ouvrage
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition
     *
     * @return string
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     *
     * @return Ouvrage
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set annee
     *
     * @param string $annee
     *
     * @return Ouvrage
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return string
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     *
     * @return Ouvrage
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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Ouvrage
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
}
