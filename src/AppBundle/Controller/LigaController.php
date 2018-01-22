<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LigaController extends Controller
{
    /**
     * @Route("liga/llistarTemp")
     */
    public function llistarTempAction()
    {
        return $this->render('AppBundle:Liga:llistar_temp.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("liga/llistarPartits")
     */
    public function llistarPartitsAction()
    {
        return $this->render('AppBundle:Liga:llistar_partits.html.twig', array(
            // ...
        ));
    }

}
