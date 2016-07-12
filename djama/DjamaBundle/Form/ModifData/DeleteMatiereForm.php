<?php

namespace djama\DjamaBundle\Form\ModifData;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * Description of DeleteMatiereForm
 *
 * @author Djama
 */
class DeleteMatiereForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder
                ->add('numMat', 'checkbox', array(
                    'required'  =>  false
                ));
    }
    public  function getName() 
    {
        return 'Formulaire_suppression';
    }
}
