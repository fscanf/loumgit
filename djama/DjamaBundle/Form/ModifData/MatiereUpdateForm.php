<?php

namespace djama\DjamaBundle\Form\ModifData;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * Description of MatiereUpdateForm
 *
 * @author Djama
 */
class MatiereUpdateForm extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        $builder
            ->add('codeMat', 'text', array(
                'required'  =>  false
            ))
            ->add('nomMat', 'text', array(
                'required'  =>  false
            ))
            ->add('coeffMat', 'integer', array(
                'required'  =>  false
            ));
    }
    public function getName() 
    {
        return 'formulaire_modif_matiere';
    }
}
