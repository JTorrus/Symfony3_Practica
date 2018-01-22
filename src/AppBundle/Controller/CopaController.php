<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CopaController extends Controller
{
    /**
     * @Route("copa/llistarTemp")
     */
    public function llistarTempAction()
    {
        $repository = $this->getDoctrine()->getRepository(Partit::class);
        $query = $repository->createQueryBuilder('query')
            ->where("query.competicio LIKE 'Copa'")
            ->groupBy("query.temporada")
            ->getQuery();

        $partits = $query->getResult();
        return $this->render('AppBundle:Copa:llistar_temp.html.twig', array(
            'partits' => $partits
        ));
    }

    /**
     * @Route("copa/llistarPartits/{temp}")
     */
    public function llistarPartitsAction($temp)
    {
        $repository = $this->getDoctrine()->getRepository(Partit::class);
        $query = $repository->createQueryBuilder('query')
            ->where("query.competicio LIKE 'Copa'")
            ->andWhere("query.temporada LIKE '".$temp."'")
            ->getQuery();

        $partits = $query->getResult();
        return $this->render('AppBundle:Copa:llistar_partits.html.twig', array(
            'temp' => $temp, 'partits' => $partits
        ));
    }

}
