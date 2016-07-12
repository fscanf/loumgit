<?php

namespace djama\DjamaBundle\Form\Paiement;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * Description of EtatPaiementForm
 *
 * @author Djama
 */
class EtatPaiementForm extends AbstractType
{
    
   public function buildForm(FormBuilderInterface $builder, array $options) 
   {
       parent::buildForm($builder, $options);
       $builder
               ->add('classList', 'entity', array(
                   'empty_value'    =>  'Selectionnez une classe svp !',
                   'class'          =>  'djamaDjamaBundle:ClasseEntity',
                   'property'       =>  'codeClasse',
                   'required'       =>  'true',
               ))
               ->add('paiementRegleList', 'entity', array(
                   'empty_value'    =>  'Selectionnez une règle de paiement svp!',
                   'class'          =>  'djamaDjamaBundle:ReglePaiementEntity',
                   'property'       =>  'nomReglePai',
                   'required'       =>  'true',
               ))
               ->add('anneeList', 'entity', array(
                   'empty_value'    =>  'Selectionnez une année svp!',
                   'class'          =>  'djamaDjamaBundle:AnneeScolaireEntity',
                   'property'       =>  'nomAnnee',
                   'required'       =>  'true'
               ));
   }
   
   public function getName() 
   {
       return 'form_etat_paiement';
   }
}
