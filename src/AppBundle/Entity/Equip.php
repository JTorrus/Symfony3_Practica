<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equip
 *
 * @ORM\Table(name="equip")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipRepository")
 */
class Equip
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
     * @ORM\Column(name="nom_equip", type="string", length=255)
     */
    private $nomEquip;

    /**
     * @var int
     *
     * @ORM\Column(name="any_fundacio", type="integer")
     */
    private $anyFundacio;


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
     * Set nomEquip
     *
     * @param string $nomEquip
     *
     * @return Equip
     */
    public function setNomEquip($nomEquip)
    {
        $this->nomEquip = $nomEquip;

        return $this;
    }

    /**
     * Get nomEquip
     *
     * @return string
     */
    public function getNomEquip()
    {
        return $this->nomEquip;
    }

    /**
     * Set anyFundacio
     *
     * @param integer $anyFundacio
     *
     * @return Equip
     */
    public function setAnyFundacio($anyFundacio)
    {
        $this->anyFundacio = $anyFundacio;

        return $this;
    }

    /**
     * Get anyFundacio
     *
     * @return int
     */
    public function getAnyFundacio()
    {
        return $this->anyFundacio;
    }
}

