<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of PhotoPersonnel
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="PhotoPersonnel")
 */
class PhotoPersonnelEntity {
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numPhoto", type="integer")
     */
    protected   $numPhoto;
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numPer", type="integer")
     */
    protected   $numPer;
    
    /**
     * @ORM\Column(name="dateInsertion", type="string") 
     */
    protected $dateInsertion;

    /**
     * Set numPhoto
     *
     * @param integer $numPhoto
     * @return PhotoPersonnelEntity
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
     * Set numPer
     *
     * @param integer $numPer
     * @return PhotoPersonnelEntity
     */
    public function setNumPer($numPer)
    {
        $this->numPer = $numPer;

        return $this;
    }

    /**
     * Get numPer
     *
     * @return integer 
     */
    public function getNumPer()
    {
        return $this->numPer;
    }

    /**
     * Set dateInsertion
     *
     * @param string $dateInsertion
     * @return PhotoPersonnelEntity
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
