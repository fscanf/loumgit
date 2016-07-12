<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of HistoriqueReglePaiementEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="HistoriqueReglePaiement")
 */
class HistoriqueReglePaiementEntity 
{
    /**
     * @ORM\Column(name="numReglePai", type="integer")
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
    
    /**
     * @ORM\Column(name="nomAnnee", type="string", length=20)
     */
    protected $nomAnnee;
    
    /**
     * @ORM\Column(name="codeClasse", type="string", length=50)
     */
    protected $codeClasse;
    
    /**
     * @ORM\Column(name="dateCreation", type="string", length=50)
     */ 
    protected $dateCreation;

    /**
     * Set numReglePai
     *
     * @param integer $numReglePai
     * @return HistoriqueReglePaiementEntity
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
     * @return HistoriqueReglePaiementEntity
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
     * @return HistoriqueReglePaiementEntity
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
     * @return HistoriqueReglePaiementEntity
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

    /**
     * Set nomAnnee
     *
     * @param string $nomAnnee
     * @return HistoriqueReglePaiementEntity
     */
    public function setNomAnnee($nomAnnee)
    {
        $this->nomAnnee = $nomAnnee;

        return $this;
    }

    /**
     * Get nomAnnee
     *
     * @return string 
     */
    public function getNomAnnee()
    {
        return $this->nomAnnee;
    }

    /**
     * Set codeClasse
     *
     * @param string $codeClasse
     * @return HistoriqueReglePaiementEntity
     */
    public function setCodeClasse($codeClasse)
    {
        $this->codeClasse = $codeClasse;

        return $this;
    }

    /**
     * Get codeClasse
     *
     * @return string 
     */
    public function getCodeClasse()
    {
        return $this->codeClasse;
    }

    /**
     * Set dateCreation
     *
     * @param string $dateCreation
     * @return HistoriqueReglePaiementEntity
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return string 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }
}
