<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace GSKUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

// use Symfony\Component\HttpFoundation\Request;

/**
 * Description of SecurityController
 *
 * @author Djama
 */
class SecurityController extends Controller {

    // https://github.com/FriendsOfSymfony/FOSUserBundle/tree/master/Resources/config
    // https://openclassrooms.com/courses/developpez-votre-site-web-avec-le-framework-symfony2/securite-et-gestion-des-utilisateurs
    // http://symfony.com/doc/current/bundles/FOSUserBundle/index.html
    // http://www.sfloumka.dev/app_dev.php/login

    public function loginAction(Request $request) {
        
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            
            //return $this->redirectToRoute('djama_accueil');
            return $this->redirect('djama_accueil', 301);
        }

        // Le service authentication_utils permet de récupérer le nom d'utilisateur
        // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
        // (mauvais mot de passe par exemple)

        $authenticationUtils = $this->get('security.authentication_utils');

// génération d'un mot de passe avec bcrypt
// cost: 12
$password =  password_hash('binta', PASSWORD_DEFAULT);
// ou 
// sur la console : php bin/console security:encode-password
        return $this->render('GSKUserBundle:Security:login.html.twig', array(
                    'last_username' => $authenticationUtils->getLastUsername(),
                    'error' => $authenticationUtils->getLastAuthenticationError(),
                    'crypto' => $password,
        ));
    }

    public function loginOutAction() {
        //exit("loginOutAction");
        return;
    }

}
