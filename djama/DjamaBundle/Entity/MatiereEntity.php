<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of MatiereEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="Matiere")
 */
class MatiereEntity {
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numMat", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numMat;
    
    /**
     * @ORM\Column(name="codeMat", type="string", length=100)
     */
    protected   $codeMat;
    
    /**
     * @ORM\Column(name="nomMat", type="string", length=200)
     */
    protected   $nomMat;
    
    /**
     * @ORM\Column(name="coeffMat", type="integer")
     */
    protected   $coeffMat;	

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
     * Set codeMat
     *
     * @param string $codeMat
     * @return MatiereEntity
     */
    public function setCodeMat($codeMat)
    {
        $this->codeMat = $codeMat;

        return $this;
    }

    /**
     * Get codeMat
     *
     * @return string 
     */
    public function getCodeMat()
    {
        return $this->codeMat;
    }

    /**
     * Set nomMat
     *
     * @param string $nomMat
     * @return MatiereEntity
     */
    public function setNomMat($nomMat)
    {
        $this->nomMat = $nomMat;

        return $this;
    }

    /**
     * Get nomMat
     *
     * @return string 
     */
    public function getNomMat()
    {
        return $this->nomMat;
    }

    /**
     * Set coeffMat
     *
     * @param integer $coeffMat
     * @return MatiereEntity
     */
    public function setCoeffMat($coeffMat)
    {
        $this->coeffMat = $coeffMat;

        return $this;
    }

    /**
     * Get coeffMat
     *
     * @return integer 
     */
    public function getCoeffMat()
    {
        return $this->coeffMat;
    }
}
