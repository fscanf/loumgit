<?php

namespace djama\DjamaBundle\Form\UploadFile;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of ValideForm
 *
 * @author Djama
 */
class ValideForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {

    }
    public function getName() {
        return 'sauvegarde_donnees';
    }
}
