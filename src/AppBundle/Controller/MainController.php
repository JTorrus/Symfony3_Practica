<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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

    /**
     * @Route("/editarPartit/{id}")
     */
    public function editarPartitAction($id, Request $request) {
        $partit = $this->getDoctrine()->getRepository('AppBundle:Partit')->find($id);

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository("AppBundle:Equip");
        $equips = $repository->findAll();

        $partit->setIDEquipLocal($partit->getIDEquipLocal());
        $partit->setIDequipVisitant($partit->getIDequipVisitant());
        $partit->setTemporada($partit->getTemporada());
        $partit->setGolslocal($partit->getGolslocal());
        $partit->setGolsvisitant($partit->getGolsvisitant());
        $partit->setCompeticio($partit->getCompeticio());

        $form = $this->createFormBuilder($partit)
            ->add('equipLocal', ChoiceType::class,array(
                'choices' => $equips,
                'choice_label' => 'nomEquip'
            ))
            ->add('golslocal', IntegerType::class)
            ->add('equipVisitant', ChoiceType::class,array(
                'choices' => $equips,
                'choice_label' => 'nomEquip'
            ))
            ->add('golsvisitant', IntegerType::class)
            ->add("competicio", ChoiceType::class, array(
                'choices' => array(
                    'Copa' => 'Copa',
                    'Champions' => 'Champions',
                    'Liga' => 'Liga')
            ))
            ->add("temporada", IntegerType::class)
            ->add('search', SubmitType::class, array('label' => 'Editar', 'attr' => array('class' => 'btn btn-success')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $partit = $form->getData();
            $partit->setIDequipLocal($partit->getEquipLocal()->getId());
            $partit->setIDequipVisitant($partit->getEquipVisitant()->getId());

            if ($partit->getIDequipLocal() == $partit->getIDequipVisitant()) {
                echo "Els equips tenen que ser diferents";
            } else if ($partit->getGolslocal() < 0 || $partit->getGolsvisitant() < 0) {
                echo "Els gols no poden ser negatius";
            } else {
                echo "Partit creat correctament";
                $em = $this->getDoctrine()->getManager();
                $em->persist($partit);
                $em->flush();
                return $this->redirectToRoute('app_main_inici');
            }
        }

        return $this->render('AppBundle:Main:editar_partit.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
