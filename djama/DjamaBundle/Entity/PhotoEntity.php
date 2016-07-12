<?php

namespace djama\DjamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of PhotoEntity
 * @author Djama
 * @ORM\Entity
 * @ORM\Table(name="Photo") 
 */
class PhotoEntity {
    
    /**
     * @ORM\Id
     * @ORM\Column(name="numPhoto", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected   $numPhoto;
    
    /**
     * @ORM\Column(name="nomPhoto", type="string", length=200)
     */
    protected   $nomPhoto;
    
    /**
     * @ORM\Column(name="placePhoto", type="string", length=300)
     */
    protected   $placePhoto;
    
    /**
     * @ORM\Column(name="taillePhoto", type="string", length=300)
     */
    protected   $taillePhoto;
    
    /**
     * @ORM\Column(name="datePhoto", type="string")
     */
    protected   $datePhoto;

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
     * Set nomPhoto
     *
     * @param string $nomPhoto
     * @return PhotoFormEntity
     */
    public function setNomPhoto($nomPhoto)
    {
        $this->nomPhoto = $nomPhoto;

        return $this;
    }

    /**
     * Get nomPhoto
     *
     * @return string 
     */
    public function getNomPhoto()
    {
        return $this->nomPhoto;
    }

    /**
     * Set placePhoto
     *
     * @param string $placePhoto
     * @return PhotoFormEntity
     */
    public function setPlacePhoto($placePhoto)
    {
        $this->placePhoto = $placePhoto;

        return $this;
    }

    /**
     * Get placePhoto
     *
     * @return string 
     */
    public function getPlacePhoto()
    {
        return $this->placePhoto;
    }

    /**
     * Set taillePhoto
     *
     * @param string $taillePhoto
     * @return PhotoFormEntity
     */
    public function setTaillePhoto($taillePhoto)
    {
        $this->taillePhoto = $taillePhoto;

        return $this;
    }

    /**
     * Get taillePhoto
     *
     * @return string 
     */
    public function getTaillePhoto()
    {
        return $this->taillePhoto;
    }

    /**
     * Set datePhoto
     *
     * @param \DateTime $datePhoto
     * @return PhotoFormEntity
     */
    public function setDatePhoto($datePhoto)
    {
        $this->datePhoto = $datePhoto;

        return $this;
    }

    /**
     * Get datePhoto
     *
     * @return \DateTime 
     */
    public function getDatePhoto()
    {
        return $this->datePhoto;
    }
    
    public function upload()
        {
        
        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité

        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        //var_dump($this->file);
        $this->nomPhoto->move($this->getUploadRootDir(), $this->nomPhoto->getClientOriginalName());

        // définit la propriété « path » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $this->placePhoto = $this->nomPhoto->getClientOriginalName();
       
        // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
        $this->nomPhoto = null;


        //reserve
        //$this->file->move($this->getUploadRootDir(), $this->path);

        //unset($this->file);
        }

        public function getAbsolutePath()
        {
            return null === $this->placePhoto ? null : $this->getUploadRootDir().'/'.$this->placePhoto;
        }

        public function getWebPath()
        {
            return null === $this->placePhoto ? null : $this->getUploadDir().'/'.$this->placePhoto;
        }

        protected function getUploadRootDir()
        {
            // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
            return __DIR__.'/../../../../web/'.$this->getUploadDir();
        }

        protected function getUploadDir()
        {
            // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
            // le document/image dans la vue.
            //mkdir($path, 0777, true);
            //$path = 'WelcomeBundle';
            //mkdir($path, 0777, true);
            return 'bundles/djamadjama/images';
        }
         public function removeUpload()
        {
            if ($this->nomPhoto == $this->getAbsolutePath()) {
                unlink($this->nomPhoto);
            }
        }
}
