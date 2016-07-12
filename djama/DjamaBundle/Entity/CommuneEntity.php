<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of CommuneEntity
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="Commune")
 */
class CommuneEntity {
    
    public function CommuneEntity($communeObject) {
     $this->numCom = $communeObject->numCom;   
     $this->nomCom =$communeObject->nomCom;
    }
    /**
     * @ORM\Id
     * @ORM\Column(name="numCom", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numCom;
    
    /**
     * @ORM\Column(name="nomCom", type="string", length=50)
     */
    protected   $nomCom;
    

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
     * Set nomCom
     *
     * @param string $nomCom
     * @return CommuneEntity
     */
    public function setNomCom($nomCom)
    {
        $this->nomCom = $nomCom;

        return $this;
    }

    /**
     * Get nomCom
     *
     * @return string 
     */
    public function getNomCom()
    {
        return $this->nomCom;
    }
}
