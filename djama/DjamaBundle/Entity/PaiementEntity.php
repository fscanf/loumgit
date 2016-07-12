<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of PaiementEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="Paiement")
 */
class PaiementEntity {
   
    public function PaiementEntity($paiement)
    {
        $this->numPai       =   $paiement->numPai;
        $this->montantMens  =   isset($paiement->montantMens) == true ? $paiement->montantMens : null;
        $this->montantAnn   =   isset($paiement->montantAnn) == true ? $paiement->montantAnn : null;
        $this->totalPai     =   isset($paiement->totalPai) == true ? $paiement->totalPai : null;
        $this->datePai1     =   isset($paiement->datePai1)== true ? $paiement->datePai1 : null;
        $this->octobre      =   isset($paiement->octobre)== true ? $paiement->octobre : null;
        $this->montantOct   =   isset($paiement->montantOct)== true ? $paiement->montantOct : null;
        $this->datePai2     =   isset($paiement->datePai2)== true ? $paiement->datePai2 : null;
        $this->novembre     =   isset($paiement->novembre)== true ? $paiement->novembre : null;
        $this->montantNov   =   isset($paiement->montantNov)== true ? $paiement->montantNov : null;
        $this->datePai3     =   isset($paiement->datePai3)== true ? $paiement->datePai3 : null;
        $this->decembre     =   isset($paiement->decembre)== true ? $paiement->decembre : null;
        $this->montantDec   =   isset($paiement->montantDec)== true ? $paiement->montantDec : null;
        $this->datePai4     =   isset($paiement->datePai4)== true ? $paiement->datePai4 : null;
        $this->janvier      =   isset($paiement->janvier)== true ? $paiement->janvier : null;
        $this->montantJan   =   isset($paiement->montantJan)== true ? $paiement->montantJan : null;
        $this->datePai5     =   isset($paiement->datePai5)== true ? $paiement->datePai5 : null;
        $this->fevrier      =   isset($paiement->fevrier)== true ? $paiement->fevrier : null;
        $this->montantFev   =   isset($paiement->montantFev)== true ? $paiement->montantFev : null;
        $this->datePai6     =   isset($paiement->datePai6)== true ? $paiement->datePai6 : null;
        $this->mars         =   isset($paiement->mars)== true ? $paiement->mars : null;
        $this->montantMars  =   isset($paiement->montantMars)== true ? $paiement->montantMars : null;
        $this->datePai7     =   isset($paiement->datePai7)== true ? $paiement->datePai7 : null;
        $this->avril        =   isset($paiement->avril)== true ? $paiement->avril : null;
        $this->montantAv    =   isset($paiement->montantAv)== true ? $paiement->montantAv : null;
        $this->datePai8     =   isset($paiement->datePai8)== true ? $paiement->datePai8 : null;
        $this->mai          =   isset($paiement->mai)== true ? $paiement->mai : null;
        $this->montantMai   =   isset($paiement->montantMai)== true ? $paiement->montantMai : null;
        $this->datePai9     =   isset($paiement->datePai9)== true ? $paiement->datePai9 : null;
        $this->juin         =   isset($paiement->juin)== true ? $paiement->juin : null;
        $this->montantJuin  =   isset($paiement->montantJuin)== true ? $paiement->montantJuin : null;
    }
    /**
     * @ORM\Id
     * @ORM\Column(name="numPai", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numPai;
    
    /**
     * @ORM\Column(name="montantMens", type="float")
     */
    protected   $montantMens;
    
    /**
     * @ORM\Column(name="montantAnn", type="float")
     */
    protected   $montantAnn;
    
    /**
     * @ORM\Column(name="totalPai", type="float")
     */
    protected   $totalPai;
    
    /**
     * @ORM\Column(name="datePai1", type="string")
     */
    protected   $datePai1;
    
    /**
     * @ORM\Column(name="octobre", type="string", length=10)
     */
    protected   $octobre;
    
    /**
     * @ORM\Column(name="montantOct", type="float")
     */
    protected   $montantOct;
    
    /**
     * @ORM\Column(name="datePai2", type="string")
     */
    protected   $datePai2;
    
    /**
     * @ORM\Column(name="novembre", type="string", length=10)
     */
    protected   $novembre;
    
