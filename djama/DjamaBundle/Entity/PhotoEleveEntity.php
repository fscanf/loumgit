<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of PhotoEleveEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="PhotoEleve")
 */
class PhotoEleveEntity 
{

    /**
     * @ORM\Id
     * @ORM\Column(name="numPhoto", type="integer")
     */
    protected   $numPhoto;
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numEleve", type="integer")
     */
    protected   $numEleve;

    /**
     * @ORM\Column(name="dateInsertion", type="string") 
     */
    protected $dateInsertion;
    
    /**
     * Set numPhoto
     *
     * @param integer $numPhoto
     * @return PhotoEleveEntity
     */
    public function setNumPhoto($numPhoto)
    {
        $this->numPhoto = $numPhoto;

        return $this;
    }

    /**
     * Get numPhoto
     *
     * @return integer 
     */
    public function getNumPhoto()
    {
        return $this->numPhoto;
    }

    /**
     * Set numEleve
     *
     * @param integer $numEleve
     * @return PhotoEleveEntity
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
     * Set dateInsertion
     *
     * @param string $dateInsertion
     * @return PhotoEleveEntity
     */
    public function setDateInsertion($dateInsertion)
    {
        $this->dateInsertion = $dateInsertion;

        return $this;
    }

    /**
     * Get dateInsertion
     *
     * @return string 
     */
    public function getDateInsertion()
    {
        return $this->dateInsertion;
    }
}
