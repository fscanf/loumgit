<?php

namespace djama\DjamaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use djama\DjamaBundle\Entity\PhotoEntity;
use djama\DjamaBundle\Entity\PhotoEleveEntity;
use djama\DjamaBundle\Entity\PhotoPersonnelEntity;


use PHPExcel_IOFactory;


define('MIN', 1);
define('MAX', 10000000);
?>
<script>
function myFunction() {
  //document.getElementById("demo").innerHTML = "on djarama";
  //alert("ss");
    //$("#demo").load("demo.php");
    <?php echo 'bien'; ?>
}
/*$(function(){
    $("button").click(function(){
        $("#okay").slideDown("slow");
    });
});*/
   
</script>

<?php

class UploadFileController extends Controller
{
    public $dataFrom    = null;
    
    public function chargerFichierAction(Request $request)
    {
        $uploadFile = new \djama\DjamaBundle\Form\UploadFile\UploadFileFormEntity();
        $form = $this->createForm(new \djama\DjamaBundle\Form\UploadFile\UploadFileForm(), $uploadFile);
        $form->handleRequest($request);
     
        $dateDuJour = $this->dateDuJour();
        
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        
        $anneeScolaire     = $objetAnneeScolaire->getNomAnnee();
        $numAnneScolaire= $objetAnneeScolaire->getNumAnnee();
        
        if ($form->isValid())
        {
            $fileName   = $uploadFile->getFichier()->getClientOriginalName();
            $fileSize   = $uploadFile->getFichier()->getClientSize(); 
            $filePath   = $this->get('kernel')->getRootDir() . "/../web/uploads/files/"; 
            $date       = date("d-m-Y");    
 
            /**
            *Vérification de l'extension du fichier charger
            **/
            //****************************************************à revoir l'extension 
           /* $baseExtensionFile = 'xlsx';
            $extensionFileUpload = substr($fileName, -4, 4);
            if($extensionFileUpload != $baseExtensionFile )
            {
                    echo '<h3>Ce fichier : <em style="color:red;font-style:normal">' . $fileName . '</em> n\'a pas la bonne extension d\'excel </h3>'; 
                    echo '<h3>Veuillez choisir un fichier dont l\'extension est de type : <em style="color:red;font-style:normal">xlsx</em></h3>';
                    echo 'MERCI :)<br/><br/>';
                    exit('FAITE PRECEDENT ET REACTUALISE LA PAGE');
            }*/
            if ($fileSize < 1200) { //fichier vide
                    echo('<br/>LE FICHIER EST VIDE HAHA :P<br/><br/>');
                    exit('FAITE PRECEDENT ET REACTUALISE LA PAGE :)');
            }
            /**
            * Ajout d'une valeur aléatoire sur le nom du fichier upload et le sauvegarder
            **/
            $arrayExtentionNameFile = explode('.', $fileName);
            $aletoireValue          = rand(MIN, MAX);
            $simpleFileName         = $arrayExtentionNameFile[0].$aletoireValue . '-' . $date;
            $simpleFileExtension    = $arrayExtentionNameFile[1];
            $newFileUploadName      =  $simpleFileName . '.' . $simpleFileExtension;
            
            /* a revoir 
             * if (is_dir($filePath))
            {
                    mkdir($filePath, 0777, true);
            }*/
            //place le fichier téléchargé dans le dossier file
            $uploadFile->getFichier()->move($filePath, $newFileUploadName);
            /**
            * Lecture du fichier Excel du type XLSX
            **/      
            $objReader = PHPExcel_IOFactory::createReaderForFile($filePath.$newFileUploadName);
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($filePath.$newFileUploadName);
            $nbFeuille = $objPHPExcel->getSheetCount();    
     
            if ($uploadFile->num_classeur > $nbFeuille)
            {
               echo 'Numéro du classe';
               var_dump($uploadFile->num_classeur);
               exit;
                //créer une view qui renvoie le message d'erreur contenant un lien si le user veux retanter
                return $this->render('djamaDjamaBundle:UploadFile:uploadfile.html.twig', array(
                    
                ));
            }
            if ($uploadFile->num_classeur != null) {
                $objPHPExcel = $objPHPExcel->setActiveSheetIndex($uploadFile->num_classeur-1);
            }
            $arrayClasseurTitre     =   array();
            $arrayChamps            =   array();
            $arrayChampsIndice      =   array();
            $arrayData              =   array();
            $ligne = 0;
            if ($uploadFile->tous_les_classeurs == true && $uploadFile->num_classeur == null)
            {
                foreach ($objPHPExcel->getWorksheetIterator() as $indiceTitle=>$worksheet) 
                {
                    $arrayClasseurTitre[$indiceTitle] = iconv("UTF-8//TRANSLIT", "ISO-8859-16//TRANSLIT", $worksheet->getTitle());
                    foreach ($worksheet->getRowIterator() as $row) 
                    {
                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
                        foreach ($cellIterator as $indiceCell=>$cell) 
                        {
                            //$values = iconv("UTF-8//TRANSLIT", "ISO-8859-16//TRANSLIT", $cell->getCalculatedValue());
                            $values = $cell->getCalculatedValue();
                            if ($row->getRowIndex() == 1 && !empty ($values))
                            {   // Suppression d'espacement entre les mots
                                $arrayChamps[$arrayClasseurTitre[$indiceTitle]][$indiceCell]    =   $values;
                                $arrayChampsIndice[$arrayClasseurTitre[$indiceTitle]][]         =   preg_replace('/\s/', '', $values);
                            }
                            elseif ($row->getRowIndex() != 1) 
                            {
                                $title = $arrayClasseurTitre[$indiceTitle];
                                $arrayData[$title][$row->getRowIndex()][$arrayChampsIndice[$title][$indiceCell]]    =   $values;   
                            }
                        }
                    }
                }
            }
            else
            {
                $arrayClasseurTitre[] = iconv("UTF-8//TRANSLIT", "ISO-8859-16//TRANSLIT", $objPHPExcel->getTitle());
                foreach ($objPHPExcel->getRowIterator() as $row) 
                {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
                    foreach ($cellIterator as $indiceCell=>$cell) 
                    {
                        //$values = iconv("UTF-8//TRANSLIT", "ISO-8859-16//TRANSLIT", $cell->getCalculatedValue());
                         $values = $cell->getCalculatedValue();
                        if ($row->getRowIndex() == 1 && !empty ($values))
                        {   // Suppression d'espacement entre les mots
                            $arrayChamps[$arrayClasseurTitre[0]][$indiceCell]    =   $values;
                            $arrayChampsIndice[$arrayClasseurTitre[0]][]         =   preg_replace('/\s/', '', $values);
                        }
                        else 
                        {
                            $tile = $arrayClasseurTitre[0];
                            $arrayData[$tile][$row->getRowIndex()][$arrayChampsIndice[$tile][$indiceCell]]    =   $values;   
                        }
                    }
                }
            }
            /**
             * Insertion des informations du fichier téléchargé
             */
            $uploadfileentity = new \djama\DjamaBundle\Entity\UploadFileEntity();
            $uploadfileentity->setNomDeBase($fileName);
            $uploadfileentity->setNomDeSauvegarde( $newFileUploadName);
            $uploadfileentity->setEmplacementFichier($filePath.$newFileUploadName);
            $formatageFloat = number_format($fileSize/1024, 2, ',', ' '); 
            $uploadfileentity->setTailleFichier($formatageFloat. ' Ko');
            $uploadfileentity->setTypeFichier($simpleFileExtension); 
            $uploadfileentity->setTypeChargement($this->caseCocherForm($uploadFile, $arrayClasseurTitre, $arrayChampsIndice, $arrayData, $numAnneScolaire, 1)); 
            $uploadfileentity->setNomType($uploadFile->type_note);
            $uploadfileentity->setDateUpload(date("Y-m-d H:i:s"));
            
            $em =   $this->getDoctrine()->getManager(); 
            $em->persist($uploadfileentity);
            $em->flush();
            
            /**
            *
            */
            foreach ($arrayClasseurTitre as $title)
            {
                foreach ($arrayChamps[$title] as $champ)
                {
                    $fieldsFile = new \djama\DjamaBundle\Entity\FieldsFileEntity();
                    $fieldsFile->setNumFichier($uploadfileentity->getNumFichier());
                    $fieldsFile->setNomChamp($champ);
                    
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($fieldsFile);
                    $em->flush();
                }
            }
           
            $this->caseCocherForm($uploadFile, $arrayClasseurTitre, $arrayChampsIndice, $arrayData, $numAnneScolaire, 0);
            return $this->render('djamaDjamaBundle:UploadFile:uploadfile.html.twig',  
            array(
                   'title'               =>  'fichier',
                   'dateDuJour'          =>  $dateDuJour,  
                   'anneeScolaire'       =>  $anneeScolaire,
                   'partie'              =>  2,
                   'arrayClasseurTitre'  =>  $arrayClasseurTitre,
                   'arrayChamps'         =>  $arrayChamps,
                   'arrayData'           =>  $arrayData,
                   'form'                =>  $form->createView(), 
                ));  
        }
        return $this->render('djamaDjamaBundle:UploadFile:uploadfile.html.twig',
        array(
            'title'             =>  'fichier',
            'dateDuJour'        =>  $dateDuJour,
            'anneeScolaire'     =>  $anneeScolaire,
            'partie'            =>  1,
            'form'              =>  $form->createView()
        ));
        
    }
    public function caseCocherForm($uploadFile, $arrayClasseurTitre, $arrayChamps, $arrayData, $numAnneScolaire, $typeAppel)
    {
        
        if ($uploadFile->tous_les_classeurs) //PARTIE CLASSEUR EXCEL
        {
            if ($typeAppel)
                return 'tous_les_classeurs';
            else 
            {
                
            }
        }
        elseif ($uploadFile->maternelle_p || 
                ($uploadFile->maternelle_p && $uploadFile->matieres))  //PARTIE MATERNELLE
        {
            if ($typeAppel)
                return 'maternelle_p';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "Mat PS";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "Mat PS";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }     
        }
        elseif ($uploadFile->maternelle_m  
                || ($uploadFile->maternelle_m && $uploadFile->matieres)) 
        { 
            if ($typeAppel)
                return 'maternelle_m';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "Mat MS";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "Mat MS";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->maternelle_g 
                || ($uploadFile->maternelle_g && $uploadFile->matieres))
        {
            if ($typeAppel)
                return 'maternelle_g';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "Mat GS";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "Mat GS";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->maternelle_pmg 
                || ($uploadFile->maternelle_pmg && $uploadFile->matieres)) 
        { 
            if ($typeAppel)
                return 'maternelle_pmg';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "Mat PS";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
               $codeClasse2 = "Mat MS";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse2, $numAnneScolaire); 
               $codeClasse3 = "Mat GS";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse3, $numAnneScolaire); 
            }
        }
        elseif ($uploadFile->premier_a 
                || ($uploadFile->premier_a && $uploadFile->matieres))  //PARTIE PRIMAIRE
        {
            if ($typeAppel)
                return 'premier_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "1ère A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "1ère A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->deuxieme_a 
                || ($uploadFile->deuxieme_a && $uploadFile->matieres)) 
        { 
            if ($typeAppel)
                return 'deuxieme_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "2ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "2ème A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->troisieme_a 
                || ($uploadFile->troisieme_a && $uploadFile->matieres))
        {
            if ($typeAppel)
                return 'troisieme_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "3ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "3ème A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->quatrieme_a 
                || ($uploadFile->quatrieme_a && $uploadFile->matieres)) 
        { 
            if ($typeAppel)
                return 'quatrieme_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "4ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "4ème A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->cinquieme_a 
                || ($uploadFile->cinquieme_a && $uploadFile->matieres))
        {
            if ($typeAppel)
                return 'cinquieme_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "5ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "5ème A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->sixieme_a 
                || ($uploadFile->sixieme_a && $uploadFile->matieres)) 
        { 
            if ($typeAppel)
                return 'sixieme_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "6ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "6ème A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->primaire 
                || ($uploadFile->primaire && $uploadFile->matieres))
        {
            if ($typeAppel)
                return 'primaire';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "1ère A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
               $codeClasse2 = "2ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse2, $numAnneScolaire); 
               $codeClasse3 = "3ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse3, $numAnneScolaire); 
               $codeClasse4 = "4ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse4, $numAnneScolaire); 
               $codeClasse5 = "5ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse5, $numAnneScolaire); 
               $codeClasse6 = "6ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse6, $numAnneScolaire); 
            }
            else
            {
               exit('ERREUR SUR LE CHOIX ::Tous Primaire::');
            }
        }
        elseif ($uploadFile->septieme_a 
                || ($uploadFile->septieme_a && $uploadFile->matieres)) //PARTIE COLLEGE
        { 
            if ($typeAppel)
                return 'septieme_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "7ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "7ème A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->huitieme_a 
                || ($uploadFile->huitieme_a && $uploadFile->matieres))
        {
            if ($typeAppel)
                return 'huitieme_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "8ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "8ème A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->neufvieme_a 
                || ($uploadFile->neufvieme_a && $uploadFile->matieres)) 
        { 
            if ($typeAppel)
                return 'neufvieme_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "9ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "9ème A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->dixieme_a 
                || ($uploadFile->dixieme_a && $uploadFile->matieres))
        {
            if ($typeAppel)
                return 'dixieme_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "10ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "10ème A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->college 
                || ($uploadFile->college && $uploadFile->matieres)) 
        { 
            if ($typeAppel)
                return 'college';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "7ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire);
               $codeClasse2 = "8ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse2, $numAnneScolaire);
               $codeClasse3 = "9ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse3, $numAnneScolaire);
               $codeClasse4 = "10ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse4, $numAnneScolaire);
            }
            else
            {
               exit('ERREUR SUR LE CHOIX ::Tous Collège::');
            }
        }
        elseif ($uploadFile->onsieme_a 
                || ($uploadFile->onsieme_a && $uploadFile->matieres)) //PARTIE LYCEE
        { 
            if ($typeAppel)
                return 'onsieme_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "11ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "11ème A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->dousieme_a 
                || ($uploadFile->dousieme_a && $uploadFile->matieres))
        {
            if ($typeAppel)
                return 'dousieme_a'; 
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "12ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "12ème A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->terminale_a 
                || ($uploadFile->terminale_a && $uploadFile->matieres)) 
        { 
            if ($typeAppel)
                return 'terminale_a';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "T A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
            }
            else
            {
                $codeClasse = "T A";
                $nomCommune = "R.A.S";
                $nomApp     = "R.A.S";
                $this->insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp);
            }
        }
        elseif ($uploadFile->lycee 
                || ($uploadFile->lycee && $uploadFile->matieres))
        {
            if ($typeAppel)
                return 'lycee';
            elseif ($uploadFile->matieres)
            {
               $codeClasse = "11ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire); 
               $codeClasse2 = "12ème A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse2, $numAnneScolaire); 
               $codeClasse3 = "T A";
               $this->insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse3, $numAnneScolaire); 
            }
            else
            {
                exit('ERREUR SUR LE CHOIX ::Tous Lycée::');
            }
        }
        elseif ($uploadFile->notes && !empty($uploadFile->type_note))  //PARTIE CALCUL DES NOTES
        { 
            if ($typeAppel)
                return 'notes';
            else
            {
                
            }
        }      
        elseif ($uploadFile->communes) //PARTIE CHARGEMENT DES FICHIERS DE BASE
        { 
            if ($typeAppel)
                return 'commune';
            foreach ($arrayClasseurTitre as $title)
            {
                foreach ($arrayData[$title] as $data)
                {  
                    $indice = $arrayChamps[$title];

                    $commune = new \djama\DjamaBundle\Entity\CommuneEntity();
                    $commune->setNomCom($data[$indice[0]]);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($commune);
                    $em->flush();
                }
            }
        }
        elseif ($uploadFile->classes)
        {       
            if ($typeAppel)
                return 'classes';
            else
            {
                foreach ($arrayClasseurTitre as $title)
                {
                    foreach ($arrayData[$title] as $data)
                    {  
                        $indice = $arrayChamps[$title];
                       
                        $classe = new \djama\DjamaBundle\Entity\ClasseEntity();
                        $classe->setCodeClasse($data[$indice[0]]);
                        $classe->setNomClasse($data[$indice[1]]);
                        $classe->setEffectifs($data[$indice[2]]);
                        
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($classe);
                        $em->flush();
                    }
                }
            }
        }
        elseif ($uploadFile->matieres) 
        { 
            if ($typeAppel)
                return 'matieres';
            foreach ($arrayClasseurTitre as $title)
            {
                foreach ($arrayData[$title] as $data)
                {  
                    $indice = $arrayChamps[$title];

                    $matiere = new \djama\DjamaBundle\Entity\MatiereEntity();
                    $matiere->setCodeMat($data[$indice[0]]);
                    $matiere->setNomMat($data[$indice[1]]);
                    $matiere->setCoeffMat($data[$indice[2]]);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($matiere);
                    $em->flush();
                }
            }
        }
        elseif ($uploadFile->appreciation)
        {
            if ($typeAppel)
                return 'appreiation';
            foreach ($arrayClasseurTitre as $title)
            {
                foreach ($arrayData[$title] as $data)
                {  
                    $indice = $arrayChamps[$title];

                    $appreciation = new \djama\DjamaBundle\Entity\AppreciationEntity();
                    $appreciation->setNomAppre($data[$indice[0]]);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($appreciation);
                    $em->flush();
                }
            }            
        }
        elseif ($uploadFile->direction) 
        { 
            if ($typeAppel)
                return 'direction';
            foreach ($arrayClasseurTitre as $title)
            {
                foreach ($arrayData[$title] as $data)
                {  
                    $indice = $arrayChamps[$title];

                    $direction = new \djama\DjamaBundle\Entity\DirectionEntity();
                    $direction->setNomDir($data[$indice[0]]);
                    $direction->setTypePoste($data[$indice[1]]);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($direction);
                    $em->flush();
                }
            }
        }
        elseif ($uploadFile->personnels)
        { 
            if ($typeAppel)
                return 'personnels';
            else
            {
                foreach ($arrayClasseurTitre as $title)
                {
                    foreach ($arrayData[$title] as $data)
                    {  
                        $indice = $arrayChamps[$title];

                        $personnel = new \djama\DjamaBundle\Entity\PersonnelInsEntity();
                        $personnel->setSexe($data[$indice[0]]);
                        $personnel->setNom($data[$indice[1]]);
                        $personnel->setPrenom($data[$indice[2]]);
                        $personnel->setDateN(date('Y-m-d', ($data[$indice[3]] - 25569)*24*60*60 )); //Conversion date excel                      
                        $personnel->setLieuN($data[$indice[4]]);
                        $personnel->setPere($data[$indice[5]]);
                        $personnel->setMere($data[$indice[6]]);
                        $personnel->setProfessParent($data[$indice[7]]);
                        $personnel->setTelParent($data[$indice[8]]);
                        $personnel->setDateEntree(date('Y-m-d', ($data[$indice[9]] - 25569)*24*60*60 ));
                        
                        $personnel->setAnneeExperience($data[$indice[10]]);
                        $personnel->setDernierDiplome($data[$indice[11]]);
                        $personnel->setNotes($data[$indice[12]]);
                        
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($personnel);
                        $em->flush();
                        
                        //Création de la table photo
                        $photo = new PhotoEntity();
                        
                        $em2 = $this->getDoctrine()->getManager();
                        $em2->persist($photo);
                        $em2->flush();
                        
                        
                        //Création d'une relation entre la table photo et la table personnel
                        $personnelPhoto = new PhotoPersonnelEntity();
                        $personnelPhoto->setNumPhoto($photo->getNumPhoto());
                        $personnelPhoto->setNumPer($personnel->getNumPer);
                        $personnelPhoto->setDateInsertion(date("Y-m-d H:i:s"));
                        
                        $em3 = $this->getDoctrine()->getManager();
                        $em3->persist($personnelPhoto);
                        $em->flush();
                    }
                }
            }
        }
        else
        {
            exit ('ERREUR SUR LE CHOIX !');
        }
    }
    /**
     * @param type $arrayClasseurTitre
     * @param type $arrayData
     * @param type $arrayChamps
     * @param type $codeClasse
     * @param type $numAnneScolaire
     * @return void
     */
    public function insertMatieres($arrayClasseurTitre, $arrayData, $arrayChamps, $codeClasse, $numAnneScolaire)
    {
        $em = $this->getDoctrine()->getRepository('ClasseEntity');
        $queryObject = $em->findOneBy(array('codeClasse' => $codeClasse));
       
        foreach ($arrayClasseurTitre as $title)
        {
            foreach ($arrayData[$title] as $data)
            {  
                $indice = $arrayChamps[$title];
                $matiere = new \djama\DjamaBundle\Entity\MatiereEntity();
                $matiere->setCodeMat($data[$indice[0]]);
                $matiere->setNomMat($data[$indice[1]]);
                $matiere->setCoeffMat($data[$indice[2]]);

                $em = $this->getDoctrine()->getManager();
                $em->persist($matiere);
                $em->flush();

                //Création de relation entre les entites classe et matière
                $classeMatiere = new \djama\DjamaBundle\Entity\ClasseMatiereEntity();
                $classeMatiere->setNumMat($matiere->getNumMat());
                $classeMatiere->setNumClasse($queryObject->getNumClasse());
                $classeMatiere->setNumAnnee($numAnneScolaire); 

                $em->persist($classeMatiere);
                $em->flush();
            }
        }
    }
    /**
    * Création des objets éléves et mise en relation avec les tables concernées
    */
    public function insertEleves($arrayClasseurTitre, $arrayData, $arrayChamps, $numAnneScolaire, $codeClasse, $nomCommune, $nomApp)
    {
        $em = $this->getDoctrine()->getRepository('ClasseEntity');
        $queryNumClasse = $em->findOneBy(array('codeClasse' => $codeClasse))->getNumClasse();
        
        $em2 = $this->getDoctrine()->getRepository('CommuneEntity');
        $queryNumCommune = $em2->findOneBy(array('nomCom' => $nomCommune))->getNumCom();
        
        $em3 = $this->getDoctrine()->getRepository('AppreciationEntity');
        $queryNumApp = $em3->findOneBy(array('nomAppre' => $nomApp))->getNumAppre();
        
        foreach ($arrayClasseurTitre as $title)
        {
            foreach ($arrayData[$title] as $data)
            {  
                $indice = $arrayChamps[$title];

                $eleve = new \djama\DjamaBundle\Entity\EleveInscrisEntity();
                $eleve->setSexe($data[$indice[0]]);
                $eleve->setNom($data[$indice[1]]);
                $eleve->setPrenom($data[$indice[2]]);
                $eleve->setDateN(date('Y-m-d', ($data[$indice[3]] - 25569)*24*60*60 ));
                $eleve->setNumTel($data[$indice[4]]);
                $eleve->setDateEntree(date('Y-m-d', ($data[$indice[5]] - 25569)*24*60*60 ));
                $eleve->setDateSortie(date('Y-m-d', ($data[$indice[6]] - 25569)*24*60*60 ));
                $eleve->setPere($data[$indice[7]]);
                $eleve->setPereProfession($data[$indice[8]]);
                $eleve->setPereTel($data[$indice[9]]);
                $eleve->setMere($data[$indice[10]]);
                $eleve->setMereProfession($data[$indice[11]]);
                $eleve->setMereTel($data[$indice[12]]);
                $eleve->setExtraitNai($data[$indice[13]]);
                $eleve->setLivretSco($data[$indice[14]]);
                $eleve->setAttestationNiv($data[$indice[15]]);
                $eleve->setRemarque($data[$indice[16]]);
                

                $em = $this->getDoctrine()->getManager();
                $em->persist($eleve);
                $em->flush();
                
                //Création d'association entre les tables : éleve, classe, annéeScolaire, eleveInsReins, ...
                $eleveInsReins = new \djama\DjamaBundle\Entity\EleveInsReinsEntity();
                $eleveInsReins->setNumAppre($queryNumApp);
                $eleveInsReins->setNumCom($queryNumCommune);
                $eleveInsReins->setAdrElev("vide");
                $eleveInsReins->setNumAnnee($numAnneScolaire);
                $eleveInsReins->setNumClasse($queryNumClasse);
                $eleveInsReins->setNumEleve($eleve->getNumEleve());
                $eleveInsReins->setTypeIns("Inscription");
                $eleveInsReins->setDateIns(date("Y-m-d H:i:s"));
                $eleveInsReins->setFraisIns(00.01);
                $eleveInsReins->setNbPhoto(00);
                $eleveInsReins->setCartePai(00.01);
                $eleveInsReins->setBadge(00.01);
                $eleveInsReins->setBulletin(00.01);
                
                $em->persist($eleveInsReins);
                $em->flush();
                
                //Création de la table paiement
                $paiement = new \djama\DjamaBundle\Entity\PaiementEntity();
                $paiement->setMontantMens(00.01);
                $paiement->setMontantAnn(00.01);
                
                $em2 = $this->getDoctrine()->getManager();
                $em2->persist($paiement);
                $em2->flush();
                
                //Création d'assoication entre les tables : paiement et éleve
                $eleveInscrisPaiement = new \djama\DjamaBundle\Entity\EleveInscrisPaiementEntity();
                $eleveInscrisPaiement->setNumEleve($eleve->getNumEleve());
                $eleveInscrisPaiement->setNumPai($paiement->getNumPai());
                $eleveInscrisPaiement->setNumAnnee($numAnneScolaire);
                
                $em3 = $this->getDoctrine()->getManager();
                $em3->persist($eleveInscrisPaiement);
                $em3->flush();
                
                //Création de la table photo
                $photo = new PhotoEntity();
                
                $em4 = $this->getDoctrine()->getManager();
                $em4->persist($photo);
                $em4->flush();
                
                //Création d'une relation entre la classe photo et la classe éleve
                $photoEleve = new PhotoEleveEntity();
                $photoEleve->setNumPhoto($photo->getNumPhoto());
                $photoEleve->setNumEleve($eleve->getNumEleve());
                $photoEleve->setDateInsertion(date("Y-m-d H:i:s"));
                
                $em5 = $this->getDoctrine()->getManager();
                $em5->persist($photoEleve);
                $em5->flush();
            }
        } 
    }
    
    
    
    
    public function photoAction(Request $request)
    {
        
        $photoEntity = new \djama\DjamaBundle\Form\Photo\PhotoFormEntity();
        $form = $this->createForm( new \djama\DjamaBundle\Form\Photo\PhotoFrom(),  $photoEntity);
        $form->handleRequest($request);       
        if ($form->isValid())
        {
           $fileName   = $photoEntity->getPhoto()->getClientOriginalName();
           $fileSize   = $photoEntity->getPhoto()->getClientSize(); 
           $filePath   = $this->get('kernel')->getRootDir() . "/../web/uploads/photos/"; 
            $date       = date("d-m-Y"); 
        
            $arrayExtentionNameFile = explode('.', $fileName);
         
            //$simpleFileName         = $arrayExtentionNameFile[0].$aletoireValue . '-' . $date;
            //$simpleFileExtension    = $arrayExtentionNameFile[1];
            //$newFileUploadName      =  $simpleFileName . '.' . $simpleFileExtension;
            
            
            $photoEntity->getPhoto()->move($filePath, $fileName);
            exit('c bien valide, je soirs');   
            
        }
        return $this->render('djamaDjamaBundle:UploadFile:photo.html.twig', array(
           'form'    =>  $form->createView(),
            'title'  =>  'testFormPhoto',
        ));
    }
    public function afficheDataAction()
    {
        exit('je suis afficheData');
        
    }
    public function donneesAction()
    {
        exit('je suis données');
    }
    public function indexAction()
    {
        $classeEntity   = new \djama\DjamaBundle\Entity\ClasseEntity();
        $classeEntity->setCodeClasse("1ère_A");
        $classeEntity->setNomClasse("1ère Annee");
        $classeEntity->setEffectifs(2);
       //var_dump($classeEntity); exit;
        $em =   $this->getDoctrine()->getManager();
        var_dump($em); exit;
        $em->persist($classeEntity);
        $em->flush();
        
        var_dump($classeEntity->getNumClasse());
     //var_dump('djama ahaha'); 
        return $this->render('djamaDjamaBundle:UploadFile:index.html.twig', array(
            
        ));
    }
    public function showAction(){
        $classeEntity = $this->getDoctrine()
        ->getRepository('ClasseEntity')
        ->find(3);

        if (!$classeEntity) {
            throw $this->createNotFoundException(
                'Aucun produit trouvé pour cet id : '.$id
            );
        }
        var_dump($classeEntity); 
        return $this->render('djamaDjamaBundle:UploadFile:index.html.twig');
    }
    /*
    // requête par clé primaire (souvent "id")
$product = $repository->find($id);

// Noms de méthodes dynamiques en se basant sur un nom de colonne
$product = $repository->findOneById($id);
$product = $repository->findOneByName('foo');

// trouver *tous* les produits
$products = $repository->findAll();

// trouver un groupe de produits en se basant sur une valeur de colonne
$products = $repository->findByPrice(19.99);
*/
  }
    

/* $response = new Response(); 
            // Create new PHPExcel object
       $objPHPExcel = new PHPExcel();

       // Set document properties
       $objPHPExcel->getProperties()->setCreator("Me")
                   ->setLastModifiedBy("Someone")
                   ->setTitle("My first demo")
                   ->setSubject("Demo Document");
       // Add some data
       $objPHPExcel->setActiveSheetIndex(0)
                   ->setCellValue('A1', 'Hello')
                   ->setCellValue('B2', 'world!')
                   ->setCellValue('C1', 'Hello')
                   ->setCellValue('D2', 'world!');
       // Set active sheet index to the first sheet
       $objPHPExcel->setActiveSheetIndex(0);

       // Redirect output to a client’s web browser (Excel5)
       $response->headers->set('Content-Type', 'application/vnd.ms-excel');
       $response->headers->set('Content-Disposition', 'attachment;filename="demo.xls"');
       $response->headers->set('Cache-Control', 'max-age=0');
       //$response->prepare();
       $response->sendHeaders();
       $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
       $objWriter->save('php://output');
       exit();*/
          