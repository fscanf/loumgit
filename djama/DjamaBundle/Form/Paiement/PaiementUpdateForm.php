<?php

namespace djama\DjamaBundle\Form\Paiement;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of PaiementUpdateForm
 *
 * @author Djama
 */
class PaiementUpdateForm extends AbstractType
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
                ->add('sexe', 'choice', array(
                    'choices'   =>  array(
                    'M'     =>  'Masculin',
                    'F'     =>  'Feminin'
                   )
                ))
                ->add('nom',    'text')
                ->add('prenom', 'text')
                ->add('montantMens', 'number')
                ->add('datePai1', 'text', array(
                    'max_length'    =>  12
                ))
                ->add('octobre', 'choice', array(
                    'required'  =>  false,
                    'choices'   =>  array(
                    'Non'   =>  'Non',
                    'Oui'   =>  'Oui'                        
                )))
                ->add('montantOct', 'number', array(
                        'required'  =>  false,
                ))
                ->add('datePai2', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('novembre',   'choice', array(
                    'required'  =>  false,
                   'choices'    =>  array(
                       'Non'   =>  'Non',
                       'Oui'   =>  'Oui'                        
                   ) 
                ))
                ->add('montantNov', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai3', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('decembre', 'choice', array(
                    'required'  =>  false,
                    'choices'   =>  array(
                        'Non'   =>  'Non',
                        'Oui'   =>  'Oui'                        
                    )
                ))
                ->add('montantDec', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai4', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('janvier', 'choice', array(
                    'required'  =>  false,
                    'choices'   =>  array(
                        'Non'   =>  'Non',
                        'Oui'   =>  'Oui'                        
                    )
                ))
                ->add('montantJan', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai5', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('fevrier', 'choice', array(
                    'required'  =>  false,
                    'choices'   =>  array(
                        'Non'   =>  'Non',
                        'Oui'   =>  'Oui'                        
                    )
                ))
                ->add('montantFev', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai6', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('mars', 'choice', array(
                    'required'  =>  false,
                    'choices'   =>  array(
                        'Non'   =>  'Non',
                        'Oui'   =>  'Oui'                        
                    )
                ))
                ->add('montantMars', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai7', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('avril', 'choice', array(
                    'required'  =>  false,
                    'choices'   =>  array(
                        'Non'   =>  'Non',
                        'Oui'   =>  'Oui'                        
                    )
                ))
                ->add('montantAv', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai8', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('mai', 'choice', array(
                    'required'  =>  false,
                    'choices'   =>  array(
                        'Non'   =>  'Non',
                        'Oui'   =>  'Oui'                        
                    )
                ))
                ->add('montantMai', 'number', array(
                    'required'  =>  false,
                ))
                ->add('datePai9', 'text', array(
                    'required'  =>  false,
                    'max_length'    =>  12
                ))
                ->add('juin', 'choice', array(
                    'required'  =>  false,
                    'choices'   =>  array(
                        'Non'   =>  'Non',
                        'Oui'   =>  'Oui'                        
                    )
                ))
                ->add('montantJuin', 'number', array(
                    'required'  =>  false,
                ))
                ->add('numAppre', 'hidden')
                ->add('nomAppre',   'entity', array(
                    'class'     =>  'djamaDjamaBundle:AppreciationEntity',
                    'property'  =>  'nomAppre',
                    'required'  =>  'false'
                ))
                ->add('commentaire', 'textarea', array(
                    'required'  =>  false,
                ));
    }
    public function getName() 
    {
        return 'form_modif_paiement';
    }
}
