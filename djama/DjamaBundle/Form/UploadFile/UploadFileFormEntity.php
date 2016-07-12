<?php

namespace djama\DjamaBundle\Form\UploadFile;

/**
 * Description of UploadFile
 *
 * @author Djama
 */
class UploadFileFormEntity 
{
    
    //N.B: Que seul la variable fichier peut être private avec symfony2
    private $fichier;
    public $num_classeur;
    public $tous_les_classeurs;
    public $maternelle_p;
    public $maternelle_m;
    public $maternelle_g;
    public $maternelle_pmg;
    public $premier_a;
    public $deuxieme_a;
    public $troisieme_a;
    public $quatrieme_a;
    public $cinquieme_a;
    public $sixieme_a;
    public $primaire;
    // PARTIE III COLLEGE
    public $septieme_a;
    public $huitieme_a;
    public $neufvieme_a;
    public $dixieme_a;
    public $college;
    // PARTIE IV LYCEE
    public $onsieme_a;
    public $dousieme_a;
    public $terminale_a;
    public $lycee;
    // PARTIE CALCUL DES NOTES
    public $notes;
    public $type_note;
    // PARTIE CHARGEMENT DE FICHIER DE BASE
    public $communes;
    public $classes;
    public $matieres;
    public $appreciation;
    public $direction;
    public $personnels;
    
    /**
	 * @return the $fichier
	 */
	public function getFichier() {
		return $this->fichier;
	}

	/**
	 * @return the $maternelle_p
	 */
	public function getMaternelle_p() {
		return $this->maternelle_p;
	}

	/**
	 * @return the $maternelle_m
	 */
	public function getMaternelle_m() {
		return $this->maternelle_m;
	}

	/**
	 * @return the $maternelle_g
	 */
	public function getMaternelle_g() {
		return $this->maternelle_g;
	}

	/**
	 * @return the $maternelle_pmg
	 */
	public function getMaternelle_pmg() {
		return $this->maternelle_pmg;
	}

	/**
	 * @return the $premier_a
	 */
	public function getPremier_a() {
		return $this->premier_a;
	}

	/**
	 * @return the $deuxieme_a
	 */
	public function getDeuxieme_a() {
		return $this->deuxieme_a;
	}

	/**
	 * @return the $troisieme_a
	 */
	public function getTroisieme_a() {
		return $this->troisieme_a;
	}

	/**
	 * @return the $quatrieme_a
	 */
	public function getQuatrieme_a() {
		return $this->quatrieme_a;
	}

	/**
	 * @return the $cinquieme_a
	 */
	public function getCinquieme_a() {
		return $this->cinquieme_a;
	}

	/**
	 * @return the $sixieme_a
	 */
	public function getSixieme_a() {
		return $this->sixieme_a;
	}

	/**
	 * @return the $primaire
	 */
	public function getPrimaire() {
		return $this->primaire;
	}

	/**
	 * @return the $septieme_a
	 */
	public function getSeptieme_a() {
		return $this->septieme_a;
	}

	/**
	 * @return the $huitieme_a
	 */
	public function getHuitieme_a() {
		return $this->huitieme_a;
	}

	/**
	 * @return the $neufvieme_a
	 */
	public function getNeufvieme_a() {
		return $this->neufvieme_a;
	}

	/**
	 * @return the $dixieme_a
	 */
	public function getDixieme_a() {
		return $this->dixieme_a;
	}

	/**
	 * @return the $college
	 */
	public function getCollege() {
		return $this->college;
	}

	/**
	 * @return the $onsieme_a
	 */
	public function getOnsieme_a() {
		return $this->onsieme_a;
	}

	/**
	 * @return the $dousieme_a
	 */
	public function getDousieme_a() {
		return $this->dousieme_a;
	}

	/**
	 * @return the $terminale_a
	 */
	public function getTerminale_a() {
		return $this->terminale_a;
	}

	/**
	 * @return the $lycee
	 */
	public function getLycee() {
		return $this->lycee;
	}

	/**
	 * @return the $notes
	 */
	public function getNotes() {
		return $this->notes;
	}

	/**
	 * @return the $type_notes
	 */
	public function getType_notes() {
		return $this->type_notes;
	}

	/**
	 * @return the $communes
	 */
	public function getCommunes() {
		return $this->communes;
	}

	/**
	 * @return the $classes
	 */
	public function getClasses() {
		return $this->classes;
	}

	/**
	 * @return the $matieres
	 */
	public function getMatieres() {
		return $this->matieres;
	}

	/**
	 * @return the $appreciation
	 */
	public function getAppreciation() {
		return $this->appreciation;
	}

	/**
	 * @return the $direction
	 */
	public function getDirection() {
		return $this->direction;
	}

	/**
	 * @return the $personnels
	 */
	public function getPersonnels() {
		return $this->personnels;
	}

