<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FieldsFileEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="FieldsFile")
 */
class FieldsFileEntity {
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numChamp", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numChamp;
    
    /**
     * @ORM\Column(name="numFichier", type="integer")
     */
    protected   $numFichier;
    
    /**
     * @ORM\Column(name="nomChamp", type="text")
     */
    protected   $nomChamp;
    
    

    /**
     * Get numChamp
     *
     * @return integer 
     */
    public function getNumChamp()
    {
        return $this->numChamp;
    }

    /**
     * Set numFichier
     *
     * @param integer $numFichier
     * @return FieldsFileEntity
     */
    public function setNumFichier($numFichier)
    {
        $this->numFichier = $numFichier;

        return $this;
    }

    /**
     * Get numFichier
     *
     * @return integer 
     */
    public function getNumFichier()
    {
        return $this->numFichier;
    }

    /**
     * Set nomChamp
     *
     * @param string $nomChamp
     * @return FieldsFileEntity
     */
    public function setNomChamp($nomChamp)
    {
        $this->nomChamp = $nomChamp;

        return $this;
    }

    /**
     * Get nomChamp
     *
     * @return string 
     */
    public function getNomChamp()
    {
        return $this->nomChamp;
    }
}
