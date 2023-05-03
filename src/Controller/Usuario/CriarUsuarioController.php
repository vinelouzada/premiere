<?php

namespace App\Controller\Usuario;

use App\Entity\Usuario;
use App\Form\UsuarioType;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CriarUsuarioController extends AbstractController
{
    private UsuarioRepository $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    #[Route('/criar-usuario', name: 'app_criar_usuario', methods: ['GET'])]
    public function index(): Response
    {
        $formulario = $this->createForm(
            UsuarioType::class,
            new Usuario('','','')
        );

        return $this->renderForm('criar_usuario/index.html.twig', compact("formulario"));
    }

    #[Route("/criar-usuario", methods: ['POST'])]
    public function criarUsuario(Request $request):Response
    {
        $formulario = $this->createForm(
            UsuarioType::class,
            new Usuario('', '', '')
        )->handleRequest($request);

        if (!$formulario->isValid()){
            return $this->renderForm('criar_usuario/index.html.twig', compact("formulario"));
        }

        $this->usuarioRepository->save($formulario->getData(),true);

        return new RedirectResponse("/criar-evento");
    }
}
