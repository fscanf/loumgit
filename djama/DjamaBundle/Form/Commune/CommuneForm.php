<?php

namespace djama\DjamaBundle\Form\Commune;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * Description of CommuneForm
 *
 * @author Djama
 */
class CommuneForm extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder
                ->add('nomCom', 'text', array(
                    'required' => false
                ));
    }

    public function getName() 
    {
        return 'Formulaire_Modif_Commune';
    }
}
