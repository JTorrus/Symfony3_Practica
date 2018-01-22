<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Partit;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class CrearPartitController extends Controller
{
    /**
     * @Route("creacio/partit")
     */
    public function crearPartit(Request $request)
    {
        $partit = new Partit();

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository("AppBundle:Equip");
        $equips = $repository->findAll();

        $form = $this->createFormBuilder()
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
            ->add("temporada", TextType::class)
            ->add('search', SubmitType::class, array('label' => 'Crear', 'attr' => array('class' => 'btn btn-success')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $equip = $form->get('nomEquip')->getData();
            return $this->redirectToRoute('app_main_detallsequip', array('id' => $equip->getId()));
        }
        return $this->render('AppBundle:CrearPartit:crear.html.twig', array(
            'form' => $form->createView()
        ));
    }
}