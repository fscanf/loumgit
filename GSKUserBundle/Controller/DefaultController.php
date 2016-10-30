<?php

namespace GSKUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GSKUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
