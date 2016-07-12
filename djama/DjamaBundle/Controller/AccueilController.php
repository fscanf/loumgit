<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace djama\DjamaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of AccueilController
 *
 * @author Djama
 */
class AccueilController extends Controller
{    
    public function pageAccueilAction()
    {
        return $this->render('djamaDjamaBundle:Accueil:accueil.html.twig', array(
            'title' =>          'page d\'accueil',
            'msgbienvenue' =>   'Bienvenue sur l\'application djama du GS Kaloum'
        ));
    }
    
}
