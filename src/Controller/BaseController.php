<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use app\form\AjoutReparationType;
use symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Reparation;

final class BaseController extends AbstractController
{
    #[Route('/', name: 'app_acceuil')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig',[]);
    }

    #[Route('reparation',name:'app_reparation')]
    public function reparation(Request $request): Reponse
    {
        $reparation= new Reparation();
        $form=$this->createForm(AjouterReparationType::class);

        if ($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $reparation->setDateDepot(new \DateTimeImmutable());
                $em->persist($reparation);
                $em->flush();
                $this->addFlash('notice','Demande envoyée');
                return $this->redirectToRoute('app_reparation');
            }
        }
        return $this->render('base/reparation.html.twig',['formReparation'=>$form->creativeView(),]);
    }

}
