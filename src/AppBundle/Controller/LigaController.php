<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LigaController extends Controller
{
    /**
     * @Route("liga/llistarTemp")
     */
    public function llistarTempAction()
    {
        $repository = $this->getDoctrine()->getRepository(Partit::class);
        $query = $repository->createQueryBuilder('query')
            ->where("query.competicio LIKE 'Liga'")
            ->groupBy("query.temporada")
            ->getQuery();

        $partits = $query->getResult();
        return $this->render('AppBundle:Liga:llistar_temp.html.twig', array(
            'partits' => $partits
        ));
    }

    /**
     * @Route("liga/llistarPartits/{temp}")
     */
    public function llistarPartitsAction($temp)
    {
        $repository = $this->getDoctrine()->getRepository(Partit::class);
        $query = $repository->createQueryBuilder('query')
            ->where("query.competicio LIKE 'Liga'")
            ->andWhere("query.temporada LIKE '".$temp."'")
            ->getQuery();

        $partits = $query->getResult();
        return $this->render('AppBundle:Liga:llistar_partits.html.twig', array(
            'temp' => $temp, 'partits' => $partits
        ));
    }

}
