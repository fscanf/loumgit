<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of ClasseMatiereEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="ClasseMatiere")
 */
class ClasseMatiereEntity {
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numMat", type="integer")
     */
    protected   $numMat;
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numClasse", type="integer")
     */
    protected   $numClasse;
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numAnnee", type="integer")
     */
    protected   $numAnnee;

    /**
     * Set numMat
     *
     * @param integer $numMat
     * @return ClasseMatiereEntity
     */
    public function setNumMat($numMat)
    {
        $this->numMat = $numMat;

        return $this;
    }

    /**
     * Get numMat
     *
     * @return integer 
     */
    public function getNumMat()
    {
        return $this->numMat;
    }

    /**
     * Set numClasse
     *
     * @param integer $numClasse
     * @return ClasseMatiereEntity
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
     * Set numAnnee
     *
     * @param integer $numAnnee
     * @return ClasseMatiereEntity
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
}
