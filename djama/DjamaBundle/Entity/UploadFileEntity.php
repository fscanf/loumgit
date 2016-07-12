<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of UploadFileEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="UploadFile")
 */
class UploadFileEntity {
   
    /**
     * @ORM\Id
     * @ORM\Column(name="numFichier", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numFichier;
    
    /**
     * @ORM\Column(name="nomDeBase", type="string", length=100) 
     */
    protected   $nomDeBase;
    
    /**
     * @ORM\Column(name="nomDeSauvegarde", type="string", length=100) 
     */
    protected   $nomDeSauvegarde;
    
    /**
     * @ORM\Column(name="emplacementFichier", type="string", length=300) 
     */
    protected   $emplacementFichier;
    
    /**
     * @ORM\Column(name="tailleFichier", type="string", length=300) 
     */
    protected   $tailleFichier;
    
    /**
     * @ORM\Column(name="typeFichier", type="string", length=300) 
     */
    protected   $typeFichier;
    
    /**
     * @ORM\Column(name="typeChargement", type="string", length=500) 
     */
    protected   $typeChargement;
    
    /**
     * @ORM\Column(name="nomType", type="string", length=50) 
     */
    protected   $nomType;
    
    /**
     * @ORM\Column(name="dateUPload", type="string") 
     */
    protected   $dateUpload;
    
    

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
     * Set emplacementFichier
     *
     * @param string $emplacementFichier
     * @return UploadFileEntity
     */
    public function setEmplacementFichier($emplacementFichier)
    {
        $this->emplacementFichier = $emplacementFichier;

        return $this;
    }

    /**
     * Get emplacementFichier
     *
     * @return string 
     */
    public function getEmplacementFichier()
    {
        return $this->emplacementFichier;
    }

    /**
     * Set tailleFichier
     *
     * @param float $tailleFichier
     * @return UploadFileEntity
     */
    public function setTailleFichier($tailleFichier)
    {
        $this->tailleFichier = $tailleFichier;

        return $this;
    }

    /**
     * Get tailleFichier
     *
     * @return float 
     */
    public function getTailleFichier()
    {
        return $this->tailleFichier;
    }

    /**
     * Set typeFichier
     *
     * @param string $typeFichier
     * @return UploadFileEntity
     */
    public function setTypeFichier($typeFichier)
    {
        $this->typeFichier = $typeFichier;

        return $this;
    }

    /**
     * Get typeFichier
     *
     * @return string 
     */
    public function getTypeFichier()
    {
        return $this->typeFichier;
    }

    /**
     * Set typeChargement
     *
     * @param string $typeChargement
     * @return UploadFileEntity
     */
    public function setTypeChargement($typeChargement)
    {
        $this->typeChargement = $typeChargement;

        return $this;
    }

    /**
     * Get typeChargement
     *
     * @return string 
     */
    public function getTypeChargement()
    {
        return $this->typeChargement;
    }

    /**
     * Set nomType
     *
     * @param string $nomType
     * @return UploadFileEntity
     */
    public function setNomType($nomType)
    {
        $this->nomType = $nomType;

        return $this;
    }

    /**
     * Get nomType
     *
     * @return string 
     */
    public function getNomType()
    {
        return $this->nomType;
    }

    /**
     * Set dateUpload
     *
     * @param \DateTime $dateUpload
     * @return UploadFileEntity
     */
    public function setDateUpload($dateUpload)
    {
        $this->dateUpload = $dateUpload;

        return $this;
    }

    /**
     * Get dateUpload
     *
     * @return \DateTime 
     */
    public function getDateUpload()
    {
        return $this->dateUpload;
    }

    /**
     * Set nomDeBase
     *
     * @param string $nomDeBase
     * @return UploadFileEntity
     */
    public function setNomDeBase($nomDeBase)
    {
        $this->nomDeBase = $nomDeBase;

        return $this;
    }

    /**
     * Get nomDeBase
     *
     * @return string 
     */
    public function getNomDeBase()
    {
        return $this->nomDeBase;
    }

    /**
     * Set nomSauvegarde
     *
     * @param string $nomSauvegarde
     * @return UploadFileEntity
     */
    

    /**
     * Set nomDeSauvegarde
     *
     * @param string $nomDeSauvegarde
     * @return UploadFileEntity
     */
    public function setNomDeSauvegarde($nomDeSauvegarde)
    {
        $this->nomDeSauvegarde = $nomDeSauvegarde;

        return $this;
    }

    /**
     * Get nomDeSauvegarde
     *
     * @return string 
     */
    public function getNomDeSauvegarde()
    {
        return $this->nomDeSauvegarde;
    }
}
