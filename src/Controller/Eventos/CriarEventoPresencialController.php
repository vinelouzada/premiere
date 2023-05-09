<?php

namespace App\Controller\Eventos;

use App\DTO\FormCriadorDeEventoPresencialInput;
use App\Entity\Evento\EnderecoEventoPresencial;
use App\Entity\Evento\EventoPresencial;
use App\Enum\TipoIngresso;
use App\Enum\Visibilidade;
use App\Form\EventoPresencialType;
use App\Repository\EventoPresencialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CriarEventoPresencialController extends AbstractController
{
    private EventoPresencialRepository $eventoPresencialRepository;

    public function __construct(EventoPresencialRepository $eventoPresencialRepository)
    {
        $this->eventoPresencialRepository = $eventoPresencialRepository;
    }

    #[Route('/criar-evento', name: 'app_criar_eventos',methods: ['GET'])]
    public function index(): Response
    {
        $formulario = $this->createForm(
            EventoPresencialType::class,
            new FormCriadorDeEventoPresencialInput()
        );

        return $this->renderForm("criar_eventos/index.html.twig", compact('formulario'));
    }
    #[Route('/criar-evento', methods: ['POST'])]
    public function criarEventoFormulario(Request $request): Response
    {
        $formulario = $this->createForm(
            EventoPresencialType::class,
            new FormCriadorDeEventoPresencialInput()
        )->handleRequest($request);

        $this->eventoPresencialRepository->save($formulario->getData(),true);


        return new RedirectResponse('/criar-usuario');
    }


}
