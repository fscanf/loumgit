<?php

namespace djama\DjamaBundle\Form\ReglePaiement;

/**
 * Description of ReglePaiementFormEntity
 *
 * @author Djama
 */
class ReglePaiementFormEntity 
{
    public $numReglePai;
    
    public $nomReglePai;
    
    public $periodeDebut;
    
    public $periodeFin;
    
    public function getNumReglePai()
    {
        return $this->numReglePai;
    }
}
