<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ImcController extends AbstractController
{
    /**
     * @Route("/imc/{alt}/{peso}", name="app_imc")
     */
    public function imc($alt, $peso): Response
    {
        $alt1 = $alt/100;
        $imc = $peso/($alt1 * $alt1);

        $this->addFlash(
            'sucess',
            'Este é o seu IMC! YAY!'
        );

        return $this->render('imc/imc.html.twig', [
            'imc' => $imc,
            'alt' => $alt1,
            'peso' => $peso
        ]);
    }

}