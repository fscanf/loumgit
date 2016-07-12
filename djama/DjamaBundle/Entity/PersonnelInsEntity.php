<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of PersonnelInsEntity
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="PersonnelIns")
 */

class PersonnelInsEntity {
    
    /**
     *
     * @ORM\Id
     * @ORM\Column(name="numPer", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numPer;
    
    /**
     * @ORM\Column(name="sexe", type="string")
     */
    protected   $sexe;
    
    /**
     * @ORM\Column(name="nom", type="string", length=200)
     */
    protected   $nom;
    
    /**
     * @ORM\Column(name="prenom", type="string", length=1000)
     */
    protected   $prenom;
    
    /**
     * @ORM\Column(name="dateN", type="string")
     */
    protected   $dateN;
    
    /**
     * @ORM\Column(name="lieuN", type="text", length=2000)
     */
    protected   $lieuN;
    
    /**
     * @ORM\Column(name="pere", type="string", length=1000)
     */
    protected   $pere;
    
    /**
     * @ORM\Column(name="mere", type="string", length=1000)
     */
    protected   $mere;
    
    /**
     * @ORM\Column(name="professParent", type="string", length=1000)
     */
    protected   $professParent;
    
    /**
     * @ORM\Column(name="telParent", type="string", length=100)
     */
    protected   $telParent;
    
    /**
     * @ORM\Column(name="dateEntree", type="string")
     */
    protected   $dateEntree;
    
    /**
     * @ORM\Column(name="anneeExperience", type="string", length=1000)
     */
    protected   $anneeExperience;
    
    /**
     * @ORM\Column(name="dernierDiplome", type="string", length=1000)
     */
    protected   $dernierDiplome;
    
    /**
     * @ORM\Column(name="notes", type="text", length=2000)
     */
    protected   $notes;
    

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
     * Set sexe
     *
     * @param string $sexe
     * @return PersonnelInsEntity
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return PersonnelInsEntity
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return PersonnelInsEntity
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateN
     *
     * @param string $dateN
     * @return PersonnelInsEntity
     */
    public function setDateN($dateN)
    {
        $this->dateN = $dateN;

        return $this;
    }

    /**
     * Get dateN
     *
     * @return string 
     */
    public function getDateN()
    {
        return $this->dateN;
    }

    /**
     * Set lieuN
     *
     * @param string $lieuN
     * @return PersonnelInsEntity
     */
    public function setLieuN($lieuN)
    {
        $this->lieuN = $lieuN;

        return $this;
    }

    /**
     * Get lieuN
     *
     * @return string 
     */
    public function getLieuN()
    {
        return $this->lieuN;
    }

    /**
     * Set pere
     *
     * @param string $pere
     * @return PersonnelInsEntity
     */
    public function setPere($pere)
    {
        $this->pere = $pere;

        return $this;
    }

    /**
     * Get pere
     *
     * @return string 
     */
    public function getPere()
    {
        return $this->pere;
    }

    /**
     * Set mere
     *
     * @param string $mere
     * @return PersonnelInsEntity
     */
    public function setMere($mere)
    {
        $this->mere = $mere;

        return $this;
    }

    /**
     * Get mere
     *
     * @return string 
     */
    public function getMere()
    {
        return $this->mere;
    }

    /**
     * Set professParent
     *
     * @param string $professParent
     * @return PersonnelInsEntity
     */
    public function setProfessParent($professParent)
    {
        $this->professParent = $professParent;

        return $this;
    }

    /**
     * Get professParent
     *
     * @return string 
     */
    public function getProfessParent()
    {
        return $this->professParent;
    }

    /**
     * Set telParent
     *
     * @param string $telParent
     * @return PersonnelInsEntity
     */
    public function setTelParent($telParent)
    {
        $this->telParent = $telParent;

        return $this;
    }

    /**
     * Get telParent
     *
     * @return string 
     */
    public function getTelParent()
    {
        return $this->telParent;
    }

    /**
     * Set dateEntree
     *
     * @param string $dateEntree
     * @return PersonnelInsEntity
     */
    public function setDateEntree($dateEntree)
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    /**
     * Get dateEntree
     *
     * @return string 
     */
    public function getDateEntree()
    {
        return $this->dateEntree;
    }

    /**
     * Set anneeExperience
     *
     * @param string $anneeExperience
     * @return PersonnelInsEntity
     */
    public function setAnneeExperience($anneeExperience)
    {
        $this->anneeExperience = $anneeExperience;

        return $this;
    }

    /**
     * Get anneeExperience
     *
     * @return string 
     */
    public function getAnneeExperience()
    {
        return $this->anneeExperience;
    }

    /**
     * Set dernierDiplome
     *
     * @param string $dernierDiplome
     * @return PersonnelInsEntity
     */
    public function setDernierDiplome($dernierDiplome)
    {
        $this->dernierDiplome = $dernierDiplome;

        return $this;
    }

    /**
     * Get dernierDiplome
     *
     * @return string 
     */
    public function getDernierDiplome()
    {
        return $this->dernierDiplome;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return PersonnelInsEntity
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