	/**
	 * @return the $eleves
	 */
	public function getEleves() {
		return $this->eleves;
	}

	/**
	 * @param field_type $fichier
	 */
	public function setFichier($fichier) {
		$this->fichier = $fichier;
	}

	/**
	 * @param field_type $maternelle_p
	 */
	public function setMaternelle_p($maternelle_p) {
		$this->maternelle_p = $maternelle_p;
	}

	/**
	 * @param field_type $maternelle_m
	 */
	public function setMaternelle_m($maternelle_m) {
		$this->maternelle_m = $maternelle_m;
	}

	/**
	 * @param field_type $maternelle_g
	 */
	public function setMaternelle_g($maternelle_g) {
		$this->maternelle_g = $maternelle_g;
	}

	/**
	 * @param field_type $maternelle_pmg
	 */
	public function setMaternelle_pmg($maternelle_pmg) {
		$this->maternelle_pmg = $maternelle_pmg;
	}

	/**
	 * @param field_type $permier_a
	 */
	public function setPermier_a($permier_a) {
		$this->permier_a = $permier_a;
	}

	/**
	 * @param field_type $deuxieme_a
	 */
	public function setDeuxieme_a($deuxieme_a) {
		$this->deuxieme_a = $deuxieme_a;
	}

	/**
	 * @param field_type $troisieme_a
	 */
	public function setTroisieme_a($troisieme_a) {
		$this->troisieme_a = $troisieme_a;
	}

	/**
	 * @param field_type $quatrieme_a
	 */
	public function setQuatrieme_a($quatrieme_a) {
		$this->quatrieme_a = $quatrieme_a;
	}

	/**
	 * @param field_type $cinquieme_a
	 */
	public function setCinquieme_a($cinquieme_a) {
		$this->cinquieme_a = $cinquieme_a;
	}

	/**
	 * @param field_type $sixieme_a
	 */
	public function setSixieme_a($sixieme_a) {
		$this->sixieme_a = $sixieme_a;
	}

	/**
	 * @param field_type $primaire
	 */
	public function setPrimaire($primaire) {
		$this->primaire = $primaire;
	}

	/**
	 * @param field_type $septieme_a
	 */
	public function setSeptieme_a($septieme_a) {
		$this->septieme_a = $septieme_a;
	}

	/**
	 * @param field_type $huitieme_a
	 */
	public function setHuitieme_a($huitieme_a) {
		$this->huitieme_a = $huitieme_a;
	}

	/**
	 * @param field_type $neufvieme_a
	 */
	public function setNeufvieme_a($neufvieme_a) {
		$this->neufvieme_a = $neufvieme_a;
	}

	/**
	 * @param field_type $dixieme_a
	 */
	public function setDixieme_a($dixieme_a) {
		$this->dixieme_a = $dixieme_a;
	}

	/**
	 * @param field_type $college
	 */
	public function setCollege($college) {
		$this->college = $college;
	}

	/**
	 * @param field_type $onsieme_a
	 */
	public function setOnsieme_a($onsieme_a) {
		$this->onsieme_a = $onsieme_a;
	}

	/**
	 * @param field_type $dousieme_a
	 */
	public function setDousieme_a($dousieme_a) {
		$this->dousieme_a = $dousieme_a;
	}

	/**
	 * @param field_type $terminale_a
	 */
	public function setTerminale_a($terminale_a) {
		$this->terminale_a = $terminale_a;
	}

	/**
	 * @param field_type $lycee
	 */
	public function setLycee($lycee) {
		$this->lycee = $lycee;
	}

	/**
	 * @param field_type $notes
	 */
	public function setNotes($notes) {
		$this->notes = $notes;
	}

	/**
	 * @param field_type $type_notes
	 */
	public function setType_notes($type_notes) {
		$this->type_notes = $type_notes;
	}

	/**
	 * @param field_type $communes
	 */
	public function setCommunes($communes) {
		$this->communes = $communes;
	}

	/**
	 * @param field_type $classes
	 */
	public function setClasses($classes) {
		$this->classes = $classes;
	}

	/**
	 * @param field_type $matieres
	 */
	public function setMatieres($matieres) {
		$this->matieres = $matieres;
	}

	/**
	 * @param field_type $appreciation
	 */
	public function setAppreciation($appreciation) {
		$this->appreciation = $appreciation;
	}

	/**
	 * @param field_type $direction
	 */
	public function setDirection($direction) {
		$this->direction = $direction;
	}

	/**
	 * @param field_type $personnels
	 */
	public function setPersonnels($personnels) {
		$this->personnels = $personnels;
	}
        
        public function upload()
        {
        
        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité

        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());

        // définit la propriété « path » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $this->path = $this->file->getClientOriginalName();
        
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
