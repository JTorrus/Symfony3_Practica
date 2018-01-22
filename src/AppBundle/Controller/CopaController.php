<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CopaController extends Controller
{
    /**
     * @Route("copa/llistarTemp")
     */
    public function llistarTempAction()
    {
        return $this->render('AppBundle:Copa:llistar_temp.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("copa/llistarPartits")
     */
    public function llistarPartitsAction()
    {
        return $this->render('AppBundle:Copa:llistar_partits.html.twig', array(
            // ...
        ));
    }

}
