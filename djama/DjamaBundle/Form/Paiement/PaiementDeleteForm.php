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
                ->add('numPhoto', 'hidden')
                ->add('sexe', 'hidden')
                ->add('nom',    'hidden')
                ->add('prenom', 'hidden')
                ->add('montantMens', 'hidden')
                ->add('montantAnn', 'hidden')
                ->add('totalPai', 'hidden')
                ->add('datePai1', 'hidden')
                ->add('octobre', 'hidden')
                ->add('montantOct', 'hidden')
                ->add('datePai2', 'hidden')
                ->add('novembre',   'hidden')
                ->add('montantNov', 'hidden')
                ->add('datePai3', 'hidden')
                ->add('decembre', 'hidden')
                ->add('montantDec', 'hidden')
                ->add('datePai4', 'hidden')
                ->add('janvier', 'hidden')
                ->add('montantJan', 'hidden')
                ->add('datePai5', 'hidden')
                ->add('fevrier', 'hidden')
                ->add('montantFev', 'hidden')
                ->add('datePai6', 'hidden')
                ->add('mars', 'hidden')
                ->add('montantMars', 'hidden')
                ->add('datePai7', 'hidden')
                ->add('avril', 'hidden')
                ->add('montantAv', 'hidden')
                ->add('datePai8', 'hidden')
                ->add('mai', 'hidden')
                ->add('montantMai', 'hidden')
                ->add('datePai9', 'hidden')
                ->add('juin', 'hidden')
                ->add('montantJuin', 'hidden')
                ->add('numAppre', 'hidden')
                ->add('nomAppre',   'hidden')
                ->add('commentaire', 'hidden')
                ->add('Supprimer', 'submit')
                ->add('Annuller', 'submit')
               ;
    }
    public function getName() 
    {
        return 'Form_delete_paiement';
    }
}
