<?php

namespace djama\DjamaBundle\Form\ReglePaiement;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * Description of ReglePaiementForm
 *
 * @author Djama
 */
class ReglePaiementForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        parent::buildForm($builder, $options);
        $builder
                ->add('numReglePai', 'hidden')
                ->add('nomReglePai', 'text', array(
                    'required'      =>  true,
                    'max_length'    =>  1000
                ))
                ->add('periodeDebut', 'choice', array(
                    'required'  =>  true,
                    'choices'   =>  array(
                        'octobre'   =>  'Octobre',
                        'novembre'  =>  'Novembre',
                        'decembre'  =>  'Décembre',
                        'janvier'   =>  'Janvier',
                        'fevrier'   =>  'Février',
                        'mars'      =>  'Mars',
                        'avril'     =>  'Avril',
                        'mai'       =>  'Mai',
                        'juin'      =>  'Juin'
                    )
                ))
                ->add('periodeFin', 'choice', array(
                    'required'  =>  true,
                    'choices'   =>  array(
                        'octobre'   =>  'Octobre',
                        'novembre'  =>  'Novembre',
                        'decembre'  =>  'Décembre',
                        'janvier'   =>  'Janvier',
                        'fevrier'   =>  'Février',
                        'mars'      =>  'Mars',
                        'avril'     =>  'Avril',
                        'mai'       =>  'Mai',
                        'juin'      =>  'Juin'
                    )
                ));
    }
    public function getName() 
    {
        return 'Form_regle_paiement';
    }
}
