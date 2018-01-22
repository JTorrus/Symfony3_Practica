<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MainController extends Controller
{
    /**
     * @Route("/inici")
     */
    public function iniciAction()
    {
        return $this->render('AppBundle:Main:inici.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/buscar")
     */
    public function buscarAction()
    {
        return $this->render('AppBundle:Main:buscar.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/detallsEquip")
     */
    public function detallsEquipAction()
    {
        return $this->render('AppBundle:Main:detalls_equip.html.twig', array(
            // ...
        ));
    }

}
