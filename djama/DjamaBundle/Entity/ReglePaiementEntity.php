<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of ReglePaiement
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="ReglePaiement")
 */
class ReglePaiementEntity 
{
    /**
     * @ORM\Id
     * @ORM\Column(name="numReglePai", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $numReglePai;
    
    /**
     * @ORM\Column(name="nomReglePai", type="string", length=1000)
     */
    protected $nomReglePai;
    
    /**
     * @ORM\Column(name="periodeDebut", type="string", length=20)
     */
    protected $periodeDebut;
    
    /**
     * @ORM\Column(name="periodeFin", type="string", length=20)
     */
    protected $periodeFin;

    public function ReglePaiementEntity($reglePaiement = array())
    {
        $this->numReglePai = $reglePaiement['numReglePai'];
        $this->nomReglePai = $reglePaiement['nomReglePai'];
        $this->periodeDebut= $reglePaiement['periodeDebut'];
        $this->periodeFin  = $reglePaiement['periodeFin'];
    }
    /**
     * Set NumReglePai
     * 
     * @param string $numReglePai
     * @return ReglePaiementEntity
     */
    public function setNumReglePai($numReglePai)
    {
        $this->numReglePai = $numReglePai;
        return $this;
    }
    /**
     * Get numReglePai
     *
     * @return integer 
     */
    public function getNumReglePai()
    {
        return $this->numReglePai;
    }

    /**
     * Set nomReglePai
     *
     * @param string $nomReglePai
     * @return ReglePaiementEntity
     */
    public function setNomReglePai($nomReglePai)
    {
        $this->nomReglePai = $nomReglePai;

        return $this;
    }

    /**
     * Get nomReglePai
     *
     * @return string 
     */
    public function getNomReglePai()
    {
        return $this->nomReglePai;
    }

    /**
     * Set periodeDebut
     *
     * @param string $periodeDebut
     * @return ReglePaiementEntity
     */
    public function setPeriodeDebut($periodeDebut)
    {
        $this->periodeDebut = $periodeDebut;

        return $this;
    }

    /**
     * Get periodeDebut
     *
     * @return string 
     */
    public function getPeriodeDebut()
    {
        return $this->periodeDebut;
    }

    /**
     * Set periodeFin
     *
     * @param string $periodeFin
     * @return ReglePaiementEntity
     */
    public function setPeriodeFin($periodeFin)
    {
        $this->periodeFin = $periodeFin;

        return $this;
    }

    /**
     * Get periodeFin
     *
     * @return string 
     */
    public function getPeriodeFin()
    {
        return $this->periodeFin;
    }
}
