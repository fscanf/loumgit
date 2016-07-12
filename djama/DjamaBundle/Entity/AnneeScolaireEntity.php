<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of AnneeScolaireEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="AnneeScolaire")
 */
class AnneeScolaireEntity
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numAnnee", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numAnnee;
    
    /**
     * @ORM\Column(name="nomAnnee", type="string", length=50)
     */
    protected   $nomAnnee;
   
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
     * Set nomAnnee
     *
     * @param string $nomAnnee
     * @return AnneeScolaireEntity
     */
    public function setNomAnnee($nomAnnee)
    {
        $this->nomAnnee = $nomAnnee;

        return $this;
    }

    /**
     * Get nomAnnee
     *
     * @return string 
     */
    public function getNomAnnee()
    {
        return $this->nomAnnee;
    }
}