    /**
     * @ORM\Column(name="montantNov", type="float")
     */
    protected   $montantNov;
    
    /**
     * @ORM\Column(name="datePai3", type="string")
     */
    protected   $datePai3;
    
    /**
     * @ORM\Column(name="decembre", type="string", length=10)
     */
    protected   $decembre;
    
    /**
     * @ORM\Column(name="montantDec", type="float")
     */
    protected   $montantDec;
    
    /**
     * @ORM\Column(name="datePai4", type="string")
     */
    protected   $datePai4;
    
    /**
     * @ORM\Column(name="janvier", type="string", length=10)
     */
    protected   $janvier;
    
    /**
     * @ORM\Column(name="montantJan", type="float")
     */
    protected   $montantJan;
    
    /**
     * @ORM\Column(name="datePai5", type="string")
     */
    protected   $datePai5;
    
    /**
     * @ORM\Column(name="fevrier", type="string", length=10)
     */
    protected   $fevrier;
    
    /**
     * @ORM\Column(name="montantFev", type="float")
     */
    protected   $montantFev;
    
    /**
     * @ORM\Column(name="datePai6", type="string")
     */
    protected   $datePai6;
    
    /**
     * @ORM\Column(name="mars", type="string", length=10)
     */
    protected   $mars;
    
    /**
     * @ORM\Column(name="montantMars", type="float")
     */
    protected   $montantMars;
    
    /**
     * @ORM\Column(name="datePai7", type="string")
     */
    protected   $datePai7;
    
    /**
     * @ORM\Column(name="avril", type="string", length=10)
     */
    protected   $avril;
    
    /**
     * @ORM\Column(name="montantAv", type="float")
     */
    protected   $montantAv;
    
    /**
     * @ORM\Column(name="datePai8", type="string")
     */
    protected   $datePai8;
    
    /**
     * @ORM\Column(name="mai", type="string", length=10)
     */
    protected   $mai;
    
    /**
     * @ORM\Column(name="montantMai", type="float")
     */
    protected   $montantMai;
    
    /**
     * @ORM\Column(name="datePai9", type="string")
     */
    protected   $datePai9;
    
    /**
     * @ORM\Column(name="juin", type="string", length=10)
     */
    protected   $juin;
    
    /**
     * @ORM\Column(name="montantJuin", type="float")
     */
    protected   $montantJuin;

    /**
     * Get numPai
     *
     * @return integer 
     */
    public function getNumPai()
    {
        return $this->numPai;
    }

    /**
     * Set montantMens
     *
     * @param float $montantMens
     * @return PaiementEntity
     */
    public function setMontantMens($montantMens)
    {
        $this->montantMens = $montantMens;

        return $this;
    }

    /**
     * Get montantMens
     *
     * @return float 
     */
    public function getMontantMens()
    {
        return $this->montantMens;
    }

    /**
     * Set montantAnn
     *
     * @param float $montantAnn
     * @return PaiementEntity
     */
    public function setMontantAnn($montantAnn)
    {
        $this->montantAnn = $montantAnn;

        return $this;
    }

    /**
     * Get montantAnn
     *
     * @return float 
     */
    public function getMontantAnn()
    {
        return $this->montantAnn;
    }

    /**
     * Set totalPai
     *
     * @param float $totalPai
     * @return PaiementEntity
     */
    public function setTotalPai($totalPai)
    {
        $this->totalPai = $totalPai;

        return $this;
    }

    /**
     * Get totalPai
     *
     * @return float 
     */
    public function getTotalPai()
    {
        return $this->totalPai;
    }

    /**
     * Set datePai1
     *
     * @param string $datePai1
     * @return PaiementEntity
     */
    public function setDatePai1($datePai1)
    {
        $this->datePai1 = $datePai1;

        return $this;
    }

    /**
     * Get datePai1
     *
     * @return string 
     */
    public function getDatePai1()
    {
        return $this->datePai1;
    }

    /**
     * Set octobre
     *
     * @param string $octobre
     * @return PaiementEntity
     */
    public function setOctobre($octobre)
    {
        $this->octobre = $octobre;

        return $this;
    }

    /**
     * Get octobre
     *
     * @return string 
     */
    public function getOctobre()
    {
        return $this->octobre;
    }

