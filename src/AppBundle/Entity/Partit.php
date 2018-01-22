<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partit
 *
 * @ORM\Table(name="partit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartitRepository")
 */
class Partit
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
     * @ORM\Column(name="temporada", type="integer")
     */
    private $temporada;

    /**
     * @var string
     *
     * @ORM\Column(name="competicio", type="string", length=255)
     */
    private $competicio;

    /**
     * @var int
     *
     * @ORM\Column(name="golslocal", type="integer")
     */
    private $golslocal;

    /**
     * @var int
     *
     * @ORM\Column(name="golsvisitant", type="integer")
     */
    private $golsvisitant;

    /**
     * @var int
     *
     * @ORM\Column(name="IDequip_local", type="integer")
     */
    private $iDequipLocal;

    /**
     * @var int
     *
     * @ORM\Column(name="IDequip_visitant", type="integer")
     */
    private $iDequipVisitant;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equip", inversedBy="partitsLocal")
     * @ORM\JoinColumn(name="IDequip_local", referencedColumnName="id")
     */
    private $equipLocal;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equip", inversedBy="partitsVisitant")
     * @ORM\JoinColumn(name="IDequip_visitant", referencedColumnName="id")
     */
    private $equipVisitant;
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
     * Set temporada
     *
     * @param integer $temporada
     *
     * @return Partit
     */
    public function setTemporada($temporada)
    {
        $this->temporada = $temporada;

        return $this;
    }

    /**
     * Get temporada
     *
     * @return int
     */
    public function getTemporada()
    {
        return $this->temporada;
    }

    /**
     * Set competicio
     *
     * @param string $competicio
     *
     * @return Partit
     */
    public function setCompeticio($competicio)
    {
        $this->competicio = $competicio;

        return $this;
    }

    /**
     * Get competicio
     *
     * @return string
     */
    public function getCompeticio()
    {
        return $this->competicio;
    }

    /**
     * Set golslocal
     *
     * @param integer $golslocal
     *
     * @return Partit
     */
    public function setGolslocal($golslocal)
    {
        $this->golslocal = $golslocal;

        return $this;
    }

    /**
     * Get golslocal
     *
     * @return int
     */
    public function getGolslocal()
    {
        return $this->golslocal;
    }

    /**
     * Set golsvisitant
     *
     * @param integer $golsvisitant
     *
     * @return Partit
     */
    public function setGolsvisitant($golsvisitant)
    {
        $this->golsvisitant = $golsvisitant;

        return $this;
    }

    /**
     * Get golsvisitant
     *
     * @return int
     */
    public function getGolsvisitant()
    {
        return $this->golsvisitant;
    }

    /**
     * Set iDequipLocal
     *
     * @param integer $iDequipLocal
     *
     * @return Partit
     */
    public function setIDequipLocal($iDequipLocal)
    {
        $this->iDequipLocal = $iDequipLocal;

        return $this;
    }

    /**
     * Get iDequipLocal
     *
     * @return int
     */
    public function getIDequipLocal()
    {
        return $this->iDequipLocal;
    }

    /**
     * Set iDequipVisitant
     *
     * @param integer $iDequipVisitant
     *
     * @return Partit
     */
    public function setIDequipVisitant($iDequipVisitant)
    {
        $this->iDequipVisitant = $iDequipVisitant;

        return $this;
    }

    /**
     * Get iDequipVisitant
     *
     * @return int
     */
    public function getIDequipVisitant()
    {
        return $this->iDequipVisitant;
    }

    /**
     * @return mixed
     */
    public function getEquipLocal()
    {
        return $this->equipLocal;
    }

    /**
     * @param mixed $equipLocal
     */
    public function setEquipLocal($equipLocal)
    {
        $this->equipLocal = $equipLocal;
    }

    /**
     * @return mixed
     */
    public function getEquipVisitant()
    {
        return $this->equipVisitant;
    }

    /**
     * @param mixed $equipVisitant
     */
    public function setEquipVisitant($equipVisitant)
    {
        $this->equipVisitant = $equipVisitant;
    }


}

