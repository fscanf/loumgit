<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of EleveInscrisPaiementEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="EleveInscrisPaiement")
 */
class EleveInscrisPaiementEntity {
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numEleve", type="integer")
     */
    protected   $numEleve;
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numPai", type="integer")
     */
    protected   $numPai;
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numAnnee", type="integer")
     */
    protected   $numAnnee;
    
    /**
     * @ORM\Column(name="numAppre", type="integer")
     */
    protected   $numAppre;
    
    /**
     * @ORM\Column(name="commentaire", type="text", length=1000)
     */
    protected   $commentaire;

    /**
     * Set numEleve
     *
     * @param integer $numEleve
     * @return EleveInscrisPaiementEntity
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
     * Set numPai
     *
     * @param integer $numPai
     * @return EleveInscrisPaiementEntity
     */
    public function setNumPai($numPai)
    {
        $this->numPai = $numPai;

        return $this;
    }

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
     * Set numAnnee
     *
     * @param integer $numAnnee
     * @return EleveInscrisPaiementEntity
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
     * Set numAppre
     *
     * @param integer $numAppre
     * @return EleveInscrisPaiementEntity
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
     * Set commentaire
     *
     * @param string $commentaire
     * @return EleveInscrisPaiementEntity
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
