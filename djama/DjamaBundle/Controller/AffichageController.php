<?php

namespace djama\DjamaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use djama\DjamaBundle\Form\ModifData\MatiereUpdateForm;
use djama\DjamaBundle\Form\ModifData\DeleteMatiereForm;
use djama\DjamaBundle\Entity\CommuneEntity;
use djama\DjamaBundle\Form\Commune\CommuneForm;
use djama\DjamaBundle\Form\Classe\ClasseForm;
use djama\DjamaBundle\Form\ChoixMultiple\ChoixMultipleForm;
use djama\DjamaBundle\Form\Eleve\EleveUpdateForm;
use djama\DjamaBundle\Entity\EleveInscrisEntity;
use djama\DjamaBundle\Form\Eleve\EleveDeleteForm;
use djama\DjamaBundle\Form\Eleve\EleveInscriptionEntity;
use djama\DjamaBundle\Form\Eleve\EleveInscriptionForm;
use djama\DjamaBundle\Entity\EleveInsReinsEntity;
use djama\DjamaBundle\Entity\PhotoEntity;
use djama\DjamaBundle\Entity\PhotoEleveEntity;
use djama\DjamaBundle\Entity\PaiementEntity;
use djama\DjamaBundle\Entity\EleveInscrisPaiementEntity;
use djama\DjamaBundle\Entity\MatiereEntity;
use djama\DjamaBundle\Entity\AppreciationEntity;

/**
 * Description of AffichageController
 *
 * @author Djama
 */
class AffichageController extends Controller 
{
    
    public function matiereAction(Request $request)
    {
        $dateDuJour = $this->dateDuJour();
        
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire     = $objetAnneeScolaire->getNomAnnee();
        
        $em = $this->getDoctrine()->getManager();
        $queryMatiereParClasse = $em->createQuery(
                     'SELECT classe.nomClasse, matiere.numMat, matiere.codeMat, matiere.nomMat, matiere.coeffMat
                      FROM djamaDjamaBundle:MatiereEntity matiere,
                        djamaDjamaBundle:ClasseMatiereEntity matClas, 
                        djamaDjamaBundle:ClasseEntity classe
                      WHERE matiere.numMat = matClas.numMat
                        AND classe.numClasse = matClas.numClasse'
        )->getResult();

        $form = $this->createForm(new DeleteMatiereForm, $queryMatiereParClasse);
        $form->handleRequest($request);
        
        if ($form->isValid())
        {
            var_dump($form->getData());
            exit;
        }
        $queryMatParClas = array();
        $queryClasse     = array();
        
        foreach($queryMatiereParClasse as $requete)
        {
            $champs['numMat']   = $requete['numMat'];
            $champs['codeMat']  = $requete['codeMat'];
            $champs['nomMat']   = $requete['nomMat'];
            $champs['coeffMat'] = $requete['coeffMat']; 
            
            $queryMatParClas[$requete['nomClasse']][] = $champs;
            
            $queryClasse[$requete['nomClasse']]    =    $requete['nomClasse'];   
        }
        
        return $this->render('djamaDjamaBundle:Affichage:matiere.html.twig', array(
            'title'             =>  'Matière',
            'dateDuJour'        =>  $dateDuJour,
            'anneeScolaire'     =>  $anneeScolaire,
            'titre_table'       =>  'Liste des matières',
            'codeMat'           =>  'Code Matière',
            'nomMat'            =>  'Nom matière',
            'coeffMat'          =>  'Coefficient Matière',
            'lstClasse'         =>  $queryClasse,
            'matiereParClasse'  =>  $queryMatParClas,
            'form'              =>  $form->createView(),
        ));
    }
    public function matiereUpdateAction(Request $request, $val_id)
    {
        $em = $this->getDoctrine()->getRepository('MatiereEntity');
        $queryObjectMatiere = $em->find($val_id);
        
        $form = $this->createForm(new MatiereUpdateForm(), $queryObjectMatiere);
        $form->handleRequest($request);
         
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            
            return $this->redirect($this->generateUrl('djama_affichage_matiere'), 301);
        }
        
