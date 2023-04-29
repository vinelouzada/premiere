<?php

namespace App\Controller\Usuario;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        return $this->render('criar_usuario/index.html.twig', [
            'controller_name' => 'CriarUsuarioController',
        ]);
    }

    #[Route("/criar-usuario", methods: ['POST'])]
    public function criarUsuario(Request $request):Response
    {
        $nome = $request->request->get('nome');
        $sobrenome = $request->request->get('sobrenome');
        $nomeCompleto = "$nome $sobrenome";
        $email = $request->request->get('email');
        $senha = $request->request->get('senha');

        $usuario = new Usuario($nomeCompleto,$email,$senha);

        $this->usuarioRepository->save($usuario,true);

        return new RedirectResponse("/criar-evento");
    }
}
