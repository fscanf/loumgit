<?php

namespace GSKUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GSKUserBundle extends Bundle {

    public function getParent() {
        // a utiliser pour ameliorer la partie securite
        //return 'FOSUserBundle';
    }

}
