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
        $alt1 = number_format($alt/100, 2);
        $imc = $peso/($alt1 * $alt1);
        $imc_formated = number_format($imc, 2);

        $this->addFlash(
            'sucess',
            'Este é o seu IMC! YAY!'
        );

        return $this->render('imc/imc.html.twig', [
            'imc' => $imc_formated,
            'alt' => $alt1,
            'peso' => $peso
        ]);
    }

}