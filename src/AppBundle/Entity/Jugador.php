<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jugador
 *
 * @ORM\Table(name="jugador")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JugadorRepository")
 */
class Jugador
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="cognom", type="string", length=255)
     */
    private $cognom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_naixement", type="date")
     */
    private $dataNaixement;

    /**
     * @var float
     *
     * @ORM\Column(name="sou", type="float")
     */
    private $sou;

    /**
     * @var int
     *
     * @ORM\Column(name="IDequip", type="integer", unique=true)
     */
    private $iDequip;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equip", inversedBy="jugadors")
     * @ORM\JoinColumn(name="IDequip", referencedColumnName="id")
     */
    private $equip;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Jugador
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set cognom
     *
     * @param string $cognom
     *
     * @return Jugador
     */
    public function setCognom($cognom)
    {
        $this->cognom = $cognom;

        return $this;
    }

    /**
     * Get cognom
     *
     * @return string
     */
    public function getCognom()
    {
        return $this->cognom;
    }

    /**
     * Set dataNaixement
     *
     * @param \DateTime $dataNaixement
     *
     * @return Jugador
     */
    public function setDataNaixement($dataNaixement)
    {
        $this->dataNaixement = $dataNaixement;

        return $this;
    }

    /**
     * Get dataNaixement
     *
     * @return \DateTime
     */
    public function getDataNaixement()
    {
        return $this->dataNaixement;
    }

    /**
     * Set sou
     *
     * @param float $sou
     *
     * @return Jugador
     */
    public function setSou($sou)
    {
        $this->sou = $sou;

        return $this;
    }

    /**
     * Get sou
     *
     * @return float
     */
    public function getSou()
    {
        return $this->sou;
    }

    /**
     * Set iDequip
     *
     * @param integer $iDequip
     *
     * @return Jugador
     */
    public function setIDequip($iDequip)
    {
        $this->iDequip = $iDequip;

        return $this;
    }

    /**
     * Get iDequip
     *
     * @return int
     */
    public function getIDequip()
    {
        return $this->iDequip;
    }

    /**
     * @return mixed
     */
    public function getEquip()
    {
        return $this->equip;
    }

    /**
     * @param mixed $equip
     */
    public function setEquip($equip)
    {
        $this->equip = $equip;
    }


}