    /**
     * Set montantOct
     *
     * @param float $montantOct
     * @return PaiementEntity
     */
    public function setMontantOct($montantOct)
    {
        $this->montantOct = $montantOct;

        return $this;
    }

    /**
     * Get montantOct
     *
     * @return float 
     */
    public function getMontantOct()
    {
        return $this->montantOct;
    }

    /**
     * Set datePai2
     *
     * @param string $datePai2
     * @return PaiementEntity
     */
    public function setDatePai2($datePai2)
    {
        $this->datePai2 = $datePai2;

        return $this;
    }

    /**
     * Get datePai2
     *
     * @return string 
     */
    public function getDatePai2()
    {
        return $this->datePai2;
    }

    /**
     * Set novembre
     *
     * @param string $novembre
     * @return PaiementEntity
     */
    public function setNovembre($novembre)
    {
        $this->novembre = $novembre;

        return $this;
    }

    /**
     * Get novembre
     *
     * @return string 
     */
    public function getNovembre()
    {
        return $this->novembre;
    }

    /**
     * Set montantNov
     *
     * @param float $montantNov
     * @return PaiementEntity
     */
    public function setMontantNov($montantNov)
    {
        $this->montantNov = $montantNov;

        return $this;
    }

    /**
     * Get montantNov
     *
     * @return float 
     */
    public function getMontantNov()
    {
        return $this->montantNov;
    }

    /**
     * Set datePai3
     *
     * @param string $datePai3
     * @return PaiementEntity
     */
    public function setDatePai3($datePai3)
    {
        $this->datePai3 = $datePai3;

        return $this;
    }

    /**
     * Get datePai3
     *
     * @return string 
     */
    public function getDatePai3()
    {
        return $this->datePai3;
    }

    /**
     * Set decembre
     *
     * @param string $decembre
     * @return PaiementEntity
     */
    public function setDecembre($decembre)
    {
        $this->decembre = $decembre;

        return $this;
    }

    /**
     * Get decembre
     *
     * @return string 
     */
    public function getDecembre()
    {
        return $this->decembre;
    }

    /**
     * Set montantDec
     *
     * @param float $montantDec
     * @return PaiementEntity
     */
    public function setMontantDec($montantDec)
    {
        $this->montantDec = $montantDec;

        return $this;
    }

    /**
     * Get montantDec
     *
     * @return float 
     */
    public function getMontantDec()
    {
        return $this->montantDec;
    }

    /**
     * Set datePai4
     *
     * @param string $datePai4
     * @return PaiementEntity
     */
    public function setDatePai4($datePai4)
    {
        $this->datePai4 = $datePai4;

        return $this;
    }

    /**
     * Get datePai4
     *
     * @return string 
     */
    public function getDatePai4()
    {
        return $this->datePai4;
    }

    /**
     * Set janvier
     *
     * @param string $janvier
     * @return PaiementEntity
     */
    public function setJanvier($janvier)
    {
        $this->janvier = $janvier;

        return $this;
    }

    /**
     * Get janvier
     *
     * @return string 
     */
    public function getJanvier()
    {
        return $this->janvier;
    }

    /**
     * Set montantJan
     *
     * @param float $montantJan
     * @return PaiementEntity
     */
    public function setMontantJan($montantJan)
    {
        $this->montantJan = $montantJan;

        return $this;
    }

    /**
     * Get montantJan
     *
     * @return float 
     */
    public function getMontantJan()
    {
        return $this->montantJan;
    }

    /**
     * Set datePai5
     *
     * @param string $datePai5
     * @return PaiementEntity
     */
    public function setDatePai5($datePai5)
    {
        $this->datePai5 = $datePai5;

        return $this;
    }

    /**
     * Get datePai5
     *
     * @return string 
     */
    public function getDatePai5()
    {
        return $this->datePai5;
    }

    /**
     * Set fevrier
     *
     * @param string $fevrier
     * @return PaiementEntity
     */
    public function setFevrier($fevrier)
    {
        $this->fevrier = $fevrier;

        return $this;
    }

    /**
     * Get fevrier
     *
     * @return string 
     */
    public function getFevrier()
    {
        return $this->fevrier;
    }

    /**
     * Set montantFev
     *
     * @param float $montantFev
     * @return PaiementEntity
     */
    public function setMontantFev($montantFev)
    {
        $this->montantFev = $montantFev;

        return $this;
    }

