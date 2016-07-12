<?php

namespace djama\DjamaBundle\Form\Photo;


class PhotoFormEntity {
    
    public $photo;
    
    public $path;

    public function getPhoto()
    {
        return $this->photo;
    }

    
    public function upload()
        {
        
        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité

        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        //var_dump($this->file);
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());

        // définit la propriété « path » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $this->path = $this->file->getClientOriginalName();
        var_dump($this->file->getClientSize());
       exit;
        // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
        $this->file = null;


        //reserve
        //$this->file->move($this->getUploadRootDir(), $this->path);

        //unset($this->file);
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
            return 'uploads/documents';
        }
         public function removeUpload()
        {
            if ($this->file == $this->getAbsolutePath()) {
                unlink($this->file);
            }
        }
}
