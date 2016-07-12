<?php

namespace djama\DjamaBundle\Form\Eleve;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of EleveForm
 *
 * @author Djama
 */
class EleveInscriptionForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder
                ->add('photo', 'file', array(
                    'required'  =>  false
                ))
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
                ->add('numClasse', 'hidden')
                ->add('codeClasse', 'entity', array(
                    'empty_value'   =>  'Choisissez une classe svp!',
                    'class'         =>  'djamaDjamaBundle:ClasseEntity',
                    'property'      =>  'codeClasse',
                    'required'       =>  true
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
                ->add('badge',  'number', array(
                    'required'  =>  false
                ))
                ->add('bulletin', 'number', array(
                    'required'  =>  false
                ))
                ->add('extraitNai', 'choice', array(
                    'empty_value'   =>  'Choisissez une valeur svp!',
                    'required'      =>  'false',
                    'choices'       =>  array(
                        'Oui'       =>  'Oui',
                        'Non'       =>  'Non',
                    )
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
                ->add('nomAnnee', 'entity', array(
                    'empty_value'   =>  'Choisissez une année svp!',
                    'class'         =>  'djamaDjamaBundle:AnneeScolaireEntity',
                    'property'      =>  'nomAnnee',
                    'required'      =>  true,
                ))
                ->add('numAppre', 'hidden')
                ->add('nomAppre', 'entity', array(
                    'empty_value'   =>  'Choisissez une appréciation svp!',
                    'class'         =>  'djamaDjamaBundle:AppreciationEntity',
                    'property'      =>  'nomAppre',
                    'required'      =>  false,
                ))
                ->add('remarque', 'textarea', array(
                    'required'      =>  false,
                    //'label'         => 'Nome' , 
                    'max_length'    => 2000
                ));
    }
    public function getName()
    {
        return 'Form_inscription_eleve';
    }
}