        return $this->render('djamaDjamaBundle:Affichage:matiereupdate.html.twig', array(
            'title' =>  'Modification Matière',
            'val_id'    =>  $val_id,
            'form'  =>  $form->createView(),
        ));
    }
    public function matiereDeleteAction(Request $request, $val_id)
    {
        $em = $this->getDoctrine()->getRepository('MatiereEntity');
        $queryObjectMatiere = $em->find($val_id);
        
        $form = $this->createForm(new MatiereUpdateForm(), $queryObjectMatiere);
        $form->handleRequest($request);
        
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($form->getData());
            $em->flush();
            
            return $this->redirect($this->generateUrl('djama_affichage_matiere'), 301);
        }
        
        return $this->render('djamaDjamaBundle:Affichage:matieredelete.html.twig', array(
            'title'     =>  'Suppression Matière',
            'val_id'    =>  $val_id,
            'form'      =>  $form->createView(),
        ));
    }
    public function communeAction()
    {
        $dateDuJour = $this->dateDuJour();
        
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire     = $objetAnneeScolaire->getNomAnnee();
        
        $em = $this->getDoctrine()->getManager();
        $queryCommune = $em->createQuery(
                     'SELECT com.numCom, com.nomCom
                      FROM djamaDjamaBundle:CommuneEntity com'
        )->getResult();
        
        return $this->render('djamaDjamaBundle:Affichage:commune.html.twig', array(
            'title'             =>  'Commune',
            'dateDuJour'        =>  $dateDuJour,
            'anneeScolaire'     =>  $anneeScolaire,
            'titre_table'       =>  'Liste des communes',
            'nomCom'            =>  'Nom',
            'lstCommune'        =>  $queryCommune,
        ));
    }
    public function communeUpdateAction(Request $request, $val_id)
    {
        $em = $this->getDoctrine()->getRepository('CommuneEntity');
        $queryObjectCommune = $em->find($val_id);
        $form = $this->createForm(new CommuneForm(), $queryObjectCommune);
        $form->handleRequest($request);
        
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            
            return $this->redirect($this->generateUrl('djama_affichage_commune'), 301);
        }
        
        return $this->render('djamaDjamaBundle:Affichage:communeupdate.html.twig', array(
            'title' =>  'Modification Commune',
            'val_id'    =>  $val_id,
            'form'  =>  $form->createView(),
        ));
    }
    public function communeDeleteAction(Request $request, $val_id) 
    {
        $em = $this->getDoctrine()->getRepository('CommuneEntity');
        $queryObjectCommune = $em->find($val_id);
        
        $form = $this->createForm(new CommuneForm(), $queryObjectCommune);
        $form->handleRequest($request);
        
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($form->getData());
            $em->flush();
            
            return $this->redirect($this->generateUrl('djama_affichage_commune'), 301);
        }
        
        return $this->render('djamaDjamaBundle:Affichage:communedelete.html.twig', array(
            'title'     =>  'Suppression Commune',
            'val_id'    =>  $val_id,
            'form'      =>  $form->createView(),
        ));
    }
    public function classeAction()
    {
        $dateDuJour = $this->dateDuJour();
        
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire     = $objetAnneeScolaire->getNomAnnee();
        
        $em = $this->getDoctrine()->getManager();
        $queryClasse = $em->createQuery(
                     'SELECT clas.numClasse, clas.codeClasse, clas.nomClasse, clas.effectifs
                      FROM djamaDjamaBundle:ClasseEntity clas'
        )->getResult();

        return $this->render('djamaDjamaBundle:Affichage:classe.html.twig', array(
            'title'             =>  'Classe',
            'dateDuJour'        =>  $dateDuJour,
            'anneeScolaire'     =>  $anneeScolaire,
            'titre_table'       =>  'Liste des Classes',
            'codeClasse'        =>  'Code Classe',
            'nomClasse'         =>  'Nom',
            'effectif'          =>  'Effectif',
            'lstClasse'         =>  $queryClasse,
        ));
    }
    public function classeUpdateAction(Request $request, $val_id)
    {
        $em = $this->getDoctrine()->getRepository('ClasseEntity');
        $queryObjectClasse = $em->find($val_id);
        
        $form = $this->createForm(new ClasseForm(), $queryObjectClasse);
        $form->handleRequest($request);
        
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            
            return $this->redirect($this->generateUrl('djama_affichage_classe'), 301);
        }
        
        return $this->render('djamaDjamaBundle:Affichage:classeupdate.html.twig', array(
            'title' =>  'Modification Classe',
            'val_id'    =>  $val_id,
            'form'  =>  $form->createView(),
        ));
    }
    public function classeDeleteAction(Request $request, $val_id) 
    {
        $em = $this->getDoctrine()->getRepository('ClasseEntity');
        $queryObjectClasse = $em->find($val_id);
        
        $form = $this->createForm(new ClasseForm(), $queryObjectClasse);
        $form->handleRequest($request);
        
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($form->getData());
            $em->flush();
            
            return $this->redirect($this->generateUrl('djama_affichage_classe'), 301);
        }
        
        return $this->render('djamaDjamaBundle:Affichage:classedelete.html.twig', array(
            'title'     =>  'Suppression Classe',
            'val_id'    =>  $val_id,
            'form'      =>  $form->createView(),
        ));
    }
    public function eleveInscriptionAction(Request $request)
    {
        $dateDuJour = $this->dateDuJour();
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire      = $objetAnneeScolaire->getNomAnnee(); 
        
        $eleveInscription   =  new EleveInscriptionEntity(); 
        $form = $this->createForm(new EleveInscriptionForm(), $eleveInscription);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $fileSize   = $eleveInscription->getPhoto()->getClientSize(); 
            $filePath   = $this->get('kernel')->getRootDir() . "/../web/bundles/djamadjama/images/";
            
            $formData   = $form->getData(); 
            
            $eleve  =   new EleveInscrisEntity();
            $eleve->setSexe($formData->sexe);
            $eleve->setNom($formData->nom);
            $eleve->setPrenom($formData->prenom);
            $eleve->setDateN($formData->dateN);
            $eleve->setNumTel($formData->numTel);
            $eleve->setDateEntree($formData->dateEntree);
            $eleve->setDateSortie($formData->dateSortie);
            $eleve->setPere($formData->pere);
            $eleve->setPereProfession($formData->pereProfession);
            $eleve->setPereTel($formData->pereTel);
            $eleve->setMere($formData->mere);
            $eleve->setMereProfession($formData->mereProfession);
            $eleve->setMereTel($formData->mereTel);
            $eleve->setExtraitNai($formData->extraitNai);
            $eleve->setLivretSco($formData->livretSco);
            $eleve->setAttestationNiv($formData->attestationNiv);
            $eleve->setRemarque($formData->remarque);
            
            $numClasse         =   $formData->codeClasse->getNumClasse();
            $codeClasse        =    $formData->codeClasse->getCodeClasse();
            $numAnneeSco       =   $formData->nomAnnee->getNumAnnee();
            $anneeScolaire     =   $formData->nomAnnee->getNomAnnee();
            $numCommune        =   $formData->nomCom->getNumCom();
            $numAppreciation   =   $formData->nomAppre->getNumAppre();
              
            $nom        = $eleve->getNom();
            $prenom     = $eleve->getPrenom();
            $sexe       = $eleve->getSexe();
            $dateN      = $eleve->getDateN();
            $filename = $this->remplaceCaractereAccentue($eleveInscription->preUpload($nom, $prenom,
                     $sexe, $dateN, $codeClasse, $anneeScolaire));
  
            $eleveInscription->getPhoto()->move($filePath, $filename);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($eleve);
            $em->flush();
         
            $numEleve          =   $eleve->getNumEleve();
            $eleveReins = new EleveInsReinsEntity();
            $eleveReins->setNumAppre($numAppreciation);
            $eleveReins->setNumCom($numCommune);
            $eleveReins->setNumAnnee($numAnneeSco);
            $eleveReins->setNumClasse($numClasse);
            $eleveReins->setNumEleve($numEleve);
            $eleveReins->setAdrElev($formData->adrElev);
            $eleveReins->setTypeIns($formData->typeIns);
            $eleveReins->setDateIns($formData->dateIns);
            $eleveReins->setFraisIns($formData->fraisIns);
            $eleveReins->setNbPhoto($formData->nbPhoto);
            $eleveReins->setCartePai($formData->cartePai);
            $eleveReins->setBadge($formData->badge);
            $eleveReins->setBulletin($formData->bulletin);
            
            $em2 = $this->getDoctrine()->getManager();
            $em2->persist($eleveReins);
            $em2->flush();
            
            $photo              =   new PhotoEntity();
            $photo->setNomPhoto($filename);
            $photo->setPlacePhoto("bundles/djamadjama/images/");
            $photo->setTaillePhoto(number_format($fileSize/1024, 2, ',', ' '));
            $photo->setDatePhoto(date("Y-m-d H:i:s"));
           
            $em3 = $this->getDoctrine()->getManager();
            $em3->persist($photo);
            $em3->flush();
           
            $photoEleve = new PhotoEleveEntity();
            $photoEleve->setNumEleve($numEleve);
            $photoEleve->setNumPhoto($photo->getNumPhoto());
            $photoEleve->setDateInsertion(date("Y-m-d H:i:s"));
            
            $em4 = $this->getDoctrine()->getManager();
            $em4->persist($photoEleve);
            $em4->flush();
           
            $paiement = new PaiementEntity();
            $paiement->setDatePai1($formData->datePai1);
            $paiement->setOctobre($formData->octobre);
            $paiement->setMontantOct($formData->montantOct);
            
            $paiement->setDatePai8($formData->datePai8);
            $paiement->setMai($formData->mai);
            $paiement->setMontantMai($formData->montantMai);
            
            $paiement->setDatePai9($formData->datePai9);
            $paiement->setJuin($formData->juin);
            $paiement->setMontantJuin($formData->montantJuin);
            
            $em5 = $this->getDoctrine()->getManager();
            $em5->persist($paiement);
            $em5->flush();
        
            $elevepaiement = new EleveInscrisPaiementEntity();
            $elevepaiement->setNumAnnee($numAnneeSco);
            $elevepaiement->setNumAppre($numAppreciation);
            $elevepaiement->setNumEleve($numEleve);
            $elevepaiement->setNumPai($paiement->getNumPai());
            
            $em6 = $this->getDoctrine()->getManager();
            $em6->persist($elevepaiement);
            $em6->flush();
            
            return $this->redirect($this->generateUrl('djama_affichage_inscription_eleve'), 301);
        }
        return $this->render('djamaDjamaBundle:Affichage:eleveinscription.html.twig', array(
            'title'             =>  'Inscrition',
            'dateDuJour'        =>  $dateDuJour,
            'anneeScolaire'     =>  $anneeScolaire,
            'form'              =>  $form->createView(),
        ));
    }

    public function eleveAction(Request $request)
    {
        $dateDuJour = $this->dateDuJour();
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire     = $objetAnneeScolaire->getNomAnnee(); 
        
       
        $form = $this->createForm(new ChoixMultipleForm());
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $numClasse = $form->getData()['choix_classe']->getnumClasse();
           
            $em = $this->getDoctrine()->getManager();
            $queryEleveInscris = $em->createQuery(
                       'SELECT eleve.numEleve, eleve.sexe, eleve.nom, eleve.prenom,
                           eleve.dateN, eleve.numTel, eleve.dateEntree, eleve.dateSortie, 
                           eleve.pere, eleve.pereProfession, eleve.pereTel, eleve.mere,
                           eleve.mereProfession, eleve.mereTel, eleve.extraitNai,
                           eleve.livretSco, eleve.attestationNiv, eleve.remarque,

                           clas.codeClasse,
                           com.nomCom,
                           annee.nomAnnee,
                           appre.nomAppre,
                           paie.octobre, paie.montantOct, paie.datePai1,
                           paie.mai, paie.montantMai,paie.datePai8,
                           paie.juin, paie.montantJuin, paie.datePai9,

                           elevereins.adrElev, elevereins.typeIns, elevereins.dateIns,
                           elevereins.fraisIns, elevereins.nbPhoto, elevereins.cartePai,
                           elevereins.badge, elevereins.bulletin,

                           picto.placePhoto, picto.nomPhoto

                        FROM djamaDjamaBundle:EleveInscrisEntity eleve,
                            djamaDjamaBundle:EleveInsReinsEntity elevereins,
                            djamaDjamaBundle:ClasseEntity clas,
                            djamaDjamaBundle:CommuneEntity com,
                            djamaDjamaBundle:AnneeScolaireEntity annee,
                            djamaDjamaBundle:AppreciationEntity appre,
                            djamaDjamaBundle:PaiementEntity paie,
                            djamaDjamaBundle:EleveInscrisPaiementEntity elevpaie,
                            djamaDjamaBundle:PhotoEntity picto,
                            djamaDjamaBundle:PhotoEleveEntity pictoelev
                        WHERE eleve.numEleve = elevereins.numEleve  AND
                            clas.numClasse = elevereins.numClasse   AND
                            com.numCom  = elevereins.numCom         AND
                            annee.numAnnee = elevereins.numAnnee    AND
                            appre.numAppre = elevereins.numAppre    AND
                            eleve.numEleve = elevpaie.numEleve      AND
                            paie.numPai    = elevpaie.numPai        AND 
                            pictoelev.numEleve = eleve.numEleve     AND
                            picto.numPhoto  = pictoelev.numPhoto    AND
                            clas.numClasse =' . $numClasse . ' '
                            . 'ORDER BY eleve.nom ASC'
            )->getResult();    
            return $this->render('djamaDjamaBundle:Affichage:eleve.html.twig', array(
                'title'             =>  'Eleve inscris',
                'dateDuJour'        =>  $dateDuJour,
                'anneeScolaire'     =>  $anneeScolaire,
                'partie'            =>  2,
                'titre_table'       =>  $form->getData()['choix_classe']->getnomClasse(),
                'photoId'           =>  'Photo',
                'sexe'              =>  'Sexe',
                'nom'               =>  'Nom',
                'prenom'            =>  'Prenom',
                'dateN'             =>  'Date Naissance',
                'numTel'            =>  'Numéro Téléphone',
                'adr'               =>  'Adresse',
                'com'               =>  'Commune',
                'dateEn'            =>  'Date Entrée',
                'dateS'             =>  'Date Sortie',
                'pere'              =>  'Père',
                'pereProf'          =>  'Proffesion Père',
                'telPere'           =>  'Téléphone Père',
                'mere'              =>  'Mère',
                'merePro'           =>  'Profession Mère',
                'telMer'            =>  'Téléphone Mère',
                'typeIns'           =>  'Type Inscription',
                'dateIns'           =>  'Date d\'inscription',
                'fraisIns'          =>  'Frais d\'inscription',
                'cartePai'          =>  'Carte Paiement',
                'bulletin'          =>  'Bulletin',
                'extraitN'          =>  'Extrait Naissance',
                'livretS'           =>  'Livret Scolaire',
                'attestNiv'         =>  'Attestation Niveau',
                'nbPhoto'           =>  'Nombre Photo',
                'moisOct'           =>  'Octobre',
                'montantOct'        =>  'Montant Oct',
                'datePaie'          =>  'Date Paiement',
                'moisMai'           =>  'Mai',
                'montantMai'        =>  'Montant Mai',
                'dateMai'           =>  'Date Paiement',
                'moisJuin'          =>  'Juin',
                'montantJuin'       =>  'Montant Juin',
                'dateJuin'          =>  'Date Paiement',
                'anneeS'            =>  'Année Scolaire',
                'appre'             =>  'Appréciation',
                'remarque'          =>  'Remarque',   
                'Non'               =>  'Non',
                'lstEleve'   =>  $queryEleveInscris, 
            ));
        }

        return $this->render('djamaDjamaBundle:Affichage:eleve.html.twig', array(
            'title'             =>  'Eleve inscris',
            'dateDuJour'        =>  $dateDuJour,
            'anneeScolaire'     =>  $anneeScolaire,
            'partie'            =>  1,
            'form'              =>  $form->createView(),
        ));
    }
    public function eleveUpdateAction(Request $request, $val_id)
    { 
        $dateDuJour = $this->dateDuJour();
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire     = $objetAnneeScolaire->getNomAnnee();
        
        $em = $this->getDoctrine()->getManager();
        
        $queryEleveModifs = $em->createQuery(
                   'SELECT eleve.numEleve, eleve.sexe, eleve.nom, eleve.prenom,
                       eleve.dateN, eleve.numTel, eleve.dateEntree, eleve.dateSortie, 
                       eleve.pere, eleve.pereProfession, eleve.pereTel, eleve.mere,
                       eleve.mereProfession, eleve.mereTel, eleve.extraitNai,
                       eleve.livretSco, eleve.attestationNiv, eleve.remarque,

                       clas.numClasse, clas.codeClasse,
                       com.numCom, com.nomCom,
                       annee.numAnnee, annee.nomAnnee,
                       appre.numAppre, appre.nomAppre,
                       paie.numPai, paie.octobre, paie.montantOct, paie.datePai1,
                       paie.mai, paie.montantMai,paie.datePai8,
                       paie.juin, paie.montantJuin, paie.datePai9,

                       elevereins.adrElev, elevereins.typeIns, elevereins.dateIns,
                       elevereins.fraisIns, elevereins.nbPhoto, elevereins.cartePai,
                       elevereins.badge, elevereins.bulletin,

                       picto.numPhoto, picto.placePhoto, picto.nomPhoto

                    FROM djamaDjamaBundle:EleveInscrisEntity eleve,
                        djamaDjamaBundle:EleveInsReinsEntity elevereins,
                        djamaDjamaBundle:ClasseEntity clas,
                        djamaDjamaBundle:CommuneEntity com,
                        djamaDjamaBundle:AnneeScolaireEntity annee,
                        djamaDjamaBundle:AppreciationEntity appre,
                        djamaDjamaBundle:PaiementEntity paie,
                        djamaDjamaBundle:EleveInscrisPaiementEntity elevpaie,
                        djamaDjamaBundle:PhotoEntity picto,
                        djamaDjamaBundle:PhotoEleveEntity pictoelev
                    WHERE eleve.numEleve = elevereins.numEleve  AND
                        clas.numClasse = elevereins.numClasse   AND
                        com.numCom  = elevereins.numCom         AND
                        annee.numAnnee = elevereins.numAnnee    AND
                        appre.numAppre = elevereins.numAppre    AND
                        eleve.numEleve = elevpaie.numEleve      AND
                        paie.numPai    = elevpaie.numPai        AND 
                        pictoelev.numEleve = eleve.numEleve     AND
                        picto.numPhoto  = pictoelev.numPhoto    AND
                        eleve.numEleve=' . $val_id
        )->getResult(); 
        $eleveInscrisObject = (object)$queryEleveModifs[0];         
        $form = $this->createForm(new EleveUpdateForm(),$eleveInscrisObject);
        $form->handleRequest($request);
        
        if ($form->isValid())
        {
            $formData = $form->getData();
                     
            $em1 = $this->getDoctrine()->getManager(); 
    
            $eleve = $em1->getRepository('djamaDjamaBundle:EleveInscrisEntity')->find($formData->numEleve);
            $eleve->EleveInscrisEntity($formData);
                     
            $commune = $em1->getRepository('djamaDjamaBundle:CommuneEntity')->find($formData->nomCom);
            $commune->setNomCom($formData->nomCom->getNomCom());
                        
            $appreciation = $em1->getRepository('djamaDjamaBundle:AppreciationEntity')->find($formData->numAppre);
            $appreciation->setNomAppre($formData->nomAppre->getNomAppre());
                        
            $paiement = $em1->getRepository('djamaDjamaBundle:PaiementEntity')->find($formData->numPai);
            $paiement->PaiementEntity($formData);        
         
            $em1->flush();
            
            $em2 = $this->getDoctrine()->getEntityManager();
            $connection = $em2->getConnection();
            
            
                    
            $requete = $connection->update('eleveinsreins', array(
                'numAppre'  =>  $formData->nomAppre->getNumAppre(),
                'numCom'    =>  $formData->numCom,
                'adrElev'   =>  $formData->adrElev,
                'typeIns'   =>  $formData->typeIns,
                'dateIns'   =>  $formData->dateIns,
                'fraisIns'  =>  $formData->fraisIns,
                'nbPhoto'   =>  $formData->nbPhoto,
                'cartePai'  =>  $formData->cartePai,
                'badge'     =>  $formData->badge,
                'bulletin'  =>  $formData->bulletin
            ), array(
                'numAnnee'  =>  intval($formData->numAnnee),
                'numClasse' =>  intval($formData->numClasse),
                'numEleve'  =>  intval($formData->numEleve)
            ));
     
            $em3 = $this->getDoctrine()->getEntityManager();
            $connexion = $em3->getConnection();
            $octobre = null;
            $mai = null;
            $juin = null;
                   
            if ($formData->octobre)
                $octobre = 'Oui';
            if ($formData->mai)
                $mai = 'Oui';
            if ($formData->juin)
                $juin = 'Oui';
     
            $requeteUpdatePaiement = $connexion->update('paiement', array(
                    'datePai1'      =>  $formData->datePai1,
                    'octobre'       =>  $octobre,
                    'montantOct'    =>  $formData->montantOct,
                    'datePai8'      =>  $formData->datePai8,
                    'mai'           =>  $mai,
                    'montantMai'    =>  $formData->montantMai,
                    'datePai9'      =>  $formData->datePai9,
                    'juin'          =>  $juin,
                    'montantJuin'   =>  $formData->montantJuin
                    ), array(
                        'numPai'    =>  $formData->numPai
            ));
          
            return $this->redirect($this->generateUrl('djama_affichage_eleve'), 301);
        }
   
        return $this->render('djamaDjamaBundle:Affichage:eleveupdate.html.twig', array(
            'title' =>  'Modification Eléve',
            'val_id'    =>  $val_id,
            'dateDuJour'        =>  $dateDuJour,
            'anneeScolaire'     =>  $anneeScolaire,
            'form'  =>  $form->createView(),
        ));
    }
    public function eleveDeleteAction(Request $request, $val_id) 
    {
        $dateDuJour = $this->dateDuJour();
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire     = $objetAnneeScolaire->getNomAnnee();
        
        $em = $this->getDoctrine()->getManager();
        $queryEleveSupp = $em->createQuery(
                   'SELECT eleve.numEleve, eleve.sexe, eleve.nom, eleve.prenom,
                       eleve.dateN, eleve.numTel, eleve.dateEntree, eleve.dateSortie, 
                       eleve.pere, eleve.pereProfession, eleve.pereTel, eleve.mere,
                       eleve.mereProfession, eleve.mereTel, eleve.extraitNai,
                       eleve.livretSco, eleve.attestationNiv, eleve.remarque,

                       clas.numClasse, clas.codeClasse,
                       com.numCom, com.nomCom,
                       annee.numAnnee, annee.nomAnnee,
                       appre.numAppre, appre.nomAppre,
                       paie.numPai, paie.octobre, paie.montantOct, paie.datePai1,
                       paie.mai, paie.montantMai,paie.datePai8,
                       paie.juin, paie.montantJuin, paie.datePai9,

                       elevereins.adrElev, elevereins.typeIns, elevereins.dateIns,
                       elevereins.fraisIns, elevereins.nbPhoto, elevereins.cartePai,
                       elevereins.badge, elevereins.bulletin,

                       picto.numPhoto, picto.placePhoto

                    FROM djamaDjamaBundle:EleveInscrisEntity eleve,
                        djamaDjamaBundle:EleveInsReinsEntity elevereins,
                        djamaDjamaBundle:ClasseEntity clas,
                        djamaDjamaBundle:CommuneEntity com,
                        djamaDjamaBundle:AnneeScolaireEntity annee,
                        djamaDjamaBundle:AppreciationEntity appre,
                        djamaDjamaBundle:PaiementEntity paie,
                        djamaDjamaBundle:EleveInscrisPaiementEntity elevpaie,
                        djamaDjamaBundle:PhotoEntity picto,
                        djamaDjamaBundle:PhotoEleveEntity pictoelev
                    WHERE eleve.numEleve = elevereins.numEleve  AND
                        clas.numClasse = elevereins.numClasse   AND
                        com.numCom  = elevereins.numCom         AND
                        annee.numAnnee = elevereins.numAnnee    AND
                        appre.numAppre = elevereins.numAppre    AND
                        eleve.numEleve = elevpaie.numEleve      AND
                        paie.numPai    = elevpaie.numPai        AND 
                        pictoelev.numEleve = eleve.numEleve     AND
                        picto.numPhoto  = pictoelev.numPhoto    AND
                        eleve.numEleve=' . $val_id
        )->getResult();
        
        $form = $this->createForm(new EleveDeleteForm(), $queryEleveSupp[0]);
        $form->handleRequest($request);
        
        if ($form->isValid())
        {
            $eleve = new EleveInscrisEntity();
            $eleve->EleveInscrisEntity($form->getData());
            
            $em = $this->getDoctrine()->getEntityManager();
            $connexion = $em->getConnection();
            $connexion->delete('eleveinscris', array(
                'numEleve'  =>  $eleve->getNumEleve()  
            ));
        
            return $this->redirect($this->generateUrl('djama_affichage_eleve'), 301);
        }
        
       return $this->render('djamaDjamaBundle:Affichage:elevedelete.html.twig', array(
            'title' =>  'Suppression Eléve',
            'msg'   =>  'Voulez-vous vraiment supprimer cet éléve ?',
            'val_id'    =>  $val_id,
            'dateDuJour'        =>  $dateDuJour,
            'anneeScolaire'     =>  $anneeScolaire,
            'form'  =>  $form->createView(),
        ));
    }
    public function appreciationAction()
    {
        
    }
    public function directionAction()
    {
        
    }
    public function personnelAction()
    {
        
    }
    public function fichierAction()
    {
        
    }
    
    
    /*
     public function updateAction($id)
{
    $em = $this->getDoctrine()->getEntityManager();
    $testimonial = $em->getRepository('MyBundle:Testimonial')->find($id);
    $form = $this->createForm(new TestimonialType(), $testimonial);

    $request = $this->get('request');
    if ($request->getMethod() == 'POST') {
        $form->bindRequest($request);

        echo $testimonial->getName();

        if ($form->isValid()) {
            // perform some action, such as save the object to the database
            //$testimonial = $form->getData();
            echo 'testimonial: ';
            echo var_dump($testimonial);
            $em->persist($testimonial);
            $em->flush();

            return $this->redirect($this->generateUrl('MyBundle_list_testimonials'));
        }
    }

    return $this->render('MyBundle:Testimonial:update.html.twig', array(
        'form' => $form->createView()
    ));
}
//UPDATE: working now. Had to tweak a few things:

public function updateAction($id)
{
    $request = $this->get('request');

    if (is_null($id)) {
        $postData = $request->get('testimonial');
        $id = $postData['id'];
    }

    $em = $this->getDoctrine()->getEntityManager();
    $testimonial = $em->getRepository('MyBundle:Testimonial')->find($id);
    $form = $this->createForm(new TestimonialType(), $testimonial);

    if ($request->getMethod() == 'POST') {
        $form->bindRequest($request);

        if ($form->isValid()) {
            // perform some action, such as save the object to the database
            $em->flush();

            return $this->redirect($this->generateUrl('MyBundle_list_testimonials'));
        }
    }

    return $this->render('MyBundle:Testimonial:update.html.twig', array(
        'form' => $form->createView()
    ));
}
  */  
}
