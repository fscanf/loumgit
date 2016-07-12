<?php

namespace djama\DjamaBundle\Form\Classe;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * Description of ClasseForm
 *
 * @author Djama
 */
class ClasseForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);
        $builder
                ->add('codeClasse', 'text')
                ->add('nomClasse',  'text')
                ->add('effectifs',  'integer');
    }

    public function getName() 
    {
        return 'Formulaire_classe_modif';
    }
}
