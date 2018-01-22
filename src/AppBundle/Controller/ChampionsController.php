<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ChampionsController extends Controller
{
    /**
     * @Route("champions/llistarTemp")
     */
    public function llistarTempAction()
    {
        return $this->render('AppBundle:Champions:llistar_temp.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("champions/llistarPartits")
     */
    public function llistarPartitsAction()
    {
        return $this->render('AppBundle:Champions:llistar_partits.html.twig', array(
            // ...
        ));
    }

}
