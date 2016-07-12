<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of AppreciationEntity
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="Appreciation")
 */
class AppreciationEntity {
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numAppre", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numAppre;
    
    /**
     * @ORM\Column(name="nomAppre", type="string", length=100)
     */
    protected   $nomAppre;

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
     * Set nomAppre
     *
     * @param string $nomAppre
     * @return AppreciationEntity
     */
    public function setNomAppre($nomAppre)
    {
        $this->nomAppre = $nomAppre;

        return $this;
    }

    /**
     * Get nomAppre
     *
     * @return string 
     */
    public function getNomAppre()
    {
        return $this->nomAppre;
    }
}
