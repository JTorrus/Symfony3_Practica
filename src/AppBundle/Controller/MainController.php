<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/")
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
    public function buscarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository("AppBundle:Equip");
        $equips = $repository->findAll();

        $form = $this->createFormBuilder()
            ->add('nomEquip', ChoiceType::class,array(
                'choices' => $equips,
                'choice_label' => 'nomEquip'
            ))
            ->add('search', SubmitType::class, array('label' => 'Veure', 'attr' => array('class' => 'btn btn-success')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $equip = $form->get('nomEquip')->getData();
            return $this->redirectToRoute('app_main_detallsequip', array('id' => $equip->getId()));
        }
        return $this->render('AppBundle:Main:buscar.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/detallsEquip/{id}")
     */
    public function detallsEquipAction($id)
    {
        $equip = $this->getDoctrine()->getRepository('AppBundle:Equip')->find($id);
        $jugadors = $equip->getJugadors();

        $partitslocal = $equip->getPartitsLocal();
        $partitsvisitant = $equip->getPartitsVisitant();

        return $this->render('AppBundle:Main:detalls_equip.html.twig', array(
            'equip' => $equip, 'jugadors' => $jugadors, 'partitsLocal' => $partitslocal, 'partitsVisitant' => $partitsvisitant
        ));
    }

}
