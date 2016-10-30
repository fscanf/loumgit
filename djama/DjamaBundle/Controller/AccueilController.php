<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace djama\DjamaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // pour la gestion des acces aux resources

/**
 * Description of AccueilController
 *
 * @author Djama
 */
class AccueilController extends Controller
{    
    // has_role ('IS_AUTHENTICATED_REMEMBERED') : pour verifier que l'utilisateur est authentifier et n'est pas anonyme
    /**
     * @return type
     * @Security("has_role('ROLE_USER')")
     */
    public function pageAccueilAction()
    {
        // on verifie bien que l'utilisateur dispose bien du role ROLE_USER
       /* if (!$this->get('security.context')->isGranted("ROLE_USER")) {
            // sinon on declenche une exception 'acces interdit'
            throw new AccessDeniedException('Accès limitié aux user');
        }*/
        return $this->render('djamaDjamaBundle:Accueil:accueil.html.twig', array(
            'title' =>          'page d\'accueil',
            'msgbienvenue' =>   'Bienvenue sur l\'application djama du GS Kaloum'
        ));
    }
    
}
