<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of DirectionEntity
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="Direction")
 */
class DirectionEntity {
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numDir", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numDir;
    
    /**
     * @ORM\Column(name="nomDir", type="string", length=200)
     */
    protected   $nomDir;
    
    /**
     * @ORM\Column(name="typePoste", type="string", length=200)
     */
    protected   $typePoste;

    /**
     * Get numDir
     *
     * @return integer 
     */
    public function getNumDir()
    {
        return $this->numDir;
    }
    
    /**
     * Set nomDir
     *
     * @param string $nomDir
     * @return DirectionEntity
     */
    public function setNomDir($nomDir)
    {
        $this->nomDir = $nomDir;

        return $this;
    }

    /**
     * Get nomDir
     *
     * @return string 
     */
    public function getNomDir()
    {
        return $this->nomDir;
    }

    /**
     * Set typePoste
     *
     * @param string $typePoste
     * @return DirectionEntity
     */
    public function setTypePoste($typePoste)
    {
        $this->typePoste = $typePoste;

        return $this;
    }

    /**
     * Get typePoste
     *
     * @return string 
     */
    public function getTypePoste()
    {
        return $this->typePoste;
    }
}
