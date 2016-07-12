<?php

namespace djama\DjamaBundle\Form\Photo;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * Description of UploadPhotoFrom
 *
 * @author Djama
 */
class PhotoFrom extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->
                add('photo', 'file', array(
                    'required'  =>  false
                ));
    }
    public  function getName() {
        return 'formulaire_photo';
    }
}
