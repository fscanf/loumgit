<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of EleveInsReinsEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="EleveInsReins")
 */
class EleveInsReinsEntity {
   
    public function EleveInsReinsEntity($elevInsReins = array())
    {
        $this->numAppre     =   $elevInsReins['numAppre'];
        $this->numCom       =   $elevInsReins['numCom'];
        $this->adrElev      =   $elevInsReins['adrElev'];
        $this->numAnnee     =   $elevInsReins['numAnnee'];
        $this->numClasse    =   $elevInsReins['numClasse'];
        $this->numEleve     =   $elevInsReins['numEleve'];
        $this->typeIns      =   $elevInsReins['typeIns'];
        $this->dateIns      =   $elevInsReins['dateIns'];
        $this->fraisIns     =   $elevInsReins['fraisIns'];
        $this->nbPhoto      =   $elevInsReins['nbPhoto'];
        $this->cartePai     =   $elevInsReins['cartePai'];
        $this->badge        =   $elevInsReins['badge'];
        $this->bulletin     =   $elevInsReins['bulletin'];
    }
    /**
     * @ORM\Column(name="numAppre", type="integer")
     */
    protected   $numAppre;
    
    /**
     * @ORM\Column(name="numCom", type="integer")
     */
    protected   $numCom;
    
    /**
     * @ORM\Column(name="adrElev", type="text", length=1000)
     */
    protected   $adrElev;
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numAnnee", type="integer")
     */
    protected   $numAnnee;
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numClasse", type="integer")
     */
    protected   $numClasse;
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numEleve", type="integer")
     */
    protected   $numEleve;
    
    /**
     * @ORM\Column(name="typeIns", type="string", length=50)
     */
    protected   $typeIns;
    
    /**
     * @ORM\Column(name="dateIns", type="string")
     */
    protected   $dateIns;
    
    /**
     * @ORM\Column(name="fraisIns", type="float")
     */
    protected   $fraisIns;
    
    /**
     * @ORM\Column(name="nbPhoto", type="integer")
     */
    protected   $nbPhoto;
    
    /**
     * @ORM\Column(name="cartePai", type="float")
     */
    protected   $cartePai;
    
    /**
     * @ORM\Column(name="badge", type="float")
     */
    protected   $badge;
    
    /**
     * @ORM\Column(name="bulletin", type="float")
     */
    protected   $bulletin;
    

    /**
     * Set numAppre
     *
     * @param integer $numAppre
     * @return EleveInsReinsEntity
     */
    public function setNumAppre($numAppre)
    {
        $this->numAppre = $numAppre;

        return $this;
    }

    /**
     * Get numAppre
     *
     * @return integer 
     */
    public function getNumAppre()
    {
        return $this->numAppre;
    }

    /**
     * Set numCom
     *
     * @param integer $numCom
     * @return EleveInsReinsEntity
     */
    public function setNumCom($numCom)
    {
        $this->numCom = $numCom;

        return $this;
    }

    /**
     * Get numCom
     *
     * @return integer 
     */
    public function getNumCom()
    {
        return $this->numCom;
    }

    /**
     * Set adrElev
     *
     * @param string $adrElev
     * @return EleveInsReinsEntity
     */
    public function setAdrElev($adrElev)
    {
        $this->adrElev = $adrElev;

        return $this;
    }

    /**
     * Get adrElev
     *
     * @return string 
     */
    public function getAdrElev()
    {
        return $this->adrElev;
    }

    /**
     * Set numAnnee
     *
     * @param integer $numAnnee
     * @return EleveInsReinsEntity
     */
    public function setNumAnnee($numAnnee)
    {
        $this->numAnnee = $numAnnee;

        return $this;
    }

    /**
     * Get numAnnee
     *
     * @return integer 
     */
    public function getNumAnnee()
    {
        return $this->numAnnee;
    }

    /**
     * Set numClasse
     *
     * @param integer $numClasse
     * @return EleveInsReinsEntity
     */
    public function setNumClasse($numClasse)
    {
        $this->numClasse = $numClasse;

        return $this;
    }

    /**
     * Get numClasse
     *
     * @return integer 
     */
    public function getNumClasse()
    {
        return $this->numClasse;
    }

    /**
     * Set numEleve
     *
     * @param integer $numEleve
     * @return EleveInsReinsEntity
     */
    public function setNumEleve($numEleve)
    {
        $this->numEleve = $numEleve;

        return $this;
    }

    /**
     * Get numEleve
     *
     * @return integer 
     */
    public function getNumEleve()
    {
        return $this->numEleve;
    }

    /**
     * Set typeIns
     *
     * @param string $typeIns
     * @return EleveInsReinsEntity
     */
    public function setTypeIns($typeIns)
    {
        $this->typeIns = $typeIns;

        return $this;
    }

    /**
     * Get typeIns
     *
     * @return string 
     */
    public function getTypeIns()
    {
        return $this->typeIns;
    }

    /**
     * Set dateIns
     *
     * @param string $dateIns
     * @return EleveInsReinsEntity
     */
    public function setDateIns($dateIns)
    {
        $this->dateIns = $dateIns;

        return $this;
    }

    /**
     * Get dateIns
     *
     * @return string 
     */
    public function getDateIns()
    {
        return $this->dateIns;
    }

    /**
     * Set fraisIns
     *
     * @param float $fraisIns
     * @return EleveInsReinsEntity
     */
    public function setFraisIns($fraisIns)
    {
        $this->fraisIns = $fraisIns;

        return $this;
    }

    /**
     * Get fraisIns
     *
     * @return float 
     */
    public function getFraisIns()
    {
        return $this->fraisIns;
    }

    /**
     * Set nbPhoto
     *
     * @param integer $nbPhoto
     * @return EleveInsReinsEntity
     */
    public function setNbPhoto($nbPhoto)
    {
        $this->nbPhoto = $nbPhoto;

        return $this;
    }

    /**
     * Get nbPhoto
     *
     * @return integer 
     */
    public function getNbPhoto()
    {
        return $this->nbPhoto;
    }

    /**
     * Set cartePai
     *
     * @param float $cartePai
     * @return EleveInsReinsEntity
     */
    public function setCartePai($cartePai)
    {
        $this->cartePai = $cartePai;

        return $this;
    }

    /**
     * Get cartePai
     *
     * @return float 
     */
    public function getCartePai()
    {
        return $this->cartePai;
    }

    /**
     * Set badge
     *
     * @param float $badge
     * @return EleveInsReinsEntity
     */
    public function setBadge($badge)
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * Get badge
     *
     * @return float 
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * Set bulletin
     *
     * @param float $bulletin
     * @return EleveInsReinsEntity
     */
    public function setBulletin($bulletin)
    {
        $this->bulletin = $bulletin;

        return $this;
    }

    /**
     * Get bulletin
     *
     * @return float 
     */
    public function getBulletin()
    {
        return $this->bulletin;
    }
}
