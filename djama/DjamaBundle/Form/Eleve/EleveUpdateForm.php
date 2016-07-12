<?php

namespace djama\DjamaBundle\Form\Eleve;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of EleveForm
 *
 * @author Djama
 */
class EleveUpdateForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder
                ->add('numPhoto', 'hidden')
                ->add('placePhoto', 'hidden', array(
                    'required'  =>  FALSE
                )) 
                ->add('numEleve', 'hidden')
                ->add('sexe', 'choice', array(
                 'empty_value'    =>  'Choisissez un sexe svp!',
                    'required'      =>  'true',
                    'choices'   =>  array(
                        'M'   =>  'Masculin',
                        'F'   =>  'Feminin'
                    )   
                ))
                ->add('nom', 'text', array(
                    'required'  =>  true
                ))
                ->add('prenom', 'text', array(
                    'required'  =>  true
                ))
                ->add('dateN', 'text')
                ->add('numTel', 'text', array(
                    'required'  =>  false,
                    'max_length'=>  12
                ))
                ->add('adrElev', 'text', array(
                    'required'  =>  false
                ))
                ->add('numCom', 'hidden')
                ->add('nomCom', 'entity', array(
                    'empty_value'   =>  'Choisissez une commune svp!',
                    'class'         =>  'djamaDjamaBundle:CommuneEntity',
                    'property'      =>  'nomCom',
                    'required'      =>  true,
                ))
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
                    'required'  =>  false,
                    'max_length'=>  12
                ))
                ->add('mere', 'text', array(
                    'required'  =>  true
                ))
                ->add('mereProfession', 'text', array(
                    'required'  =>  false
                ))
                ->add('mereTel', 'text', array(
                    'required'  =>  false,
                    'max_length'=>  12
                ))
                ->add('typeIns', 'choice', array(
                    'empty_value'   =>  'Choisissez le type d\'inscription svp!',
                    'required'  =>  true, 
                    'choices'   =>  array(
                        'Inscription'   =>  'Inscription',
                        'Reinscription' =>  'Reinscription'
                    )
                ))
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
                    'required'  =>  false
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
                ->add('octobre', 'choice', array(
                    'required'  =>  false,
                    'choices'   =>  array(
                    'Oui'       =>  'Oui',
                    'Non'       =>  'Non'
                   )
                ))
                ->add('montantOct', 'number', array(
                    'required'  =>  false
                ))
                ->add('datePai1', 'text', array(
                    'required'  =>  false
                ))
                ->add('mai', 'choice', array(
                    'required'  =>  false,
                    'choices'   =>  array(
                    'Oui'       =>  'Oui',
                    'Non'       =>  'Non'
                    )
                ))
                ->add('montantMai', 'number', array(
                    'required'  =>  false
                ))
                ->add('datePai8', 'text', array(
                    'required'  =>  false
                ))
                ->add('juin', 'choice', array(
                    'required'  =>  false,
                    'choices'   =>  array(
                    'Oui'       =>  'Oui',
                    'Non'       =>  'Non'
                   )
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
                ->add('nomAppre', 'entity', array(
                    'empty_value'   =>  'Choisissez une appréciation svp!',
                    'class'         =>  'djamaDjamaBundle:AppreciationEntity',
                    'property'      =>  'nomAppre',
                    'required'      =>  true,
                ))
                ->add('remarque', 'text', array(
                    'required'  =>  false
                ));
    }
    public function getName()
    {
        return 'Formulaire_Eleve';
    }
}
