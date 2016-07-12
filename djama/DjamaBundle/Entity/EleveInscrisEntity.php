<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of EleveEntity
 *
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="EleveInscris")
 */
class EleveInscrisEntity {
    
    public function EleveInscrisEntity($eleve)
    {
        $this->numEleve     =   $eleve->numEleve;
        $this->sexe         =   $eleve->sexe;
        $this->nom          =   $eleve->nom;
        $this->prenom       =   $eleve->prenom;
        $this->dateN        =   $eleve->dateN;
        $this->numTel       =   $eleve->numTel;
        $this->dateEntree   =   $eleve->dateEntree;
        $this->dateSortie   =   $eleve->dateSortie;
        $this->pere         =   $eleve->pere;
        $this->pereProfession=  $eleve->pereProfession;
        $this->pereTel      =   $eleve->pereTel;
        $this->mere         =   $eleve->mere;
        $this->mereProfession=  $eleve->mereProfession;
        $this->mereTel      =   $eleve->mereTel;
        $this->extraitNai   =   $eleve->extraitNai;
        $this->livretSco    =   $eleve->livretSco;
        $this->attestationNiv=  $eleve->livretSco;
        $this->remarque     =   $eleve->remarque;
    }
    /**
     * @ORM\Id
     * @ORM\Column(name="numEleve", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numEleve;
    
    /**
     * @ORM\Column(name="sexe", type="string", length=2)
     */
    protected   $sexe;
    
    /**
     * @ORM\Column(name="nom", type="string", length=200)
     */
    protected   $nom;
    
    /**
     * @ORM\Column(name="prenom", type="string", length=500)
     */
    protected   $prenom;
    
    /**
     * @ORM\Column(name="dateN", type="string")
     */
    protected   $dateN;
    
    /**
     * @ORM\Column(name="numTel", type="string", length=50)
     */
    protected   $numTel;
    
    /**
     * @ORM\Column(name="dateEntree", type="string")
     */
    protected   $dateEntree;
    
    /**
     * @ORM\Column(name="dateSortie", type="string")
     */
    protected   $dateSortie;
    
    /**
     * @ORM\Column(name="pere", type="text", length=1000)
     */
    protected   $pere;
    
    /**
     * @ORM\Column(name="pereProfession", type="text", length=1000)
     */
    protected   $pereProfession;
    
    /**
     * @ORM\Column(name="pereTel", type="string", length=50)
     */
    protected   $pereTel;
    
    /**
     * @ORM\Column(name="mere", type="text", length=1000)
     */
    protected   $mere;
    
    /**
     * @ORM\Column(name="mereProfession", type="text", length=1000)
     */
    protected   $mereProfession;
    
    /**
     * @ORM\Column(name="mereTel", type="string", length=50)
     */
    protected   $mereTel;
    
    /**
     * @ORM\Column(name="extraitNai", type="string", length=10)
     */
    protected   $extraitNai;
    
    /**
     * @ORM\Column(name="livretSco", type="string", length=10)
     */
    protected   $livretSco;
    
    /**
     * @ORM\Column(name="attestationNiv", type="string", length=10)
     */
    protected   $attestationNiv;
    
    /**
     * @ORM\Column(name="remarque", type="text", length=2000)
     */
    protected   $remarque;
    
    public function setNumEleve($numEleve)
    {
        $this->numEleve = $numEleve;
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
     * Get sexe
     * 
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }
    /**
     * Set sexe
     *
     * @param string $sexe
     * @return EleveInscrisEntity
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

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
     * Set nom
     *
     * @param string $nom
     * @return EleveInscrisEntity
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
     * @return EleveInscrisEntity
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
     * @return EleveInscrisEntity
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
     * Set numTel
     *
     * @param string $numTel
     * @return EleveInscrisEntity
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;

        return $this;
    }

    /**
     * Get numTel
     *
     * @return string 
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * Set dateEntree
     *
     * @param string $dateEntree
     * @return EleveInscrisEntity
     */
    public function setDateEntree($dateEntree)
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    /**
     * Set dateSortie
     *
     * @param string $dateSortie
     * @return EleveInscrisEntity
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * Get dateSortie
     *
     * @return string 
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * Set pere
     *
     * @param string $pere
     * @return EleveInscrisEntity
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
     * Set pereProfession
     *
     * @param string $pereProfession
     * @return EleveInscrisEntity
     */
    public function setPereProfession($pereProfession)
    {
        $this->pereProfession = $pereProfession;

        return $this;
    }

    /**
     * Get pereProfession
     *
     * @return string 
     */
    public function getPereProfession()
    {
        return $this->pereProfession;
    }

    /**
     * Set pereTel
     *
     * @param string $pereTel
     * @return EleveInscrisEntity
     */
    public function setPereTel($pereTel)
    {
        $this->pereTel = $pereTel;

        return $this;
    }

    /**
     * Get pereTel
     *
     * @return string 
     */
    public function getPereTel()
    {
        return $this->pereTel;
    }

    /**
     * Set mere
     *
     * @param string $mere
     * @return EleveInscrisEntity
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
     * Set mereProfession
     *
     * @param string $mereProfession
     * @return EleveInscrisEntity
     */
    public function setMereProfession($mereProfession)
    {
        $this->mereProfession = $mereProfession;

        return $this;
    }

    /**
     * Get mereProfession
     *
     * @return string 
     */
    public function getMereProfession()
    {
        return $this->mereProfession;
    }

    /**
     * Set mereTel
     *
     * @param string $mereTel
     * @return EleveInscrisEntity
     */
    public function setMereTel($mereTel)
    {
        $this->mereTel = $mereTel;

        return $this;
    }

    /**
     * Get mereTel
     *
     * @return string 
     */
    public function getMereTel()
    {
        return $this->mereTel;
    }

    /**
     * Set extraitNai
     *
     * @param string $extraitNai
     * @return EleveInscrisEntity
     */
    public function setExtraitNai($extraitNai)
    {
        $this->extraitNai = $extraitNai;

        return $this;
    }

    /**
     * Get extraitNai
     *
     * @return string 
     */
    public function getExtraitNai()
    {
        return $this->extraitNai;
    }

    /**
     * Set livretSco
     *
     * @param string $livretSco
     * @return EleveInscrisEntity
     */
    public function setLivretSco($livretSco)
    {
        $this->livretSco = $livretSco;

        return $this;
    }

    /**
     * Get livretSco
     *
     * @return string 
     */
    public function getLivretSco()
    {
        return $this->livretSco;
    }

    /**
     * Set attestationNiv
     *
     * @param string $attestationNiv
     * @return EleveInscrisEntity
     */
    public function setAttestationNiv($attestationNiv)
    {
        $this->attestationNiv = $attestationNiv;

        return $this;
    }

    /**
     * Get attestationNiv
     *
     * @return string 
     */
    public function getAttestationNiv()
    {
        return $this->attestationNiv;
    }

    /**
     * Set remarque
     *
     * @param string $remarque
     * @return EleveInscrisEntity
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;

        return $this;
    }

    /**
     * Get remarque
     *
     * @return string 
     */
    public function getRemarque()
    {
        return $this->remarque;
    }
}
