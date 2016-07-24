<?php

namespace djama\DjamaBundle\Form\Eleve;

use \Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * Description of EleveDeleteForm
 *
 * @author Djama
 */
class EleveDeleteForm extends AbstractType 
{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder
                ->add('numPhoto', 'hidden')
                ->add('placePhoto', 'hidden', array(
                    'required'  =>  FALSE
                ))
                ->add('numEleve', 'hidden')
                ->add('sexe', 'text')
                ->add('nom', 'text', array(
                    'required'  =>  true
                ))
                ->add('prenom', 'text', array(
                    'required'  =>  true
                ))
                ->add('dateN', 'text')
                ->add('numTel', 'text', array(
                    'required'  =>  false
                ))
                ->add('adrElev', 'text', array(
                    'required'  =>  false
                ))
                ->add('numCom', 'hidden')
                ->add('nomCom', 'text')
                ->add('dateEntree', 'text', array(
                    'required'  =>  true
                ))
                ->add('dateSortie','text', array(
                    'required'  =>  false
                ))
                ->add('pere', 'text', array(
                    'required'  =>  true
                ))
                ->add('pereProfession', 'text', array(
                    'required'  =>  false
                ))
                ->add('pereTel', 'text', array(
                    'required'  =>  false
                ))
                ->add('mere', 'text', array(
                    'required'  =>  true
                ))
                ->add('mereProfession', 'text', array(
                    'required'  =>  false
                ))
                ->add('mereTel', 'text', array(
                    'required'  =>  false
                ))
                ->add('typeIns', 'text')
                ->add('dateIns', 'text', array(
                    'required'  =>  true
                ))
                ->add('fraisIns', 'number', array(
                    'required'  =>  true
                ))
                ->add('cartePai', 'number', array(
                    'required'  =>  false
                ))
                ->add('bulletin', 'number', array(
                    'required'  =>  false
                ))
                ->add('extraitNai', 'text', array(
                    'required'  =>  'false'
                ))
                ->add('livretSco', 'text', array(
                    'required'  =>  false
                ))
                ->add('attestationNiv', 'text', array(
                    'required'  =>  false
                ))
                ->add('nbPhoto', 'integer', array(
                    'required'  =>  false
                ))
                ->add('numPai', 'hidden')
                ->add('octobre', 'text', array(
                        'required'  =>  FALSE
                ))
                ->add('montantOct', 'number', array(
                    'required'  =>  false
                ))
                ->add('datePai1', 'text', array(
                    'required'  =>  false
                ))
                ->add('mai', 'text', array(
                        'required'  =>  FALSE
                ))
                ->add('montantMai', 'number', array(
                    'required'  =>  false
                ))
                ->add('datePai8', 'text', array(
                    'required'  =>  false
                ))
                ->add('juin', 'text', array(
                    'required'  =>  FALSE
                ))
                ->add('montantJuin', 'number', array(
                    'required'  =>  false
                ))
                ->add('datePai9', 'text', array(
                    'required'  =>  false
                ))
                ->add('numAnnee', 'hidden')
                ->add('nomAnnee', 'text', array(
                    'required'  =>  true
                ))
                ->add('numAppre', 'hidden')
                ->add('nomAppre', 'text')
                ->add('remarque', 'text', array(
                    'required'  =>  false
                ));
    }
    public function getName() 
    {
        return 'Formulaire_suppression_eleve';
    }
}
