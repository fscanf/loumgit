<?php

namespace djama\DjamaBundle\Form\Paiement;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * Description of PaiementDeleteForm
 *
 * @author Djama
 */
class PaiementDeleteForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        parent::buildForm($builder, $options);
        $builder
                ->add('numEleve', 'hidden')
                ->add('numPai', 'hidden')
                /*->add('photo', 'file', array(
                    'required'  =>  false
                ))*/
                ->add('sexe', 'text')
                ->add('nom',    'text')
                ->add('prenom', 'text')
                ->add('montantMens', 'number')
                ->add('montantAnn', 'number')
                ->add('totalPai', 'number')
                ->add('datePai1', 'text', array(
                    'max_length'    =>  12,
                    'required'      =>  false
                ))
                ->add('octobre', 'text', array(
                    'required'      =>  false
                ))
                ->add('montantOct', 'number', array(
                        'required'  =>  false,
                ))
                ->add('datePai2', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('novembre',   'text', array(
                    'required'      =>  false
                ))
                ->add('montantNov', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai3', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('decembre', 'text', array(
                    'required'      =>  false
                ))
                ->add('montantDec', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai4', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('janvier', 'text', array(
                    'required'      =>  false
                ))
                ->add('montantJan', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai5', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('fevrier', 'text', array(
                    'required'      =>  false
                ))
                ->add('montantFev', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai6', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('mars', 'text', array(
                    'required'      =>  false
                ))
                ->add('montantMars', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai7', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('avril', 'text', array(
                    'required'      =>  false
                ))
                ->add('montantAv', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai8', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('mai', 'text', array(
                    'required'      =>  false
                ))
                ->add('montantMai', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai9', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('juin', 'text', array(
                    'required'      =>  false
                ))
                ->add('montantJuin', 'number', array(
                    'required'  =>  false,
                ))
                ->add('numAppre', 'hidden')
                ->add('nomAppre',   'text', array(
                    'required'      =>  false
                ))
                ->add('commentaire', 'textarea', array(
                    'required'  =>  false,
                ))
                ->add('Supprimer', 'submit')
                ->add('Annuller', 'submit')
               ;
    }
    public function getName() 
    {
        return 'Form_delete_paiement';
    }
}
