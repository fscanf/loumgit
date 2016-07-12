<?php

namespace djama\DjamaBundle\Form\ChoixMultiple;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
/**
 * Description of ChoixMultipleForm
 *
 * @author Djama
 */
class ChoixMultipleForm extends AbstractType
{
    
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder
                ->add('choix_classe', 'entity', array(
                        'empty_value'   =>  'Choisissez une classe svp!',
                        'class' => 'djamaDjamaBundle:ClasseEntity',
                        'property'  =>  'codeClasse',
                        'required'  =>  'true',
                    
                ));
                    
                    
              /*     'empty_value'    =>  'Choisissez une option svp!',
                    'required'      =>  'false',
                    'choices'   =>  array(
                        'id1'   =>  'aaa',
                        'id2'   =>  'bbb'
                    )
                ));*/
    }
    public function getName() 
    {
        return 'Formulaire_choix_multiple';
    }
}
