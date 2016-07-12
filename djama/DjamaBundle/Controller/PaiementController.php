<?php

namespace djama\DjamaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


use djama\DjamaBundle\Form\ChoixMultiple\ChoixMultipleForm;
use djama\DjamaBundle\Form\Paiement\PaiementUpdateForm;
use djama\DjamaBundle\Form\Paiement\PaiementDeleteForm;
use djama\DjamaBundle\Form\ReglePaiement\ReglePaiementForm;
use djama\DjamaBundle\Form\ReglePaiement\ReglePaiementFormEntity;
use djama\DjamaBundle\Entity\ReglePaiementEntity;
use djama\DjamaBundle\Form\Paiement\EtatPaiementForm;
//use djama\DjamaBundle\Entity\EleveInscrisEntity;
#use Ps\PdfBundle\Annotation\Pdf;
/**
 * Description of PaiementController
 *
 * @author Djama
 */
class PaiementController extends Controller
{
    public function paiementEleveAction(Request $request)
    {
        $arrayDataClasse = explode('=', $request->getQueryString());
        $numClasse = $arrayDataClasse[1];
        if($numClasse)
        {
            $dateDuJour = $this->dateDuJour();
            $objetAnneeScolaire = $this->verifAnneeScolaire();
            $anneeScolaire     = $objetAnneeScolaire['nomAnnee']; 
            
            $em = $this->getDoctrine()->getManager();
            $queryPaiement = $em->createQuery('  
                SELECT tof.placePhoto, elev.sexe, elev.nom, elev.prenom, 
                        paie.numPai, paie.montantMens, paie.montantAnn, paie.totalPai,
                        paie.datePai1, paie.octobre, paie.montantOct,
                        paie.datePai2, paie.novembre, paie.montantNov,
                        paie.datePai3, paie.decembre, paie.montantDec,
                        paie.datePai4, paie.janvier, paie.montantJan,
                        paie.datePai5, paie.fevrier, paie.montantFev,
                        paie.datePai6, paie.mars, paie.montantMars,
                        paie.datePai7, paie.avril, paie.montantAv,
                        paie.datePai8, paie.mai, paie.montantMai,
                        paie.datePai9, paie.juin, paie.montantJuin,
                        paiementEleve.commentaire, 
                        elev.numEleve,
                        eleReins.numClasse,
                        appr.numAppre, appr.nomAppre
                        
                FROM djamaDjamaBundle:EleveInscrisEntity elev,
                     djamaDjamaBundle:EleveInsReinsEntity eleReins,
                     djamaDjamaBundle:EleveInscrisPaiementEntity paiementEleve,
                     djamaDjamaBundle:PaiementEntity paie,
                     djamaDjamaBundle:AnneeScolaireEntity annee,
                     djamaDjamaBundle:PhotoEntity tof,
                     djamaDjamaBundle:PhotoEleveEntity tofElev,
                     djamaDjamaBundle:AppreciationEntity appr
                
                WHERE elev.numEleve = eleReins.numEleve         AND
                      elev.numEleve = paiementEleve.numEleve    AND
                      paie.numPai  = paiementEleve.numPai       AND
                      annee.numAnnee = paiementEleve.numAnnee   AND
                      elev.numEleve = tofElev.numEleve          AND
                      tof.numPhoto  = tofElev.numPhoto          AND
                      appr.numAppre = paiementEleve.numAppre    AND
                      eleReins.numClasse = ' . $numClasse
            )->getResult();
            $classeName = $em->createQuery('
                SELECT clas.nomClasse
                FROM djamaDjamaBundle:ClasseEntity clas
                WHERE clas.numClasse = ' . $numClasse)->getSingleResult();
           
            
            return $this->render('djamaDjamaBundle:Paiement:paiementeleve.html.twig', array(
                'title'             =>  'Paiement éléve',
                'dateDuJour'        =>  $dateDuJour,
                'anneeScolaire'     =>  $anneeScolaire,
                'partie'            =>  2,
                'photoId'           =>  'Photo',
                'sexe'              =>  'Sexe',
                'nom'               =>  'Nom', 
                'prenom'            =>  'Prénom',
                'montantMens'       =>  'Montant Mensuel',
                'montantAnn'        =>  'Montant Annuel',
                'totalPai'          =>  'Total Payé',
                'restePai'          =>  'Reste Payer',
                'datePai1'          =>  'Date Paiement Oct',
                'octobre'           =>  'Octobre',
                'montantOct'        =>  'Montant Oct',
                'datePai2'          =>  'Date Paiement Nov',
                'novembre'          =>  'Novembre',
                'montantNov'        =>  'Montant Nov',
                'datePai3'          =>  'Date Paiement Déc',
                'decembre'          =>  'Décembre',
                'montantDec'        =>  'Montant Déc',
                'datePai4'          =>  'Date Paiement Janv',
                'janvier'           =>  'Janvier',
                'montantJan'        =>  'Montant Janv',
                'datePai5'          =>  'Date Paiement Fév',
                'fevrier'           =>  'Février',
                'montantFev'        =>  'Montant Fév',
                'datePai6'          =>  'Date Paiement Mars',
                'mars'              =>  'Mars',
                'montantMars'       =>  'Montant Mars',
                'datePai7'          =>  'Date Paiement Avr',
                'avril'             =>  'Avril',
                'montantAv'         =>  'Montant Avr',
                'datePai8'          =>  'Date Paiement Mai',
                'mai'               =>  'Mai',
                'montantMai'        =>  'Montant Mai',
                'datePai9'          =>  'Date Paiement Juin',
                'juin'              =>  'Juin',
                'montantJuin'       =>  'Montant Juin',
                'appreciation'      =>  'Appréciation',
                'comment'           =>  'Commentaire',
                'titre_table'       =>  $classeName['nomClasse'],
                'lstPaiement'       =>  $queryPaiement
            )); 
            
        }
        $dateDuJour = $this->dateDuJour();
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire     = $objetAnneeScolaire['nomAnnee']; 
       
        $form = $this->createForm(new ChoixMultipleForm());
        $form->handleRequest($request);
        if ($form->isValid())
        {
            /*
            $loader = new PHPPdf\Core\Configuration\LoaderImpl();
            $loader->setFontFile(*//* path to fonts configuration file *//*);
            $builder = PHPPdf\Core\FacadeBuilder::create($loader);
            $facade = $builder->build();*/
            
            
            $em = $this->getDoctrine()->getManager();
            $queryPaiement = $em->createQuery('  
                SELECT tof.placePhoto, elev.sexe, elev.nom, elev.prenom, 
                        paie.numPai, paie.montantMens, paie.montantAnn, paie.totalPai,
                        paie.datePai1, paie.octobre, paie.montantOct,
                        paie.datePai2, paie.novembre, paie.montantNov,
                        paie.datePai3, paie.decembre, paie.montantDec,
                        paie.datePai4, paie.janvier, paie.montantJan,
                        paie.datePai5, paie.fevrier, paie.montantFev,
                        paie.datePai6, paie.mars, paie.montantMars,
                        paie.datePai7, paie.avril, paie.montantAv,
                        paie.datePai8, paie.mai, paie.montantMai,
                        paie.datePai9, paie.juin, paie.montantJuin,
                        paiementEleve.commentaire, 
                        elev.numEleve,
                        eleReins.numClasse,
                        appr.numAppre, appr.nomAppre
                        
                FROM djamaDjamaBundle:EleveInscrisEntity elev,
                     djamaDjamaBundle:EleveInsReinsEntity eleReins,
                     djamaDjamaBundle:EleveInscrisPaiementEntity paiementEleve,
                     djamaDjamaBundle:PaiementEntity paie,
                     djamaDjamaBundle:AnneeScolaireEntity annee,
                     djamaDjamaBundle:PhotoEntity tof,
                     djamaDjamaBundle:PhotoEleveEntity tofElev,
                     djamaDjamaBundle:AppreciationEntity appr
                
                WHERE elev.numEleve = eleReins.numEleve         AND
                      elev.numEleve = paiementEleve.numEleve    AND
                      paie.numPai  = paiementEleve.numPai       AND
                      annee.numAnnee = paiementEleve.numAnnee   AND
                      elev.numEleve = tofElev.numEleve          AND
                      tof.numPhoto  = tofElev.numPhoto          AND
                      appr.numAppre = paiementEleve.numAppre    AND
                      eleReins.numClasse = ' . $form->getData()['choix_classe']->
                      getNumClasse()
            )->getResult();
           /*
            //liens : http://wiki.spipu.net/doku.php?id=html2pdf:fr:v4:accueil
            
            //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('djamaDjamaBundle:Paiement:paiementeleve.html.twig', array(
                'title'             =>  'Paiement éléve',
                'dateDuJour'        =>  $dateDuJour,
                'anneeScolaire'     =>  $anneeScolaire,
                'partie'            =>  2,
                'photoId'           =>  'Photo',
                'sexe'              =>  'Sexe',
                'nom'               =>  'Nom', 
                'prenom'            =>  'Prénom',
                'montantMens'       =>  'Montant Mensuel',
                'montantAnn'        =>  'Montant Annuel',
                'totalPai'          =>  'Total Payé',
                'restePai'          =>  'Reste à Payer',
                'datePai1'          =>  'Date Paiement Oct',
                'octobre'           =>  'Octobre',
                'montantOct'        =>  'Montant Oct',
                'datePai2'          =>  'Date Paiement Nov',
                'novembre'          =>  'Novembre',
                'montantNov'        =>  'Montant Nov',
                'datePai3'          =>  'Date Paiement Déc',
                'decembre'          =>  'Décembre',
                'montantDec'        =>  'Montant Déc',
                'datePai4'          =>  'Date Paiement Janv',
                'janvier'           =>  'Janvier',
                'montantJan'        =>  'Montant Janv',
                'datePai5'          =>  'Date Paiement Fév',
                'fevrier'           =>  'Février',
                'montantFev'        =>  'Montant Fév',
                'datePai6'          =>  'Date Paiement Mars',
                'mars'              =>  'Mars',
                'montantMars'       =>  'Montant Mars',
                'datePai7'          =>  'Date Paiement Avr',
                'avril'             =>  'Avril',
                'montantAv'         =>  'Montant Avr',
                'datePai8'          =>  'Date Paiement Mai',
                'mai'               =>  'Mai',
                'montantMai'        =>  'Montant Mai',
                'datePai9'          =>  'Date Paiement Juin',
                'juin'              =>  'Juin',
                'montantJuin'       =>  'Montant Juin',
                'comment'           =>  'Commentaire',
                'titre_table'       =>  $form->getData()['choix_classe']->getNomClasse(),
                'lstPaiement'       =>  $queryPaiement
            ));
            
            //on instancie la classe Html2Pdf_Html2Pdf en lui passant en paramètre
            //le sens de la page "portrait" => p ou "paysage" => l
            //le format A4,A5...
            //la langue du document fr,en,it...
            $html2pdf = new \Html2Pdf_Html2Pdf('l','A3','fr');
            //SetDisplayMode définit la manière dont le document PDF va être affiché par l’utilisateur
            //fullpage : affiche la page entière sur l'écran
            //fullwidth : utilise la largeur maximum de la fenêtre
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('fullpage');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet avec un nom spécifique qui aura un rapport avec le contenu à convertir (exemple : Facture, Règlement…)
            $html2pdf->Output('inscription.pdf');
            return new Response();
            */
            return $this->render('djamaDjamaBundle:Paiement:paiementeleve.html.twig', array(
                'title'             =>  'Paiement éléve',
                'dateDuJour'        =>  $dateDuJour,
                'anneeScolaire'     =>  $anneeScolaire,
                'partie'            =>  2,
                'photoId'           =>  'Photo',
                'sexe'              =>  'Sexe',
                'nom'               =>  'Nom', 
                'prenom'            =>  'Prénom',
                'montantMens'       =>  'Montant Mensuel',
                'montantAnn'        =>  'Montant Annuel',
                'totalPai'          =>  'Total Payé',
                'restePai'          =>  'Reste Payer',
                'datePai1'          =>  'Date Paiement Oct',
                'octobre'           =>  'Octobre',
                'montantOct'        =>  'Montant Oct',
                'datePai2'          =>  'Date Paiement Nov',
                'novembre'          =>  'Novembre',
                'montantNov'        =>  'Montant Nov',
                'datePai3'          =>  'Date Paiement Déc',
                'decembre'          =>  'Décembre',
                'montantDec'        =>  'Montant Déc',
                'datePai4'          =>  'Date Paiement Janv',
                'janvier'           =>  'Janvier',
                'montantJan'        =>  'Montant Janv',
                'datePai5'          =>  'Date Paiement Fév',
                'fevrier'           =>  'Février',
                'montantFev'        =>  'Montant Fév',
                'datePai6'          =>  'Date Paiement Mars',
                'mars'              =>  'Mars',
                'montantMars'       =>  'Montant Mars',
                'datePai7'          =>  'Date Paiement Avr',
                'avril'             =>  'Avril',
                'montantAv'         =>  'Montant Avr',
                'datePai8'          =>  'Date Paiement Mai',
                'mai'               =>  'Mai',
                'montantMai'        =>  'Montant Mai',
                'datePai9'          =>  'Date Paiement Juin',
                'juin'              =>  'Juin',
                'montantJuin'       =>  'Montant Juin',
                'appreciation'      =>  'Appréciation',
                'comment'           =>  'Commentaire',
                'titre_table'       =>  $form->getData()['choix_classe']->getNomClasse(),
                'lstPaiement'       =>  $queryPaiement
            )); 
        }
        return $this->render('djamaDjamaBundle:Paiement:paiementeleve.html.twig', array(
            'title'             =>  'Paiement éléve',
            'dateDuJour'        =>  $dateDuJour,
            'anneeScolaire'     =>  $anneeScolaire,
            'partie'            =>  1,
            'form'              =>  $form->createView(),
        )); 
        /*$html = $this->renderView('djamaDjamaBundle:Paiement:paiementeleve.pdf.twig', array(
            'name' => 'camarde'
        ));
    $pdfGenerator = $this->get('spraed.pdf.generator');

    return new Response($pdfGenerator->generatePDF($html),
                    200,
                    array(
                        'Content-Type' => 'application/pdf',
                        'Content-Disposition' => 'inline; filename="out.pdf"'
                    )
    );*/
       // $format = 'pdf'; 
    /*    return $this->render(sprintf('djamaDjamaBundle:Paiement:paiementeleve.pdf.twig', 'pdf'), array(
           'name'   =>  'camarade', 
        ));*/
    }
    public function exportPdfAction()
    {
        
    }
    public function exportExcelAction()
    {
        
    }
    public function paiementEleveUpdateAction(Request $request, $numEleve, $numClasse)
    {
        $dateDuJour         = $this->dateDuJour();
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire      = $objetAnneeScolaire['nomAnnee']; 
       
        $em = $this->getDoctrine()->getManager();
            $queryPaiement = $em->createQuery('  
                SELECT tof.placePhoto, elev.sexe, elev.nom, elev.prenom, 
                        paie.numPai, paie.montantMens, paie.montantAnn, paie.totalPai,
                        paie.datePai1, paie.octobre, paie.montantOct,
                        paie.datePai2, paie.novembre, paie.montantNov,
                        paie.datePai3, paie.decembre, paie.montantDec,
                        paie.datePai4, paie.janvier, paie.montantJan,
                        paie.datePai5, paie.fevrier, paie.montantFev,
                        paie.datePai6, paie.mars, paie.montantMars,
                        paie.datePai7, paie.avril, paie.montantAv,
                        paie.datePai8, paie.mai, paie.montantMai,
                        paie.datePai9, paie.juin, paie.montantJuin,
                        paiementEleve.commentaire, 
                        elev.numEleve,
                        appr.numAppre, appr.nomAppre
                        
                FROM djamaDjamaBundle:EleveInscrisEntity elev,
                     djamaDjamaBundle:EleveInsReinsEntity eleReins,
                     djamaDjamaBundle:EleveInscrisPaiementEntity paiementEleve,
                     djamaDjamaBundle:PaiementEntity paie,
                     djamaDjamaBundle:AnneeScolaireEntity annee,
                     djamaDjamaBundle:PhotoEntity tof,
                     djamaDjamaBundle:PhotoEleveEntity tofElev,
                     djamaDjamaBundle:AppreciationEntity appr
                     
                WHERE elev.numEleve = eleReins.numEleve         AND
                      elev.numEleve = paiementEleve.numEleve    AND
                      paie.numPai  = paiementEleve.numPai       AND
                      annee.numAnnee = paiementEleve.numAnnee   AND
                      elev.numEleve = tofElev.numEleve          AND
                      tof.numPhoto  = tofElev.numPhoto          AND
                      appr.numAppre = paiementEleve.numAppre    AND
                      eleReins.numClasse = ' . $numClasse .      'AND
                      elev.numEleve = ' . $numEleve
            )->getResult();
   
        $form   =   $this->createForm(new PaiementUpdateForm(), $queryPaiement[0]);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $formData = $form->getData(); 
            
            $em = $this->getDoctrine()->getEntityManager();
            $connection = $em->getConnection();    
            $requete = $connection->update('eleveinscris', array(
                'sexe'      =>  $formData['sexe'],
                'nom'       =>  $formData['nom'],
                'prenom'    =>  $formData['prenom']
            ), array(
                'numEleve'  =>  intval($formData['numEleve'])
            ));
            $em2 = $this->getDoctrine()->getEntityManager();
            $connex =   $em2->getConnection();
            $requetePaiement = $connex->update('paiement', array(
                'montantMens'   =>  $formData['montantMens'],
                'montantAnn'    =>  $formData['montantAnn'],
                'totalPai'      =>  $formData['totalPai'],
                'datePai1'      =>  $formData['datePai1'],
                'octobre'       =>  $formData['octobre'],
                'montantOct'    =>  $formData['montantOct'],
                'datePai2'      =>  $formData['datePai2'],
                'novembre'      =>  $formData['novembre'],
                'montantNov'    =>  $formData['montantNov'],
                'datePai3'      =>  $formData['datePai3'],
                'decembre'      =>  $formData['decembre'],
                'montantDec'    =>  $formData['montantDec'],
                'datePai4'      =>  $formData['datePai4'],
                'janvier'       =>  $formData['janvier'],
                'montantJan'    =>  $formData['montantJan'],
                'datePai5'      =>  $formData['datePai5'],
                'fevrier'       =>  $formData['fevrier'],
                'montantFev'    =>  $formData['montantFev'],
                'datePai6'      =>  $formData['datePai6'],
                'mars'          =>  $formData['mars'],
                'montantMars'   =>  $formData['montantMars'],
                'datePai7'      =>  $formData['datePai7'],
                'avril'         =>  $formData['avril'],
                'montantAv'     =>  $formData['montantAv'],
                'datePai8'      =>  $formData['datePai8'],
                'mai'           =>  $formData['mai'],
                'montantMai'    =>  $formData['montantMai'],
                'datePai9'      =>  $formData['datePai9'],
                'juin'          =>  $formData['juin'],
                'montantJuin'   =>  $formData['montantJuin']
            ), array(
               'numPai'         =>  $formData['numPai'] 
            ));
            $em3 = $this->getDoctrine()->getEntityManager();
            $connec = $em3->getConnection();
            $connec->update('eleveinscrispaiement', array(
                'commentaire'   =>  $formData['commentaire']
            ), array(
                'numEleve'      =>  $formData['numEleve'],
                'numPai'        =>  $formData['numPai'],
                'numAnnee'      =>  $objetAnneeScolaire['numAnnee'],
                'numAppre'      =>  $formData['nomAppre']->getNumAppre()
            ));
           
            return $this->redirect($this->generateUrl('djama_paiement_eleve'), 301);
        }
        
        return $this->render('djamaDjamaBundle:Paiement:paiementeleveupdate.html.twig', array(
                'title'             =>  'Modification paiement',
                'dateDuJour'        =>  $dateDuJour,
                'anneeScolaire'     =>  $anneeScolaire,
                'form'              =>  $form->createView(),
                'numEleve'            =>  $numEleve,
                'numClasse'           =>  $numClasse,
                'montantAnn'        =>  $queryPaiement[0]['montantAnn'],
                'totalPai'          =>  $queryPaiement[0]['totalPai'],
        ));
    }
    public function paiementEleveDeleteAction(Request $request, $numEleve, $numClasse)
    {
        $dateDuJour         = $this->dateDuJour();
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire      = $objetAnneeScolaire['nomAnnee']; 
        
        $em = $this->getDoctrine()->getManager();
            $queryPaiement = $em->createQuery('  
                SELECT tof.placePhoto, elev.sexe, elev.nom, elev.prenom, 
                        paie.numPai, paie.montantMens, paie.montantAnn, paie.totalPai,
                        paie.datePai1, paie.octobre, paie.montantOct,
                        paie.datePai2, paie.novembre, paie.montantNov,
                        paie.datePai3, paie.decembre, paie.montantDec,
                        paie.datePai4, paie.janvier, paie.montantJan,
                        paie.datePai5, paie.fevrier, paie.montantFev,
                        paie.datePai6, paie.mars, paie.montantMars,
                        paie.datePai7, paie.avril, paie.montantAv,
                        paie.datePai8, paie.mai, paie.montantMai,
                        paie.datePai9, paie.juin, paie.montantJuin,
                        paiementEleve.commentaire, 
                        elev.numEleve,
                        clas.numClasse,
                        tof.numPhoto
                        
                        
                FROM djamaDjamaBundle:EleveInscrisEntity elev,
                     djamaDjamaBundle:EleveInsReinsEntity eleReins,
                     djamaDjamaBundle:EleveInscrisPaiementEntity paiementEleve,
                     djamaDjamaBundle:PaiementEntity paie,
                     djamaDjamaBundle:AnneeScolaireEntity annee,
                     djamaDjamaBundle:PhotoEntity tof,
                     djamaDjamaBundle:PhotoEleveEntity tofElev,
                     djamaDjamaBundle:AppreciationEntity appr,
                     djamaDjamaBundle:ClasseEntity clas
                     
                WHERE elev.numEleve = eleReins.numEleve         AND
                      elev.numEleve = paiementEleve.numEleve    AND
                      paie.numPai  = paiementEleve.numPai       AND
                      annee.numAnnee = paiementEleve.numAnnee   AND
                      elev.numEleve = tofElev.numEleve          AND
                      tof.numPhoto  = tofElev.numPhoto          AND
                      appr.numAppre = paiementEleve.numAppre    AND
                      clas.numClasse = eleReins.numClasse       AND
                      clas.numClasse = ' . $numClasse .         'AND
                      elev.numEleve = ' . $numEleve
            )->getResult();
            
            $form = $this->createForm(new PaiementDeleteForm(), $queryPaiement[0]);
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $formData = $form->getData();
               if ($form->get('Supprimer')->isClicked())
               {
                    $em2 = $this->getDoctrine()->getEntityManager();
                    $connexion = $em2->getConnection();
                    $connexion->delete('eleveinscris', array(
                    'numEleve'  =>  $formData['numEleve'] 
                    ));
                   $connexion->delete('paiement', array(
                    'numPai'  =>  $formData['numPai'] 
                    ));
                   $connexion->delete('photo', array(
                    'numPhoto'  =>  $formData['numPhoto'] 
                    ));
                    
                    return $this->redirect($this->generateUrl('djama_paiement_eleve', 
                            array('numClasse' =>  $numClasse)), 301);
               }
               else
               {
                   return $this->redirect($this->generateUrl('djama_paiement_eleve'), 301);
               }
                var_dump($form->getData());
               exit('suppression'); 
            }
            return $this->render('djamaDjamaBundle:Paiement:paiementelevedelete.html.twig', array(
                'title'             =>  'Suppression paiement',
                'dateDuJour'        =>  $dateDuJour,
                'anneeScolaire'     =>  $anneeScolaire,
                'form'              =>  $form->createView(),
                'numEleve'            =>  $queryPaiement[0]['numEleve'],
                'numClasse'           =>  $queryPaiement[0]['numClasse']
            ));        
    }
    public function paiementAnnuelleEleveAction()
    {
        
    }
    public  function paiementPersonnelAction()
    {
        
    }
    public function paiementPersonnelUpdateAction()
    {
        
    }
    public function paiementPersonnelDeleteAction()
    {
        
    }
    public function paiementAnnuellePersonnelAction()
    {
        
    }
    public function saisieReglePaiementAction(Request $request)
    {
        $dateDuJour         = $this->dateDuJour();
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire      = $objetAnneeScolaire['nomAnnee']; 
        
        $form   =   $this->createForm(new ReglePaiementForm(), new ReglePaiementFormEntity());
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $reglePaiement = new ReglePaiementEntity();
            $reglePaiement->ReglePaiementEntity(array(
                'numReglePai'   =>  $form->getData()->numReglePai,
                'nomReglePai'   =>  $form->getData()->nomReglePai,
                'periodeDebut'  =>  $form->getData()->periodeDebut,
                'periodeFin'    =>  $form->getData()->periodeFin
                )
            );
            $em = $this->getDoctrine()->getManager();
            $em->persist($reglePaiement);
            $em->flush();
                
            return $this->redirect($this->generateUrl('djama_paiement_saisiereglepaiement'), 301);
        }
       return $this->render('djamaDjamaBundle:Paiement:reglepaiementsaisiemodifsupp.html.twig', array(
           'title'              =>  'Saisie règle de paiement',
           'dateDuJour'         =>  $dateDuJour,
           'anneeScolaire'      =>  $anneeScolaire,
           'partie'             =>  1,
           'form'               =>  $form->createView()
        ));
    }
    public function afficheReglePaiementAction()
    {
        $dateDuJour         = $this->dateDuJour();
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire      = $objetAnneeScolaire['nomAnnee'];
        
        $em = $this->getDoctrine()->getManager();
        $resultRegle = $em->createQuery('
            SELECT regle.numReglePai, regle.nomReglePai, regle.periodeDebut, regle.periodeFin
            FROM djamaDjamaBundle:ReglePaiementEntity regle
            ')->getResult();
        
        return $this->render('djamaDjamaBundle:Paiement:affichereglepaiement.html.twig', array(
            'title'             =>  'Liste de règle de paiement',
            'dateDuJour'        =>  $dateDuJour,
            'anneeScolaire'     =>  $anneeScolaire,
            'titre_table'       =>  'Liste de règle de paiements',
            'nomregle'          =>  'Nom',
            'periodedebut'      =>  'Période Début',
            'periodefin'        =>  'Période Fin',
            'lstReglePaiement'  =>  $resultRegle,
        ));
    }
    public function reglePaiementModifSuppAction(Request $request, $numReglePai, $bool)
    { 
        $dateDuJour         = $this->dateDuJour();
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire      = $objetAnneeScolaire['nomAnnee']; 
        //Partie modification
        if (!is_null($numReglePai) && $bool == 1)
        {
            $em = $this->getDoctrine()->getManager();
            $queryResultModif = $em->getRepository('djamaDjamaBundle:ReglePaiementEntity')
                    ->find($numReglePai);
            $form   =   $this->createForm(new ReglePaiementForm(), $queryResultModif);
            $form->handleRequest($request);
            
            if ($form->isValid())
            {
                $formData = $form->getData();
                
                $em2 = $this->getDoctrine()->getEntityManager();
                $connec = $em2->getConnection();
                $connec->update('reglepaiement', array(
                'nomReglePai'   =>  $formData->getNomReglePai(),
                'periodeDebut'  =>  $formData->getPeriodeDebut(),
                'periodeFin'    =>  $formData->getPeriodeFin()
                ), array(
                    'numReglePai'      =>  $formData->getNumReglePai()
                ));
                
                return $this->redirect($this->generateUrl('djama_paiement_reglepaiemet'), 301);        
            }
            return $this->render('djamaDjamaBundle:Paiement:reglepaiementsaisiemodifsupp.html.twig', array(
                'title'             =>  'Modification règle de paiement',
                'dateDuJour'        =>  $dateDuJour,
                'anneeScolaire'     =>  $anneeScolaire,  
                'partie'            =>  2,
                'form'              =>  $form->createView(),
                'numReglePai'       =>  $form->getData()->getNumReglePai(),
                'bool'              =>  1
            ));
        }// Partie suppression 
        elseif (!is_null($numReglePai) && $bool == 2)
        {
            $em = $this->getDoctrine()->getManager();
            $queryResultSupp = $em->getRepository('djamaDjamaBundle:ReglePaiementEntity')
                    ->find($numReglePai);
            $form   =   $this->createForm(new ReglePaiementForm(), $queryResultSupp);
            $form->handleRequest($request);
            
            if ($form->isValid())
            {
                $formData = $form->getData();
                
                $em2 = $this->getDoctrine()->getEntityManager();
                $connec = $em2->getConnection();
                $connec->delete('reglePaiement', array(
                    'numReglePai'  =>  $formData->getNumReglePai() 
                    )
                );   
                return $this->redirect($this->generateUrl('djama_paiement_reglepaiemet'), 301);
            }
            return $this->render('djamaDjamaBundle:Paiement:reglepaiementsaisiemodifsupp.html.twig', array(
               'title'             =>  'Suppression règle de paiement',
               'dateDuJour'        =>  $dateDuJour,
               'anneeScolaire'     =>  $anneeScolaire,  
               'partie'            =>  3,
              // 'form'              =>  $form->createView(),
               'bool'              =>  2
            ));
        }
        // Faire une redirection sur une page d'erreur
    }
    public function etatPaiementAction(Request $request)
    {
        $dateDuJour         = $this->dateDuJour();
        $objetAnneeScolaire = $this->verifAnneeScolaire();
        $anneeScolaire      = $objetAnneeScolaire['nomAnnee']; 
 
        $form = $this->createForm(new EtatPaiementForm());
        $form->handleRequest($request);
        
        if ($form->isValid())
        {
            exit('Action : etatPaiement');
        }
        
        return $this->render('djamaDjamaBundle:Paiement:etatpaiement.html.twig', array(
               'title'             =>  'Choix d\' une période de paiement',
               'dateDuJour'        =>  $dateDuJour,
               'anneeScolaire'     =>  $anneeScolaire,  
               'partie'            =>  1,
               'form'              =>  $form->createView(),      
        ));
    }
    
}
