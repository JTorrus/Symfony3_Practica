<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ChampionsController extends Controller
{
    /**
     * @Route("champions/llistarTemp")
     */
    public function llistarTempAction()
    {
        $repository = $this->getDoctrine()->getRepository(Partit::class);
        $query = $repository->createQueryBuilder('query')
            ->where("query.competicio LIKE 'Champions'")
            ->groupBy("query.temporada")
            ->getQuery();

        $partits = $query->getResult();
        return $this->render('AppBundle:Champions:llistar_temp.html.twig', array(
            'partits' => $partits
        ));
    }

    /**
     * @Route("champions/llistarPartits/{temp}")
     */
    public function llistarPartitsAction($temp)
    {
        $repository = $this->getDoctrine()->getRepository(Partit::class);
        $query = $repository->createQueryBuilder('query')
            ->where("query.competicio LIKE 'Champions'")
            ->andWhere("query.temporada LIKE '".$temp."'")
            ->getQuery();

        $partits = $query->getResult();
        return $this->render('AppBundle:Champions:llistar_partits.html.twig', array(
            'temp' => $temp, 'partits' => $partits
        ));
    }

}
