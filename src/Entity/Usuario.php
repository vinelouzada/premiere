<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;
    #[ORM\Column]
    #[Assert\Length(min: 5)]
    private string $nomeCompleto;

    #[ORM\Column]
    #[Assert\NotBlank]
    private string $email;

    #[ORM\Column]
    #[Assert\NotBlank]
    private string $senha;

    public function __construct(
        string $nomeCompleto,
        string $email,
        string $senha)
    {
        $this->nomeCompleto = $nomeCompleto;
        $this->email = $email;
        $this->senha = $senha;
    }


    public function getNomeCompleto(): string
    {
        return $this->nomeCompleto;
    }


    public function setNomeCompleto(string $nomeCompleto): void
    {
        $this->nomeCompleto = $nomeCompleto;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function getSenha(): string
    {
        return $this->senha;
    }


    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }


    public function getId(): int
    {
        return $this->id;
    }
}
