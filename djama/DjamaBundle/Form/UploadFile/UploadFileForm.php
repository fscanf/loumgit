<?php

namespace djama\DjamaBundle\Form\UploadFile;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UploadFileForm extends AbstractType
{
    public function buildForm(
            FormBuilderInterface $builder, array $options) 
    {
        $builder
            ->add('fichier', 'file', array(
                'required'  =>  true
            ))
            ->add('num_classeur', 'integer', array(
                'required'  =>  false
            ))
            ->add('tous_les_classeurs', 'checkbox', array(
                'required'  =>  false
            ))

            // PARTIE I MATERNNELLE
            ->add('maternelle_p', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('maternelle_m', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('maternelle_g', 'checkbox', array( 
               'required'  =>  false
            ))
            ->add('maternelle_pmg', 'checkbox', array(
                'required'  =>  false
            ))
            // PARTIE II PRIMAIRE
            ->add('premier_a', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('deuxieme_a', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('troisieme_a', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('quatrieme_a', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('cinquieme_a', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('sixieme_a', 'checkbox', array(
                'required'  =>  false
            ))
             ->add('primaire', 'checkbox', array(
                'required'  =>  false
            ))
            // PARTIE III COLLEGE
            ->add('septieme_a', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('huitieme_a', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('neufvieme_a', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('dixieme_a', 'checkbox', array(
                'required'  =>  false
            ))
             ->add('college', 'checkbox', array(
                'required'  =>  false
            ))
            // PARTIE IV LYCEE
            ->add('onsieme_a', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('dousieme_a', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('terminale_a', 'checkbox', array(
                'required'  =>  false
            ))
             ->add('lycee', 'checkbox', array(
                'required'  =>  false
            ))
            // PARTIE V
            ->add('notes', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('type_note', 'choice', array(
                'choices'   => array(
                    'premier_t'     => 'Trimestre 1',
                    'deuxieme_t'    => 'Trimestre 2',
                    'troisieme_t'   =>  'Trimestre 3'
                ),
                'required'  =>  false
            ))
            // PARTIE VI
            ->add('communes', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('classes', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('matieres', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('appreciation', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('direction', 'checkbox', array(
                'required'  =>  false
            ))
            ->add('personnels', 'checkbox', array(
                'required'  =>  false
            ));
    }
    public function getName() {
        return 'formulaire_fichier';
    }
}