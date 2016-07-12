<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of ClasseEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="Classe")
 */
class ClasseEntity 
{
    /**
     * @ORM\Id
     * @ORM\Column(name="numClasse", type="integer") 
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numClasse;
    
    /**
     * @ORM\Column(name="codeClasse", type="string", length=100) 
     */
    protected   $codeClasse;
    
    /**
     *
     * @ORM\Column(name="nomClasse", type="string", length=200)
     */
    protected   $nomClasse;
    
    /**
     *
     * @ORM\Column(name="effectifs", type="integer")
     */
    protected   $effectifs;
    
    

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
     * Set codeClasse
     *
     * @param string $codeClasse
     * @return ClasseEntity
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
     * Set nomClasse
     *
     * @param string $nomClasse
     * @return ClasseEntity
     */
    public function setNomClasse($nomClasse)
    {
        $this->nomClasse = $nomClasse;

        return $this;
    }

    /**
     * Get nomClasse
     *
     * @return string 
     */
    public function getNomClasse()
    {
        return $this->nomClasse;
    }

    /**
     * Set effectifs
     *
     * @param integer $effectifs
     * @return ClasseEntity
     */
    public function setEffectifs($effectifs)
    {
        $this->effectifs = $effectifs;

        return $this;
    }

    /**
     * Get effectifs
     *
     * @return integer 
     */
    public function getEffectifs()
    {
        return $this->effectifs;
    }
   
}
