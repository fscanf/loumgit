<?php

namespace djama\DjamaBundle\Form\Eleve;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of EleveInscriptionForm
 *
 * @author Djama
 */
class EleveInscriptionEntity
{
    private $photo;
    public  $path;
    public  $sexe;
    public  $nom;
    public  $prenom;
    public  $dateN;
    public  $numTel;
    public  $adrElev;
    public  $numCom;
    public  $nomCom;
    public  $numClasse;
    public  $codeClasse;
    public  $dateEntree;
    public  $dateSortie;
    public  $pere;
    public  $pereProfession;
    public  $pereTel;
    public  $mere;
    public  $mereProfession;
    public  $mereTel;
    public  $typeIns;
    public  $dateIns;
    public  $fraisIns;
    public  $cartePai;
    public  $badge;
    public  $bulletin;
    public  $extraitNai;
    public  $livretSco;
    public  $attestationNiv;
    public  $nbPhoto;
    public  $octobre;
    public  $montantOct;
    public  $datePai1;  
    public  $mai;
    public  $montantMai;
    public  $datePai8;
    public  $juin;
    public  $montantJuin;
    public  $datePai9;
    public  $numAnnee;
    public  $nomAnnee;
    public  $numAppre;
    public  $nomAppre;
    public  $remarque;
   
    /**
     *getter    getPhoto
     * 
     *return    :   string
     */       
    public function setPhoto(UploadedFile $photo = null)
    {
        $this->photo = $photo;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
 
    public function preUpload($nom, $prenom, $sexe, $dateN, $codeClasse, $anneeSco)
    {
        if (null !== $this->getPhoto()) 
        {
            $extensionAndName = explode('.', $this->getPhoto()
                        ->getClientOriginalName());
            $this->path = $this->getUploadRootDir();
            $filename =
                    preg_replace('/\s/', '', $nom) . 
                    preg_replace('/\s/', '', $prenom) .
                    preg_replace('/\s/', '', $sexe) .
                    str_replace("\\", "", $dateN) .
                    preg_replace('/\s/', '', $codeClasse) .
                    preg_replace('/\s/', '', $anneeSco) .
                    '.' . $extensionAndName[1];
            
            return  $filename;
        }
        exit('PB : nom photo est null !');
    }

 

        public function getAbsolutePath()
        {
            return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
        }

        public function getWebPath()
        {
            return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
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
            return 'uploads/pictures/';
        }
         public function removeUpload()
        {
            if ($this->file == $this->getAbsolutePath()) {
                unlink($this->file);
            }
        }
}
