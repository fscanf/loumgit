<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace GSKUserBundle\DataFixtures;

use Doctrine\Common\DataFixture\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GSKUserBundle\Entity\User;

/**
 * Description of LoadUser implements FixtureInteface
 *
 * @author Djama
 */
class LoadUser implements FixtureInteface {
   
    public function load(ObjectManager $manager)
    {
exit("load(ObjectManager $manager)");
    // Les noms d'utilisateurs à créer
    $listNames = array('mamadou', 'bouba', 'binta');

    foreach ($listNames as $name) {
      // On crée l'utilisateur
      $user = new User;
      
      // Le nom d'utilisateur et le mot de passe sont identiques
      $user->setUsername($name);
      $user->setPassword($name);

      // On ne se sert pas du sel pour l'instant
      $user->setSalt('');
      // On définit uniquement le role ROLE_USER qui est le role de base
      $user->setRoles(array('ROLE_USER'));

      // On le persiste
      $manager->persist($user);
    }
    // On déclenche l'enregistrement
    $manager->flush();

  }
}