    /**
     * Get montantFev
     *
     * @return float 
     */
    public function getMontantFev()
    {
        return $this->montantFev;
    }

    /**
     * Set datePai6
     *
     * @param string $datePai6
     * @return PaiementEntity
     */
    public function setDatePai6($datePai6)
    {
        $this->datePai6 = $datePai6;

        return $this;
    }

    /**
     * Get datePai6
     *
     * @return string 
     */
    public function getDatePai6()
    {
        return $this->datePai6;
    }

    /**
     * Set mars
     *
     * @param string $mars
     * @return PaiementEntity
     */
    public function setMars($mars)
    {
        $this->mars = $mars;

        return $this;
    }

    /**
     * Get mars
     *
     * @return string 
     */
    public function getMars()
    {
        return $this->mars;
    }

    /**
     * Set montantMars
     *
     * @param float $montantMars
     * @return PaiementEntity
     */
    public function setMontantMars($montantMars)
    {
        $this->montantMars = $montantMars;

        return $this;
    }

    /**
     * Get montantMars
     *
     * @return float 
     */
    public function getMontantMars()
    {
        return $this->montantMars;
    }

    /**
     * Set datePai7
     *
     * @param string $datePai7
     * @return PaiementEntity
     */
    public function setDatePai7($datePai7)
    {
        $this->datePai7 = $datePai7;

        return $this;
    }

    /**
     * Get datePai7
     *
     * @return string 
     */
    public function getDatePai7()
    {
        return $this->datePai7;
    }

    /**
     * Set avril
     *
     * @param string $avril
     * @return PaiementEntity
     */
    public function setAvril($avril)
    {
        $this->avril = $avril;

        return $this;
    }

    /**
     * Get avril
     *
     * @return string 
     */
    public function getAvril()
    {
        return $this->avril;
    }

    /**
     * Set montantAv
     *
     * @param float $montantAv
     * @return PaiementEntity
     */
    public function setMontantAv($montantAv)
    {
        $this->montantAv = $montantAv;

        return $this;
    }

    /**
     * Get montantAv
     *
     * @return float 
     */
    public function getMontantAv()
    {
        return $this->montantAv;
    }

    /**
     * Set datePai8
     *
     * @param string $datePai8
     * @return PaiementEntity
     */
    public function setDatePai8($datePai8)
    {
        $this->datePai8 = $datePai8;

        return $this;
    }

    /**
     * Get datePai8
     *
     * @return string 
     */
    public function getDatePai8()
    {
        return $this->datePai8;
    }

    /**
     * Set mai
     *
     * @param string $mai
     * @return PaiementEntity
     */
    public function setMai($mai)
    {
        $this->mai = $mai;

        return $this;
    }

    /**
     * Get mai
     *
     * @return string 
     */
    public function getMai()
    {
        return $this->mai;
    }

    /**
     * Set montantMai
     *
     * @param float $montantMai
     * @return PaiementEntity
     */
    public function setMontantMai($montantMai)
    {
        $this->montantMai = $montantMai;

        return $this;
    }

    /**
     * Get montantMai
     *
     * @return float 
     */
    public function getMontantMai()
    {
        return $this->montantMai;
    }

    /**
     * Set datePai9
     *
     * @param string $datePai9
     * @return PaiementEntity
     */
    public function setDatePai9($datePai9)
    {
        $this->datePai9 = $datePai9;

        return $this;
    }

    /**
     * Get datePai9
     *
     * @return string 
     */
    public function getDatePai9()
    {
        return $this->datePai9;
    }

    /**
     * Set juin
     *
     * @param string $juin
     * @return PaiementEntity
     */
    public function setJuin($juin)
    {
        $this->juin = $juin;

        return $this;
    }

    /**
     * Get juin
     *
     * @return string 
     */
    public function getJuin()
    {
        return $this->juin;
    }

    /**
     * Set montantJuin
     *
     * @param float $montantJuin
     * @return PaiementEntity
     */
    public function setMontantJuin($montantJuin)
    {
        $this->montantJuin = $montantJuin;

        return $this;
    }

    /**
     * Get montantJuin
     *
     * @return float 
     */
    public function getMontantJuin()
    {
        return $this->montantJuin;
    }
}
