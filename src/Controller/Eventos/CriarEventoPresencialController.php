<?php

namespace App\Controller\Eventos;

use App\Form\EventoPresencialType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CriarEventoPresencialController extends AbstractController
{
    #[Route('/criar-evento', name: 'app_criar_eventos',methods: ['GET'])]
    public function index(): Response
    {
        $formulario = $this->createForm(
            EventoPresencialType::class,
        );
        return $this->render('criar_eventos/index.html.twig', [
            'controller_name' => 'CriarEventoPresencialController',
        ]);
    }
    #[Route('/criar-evento', methods: ['POST'])]
    public function criarEventoFormulario(): Response
    {

    }


}
