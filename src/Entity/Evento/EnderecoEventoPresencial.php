<?php

namespace App\Entity\Evento;

use App\Repository\EnderecoEventoPresencialRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnderecoEventoPresencialRepository::class)]
class EnderecoEventoPresencial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column]
    private string $nomeDoLocal;
    #[ORM\Column]
    private string $cep;
    #[ORM\Column]
    private string $rua;

    #[ORM\Column]
    private string $complemento;
    #[ORM\Column]
    private string $bairro;

    #[ORM\Column]
    private string $cidade;

    #[ORM\Column]
    private string $estado;

    /**
     * @param string $nomeDoLocal
     * @param string $cep
     * @param string $rua
     * @param string $complemento
     * @param string $bairro
     * @param string $cidade
     * @param string $estado
     */
    public function __construct(string $nomeDoLocal, string $cep, string $rua, string $complemento, string $bairro, string $cidade, string $estado)
    {
        $this->nomeDoLocal = $nomeDoLocal;
        $this->cep = $cep;
        $this->rua = $rua;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    /**
     * @return string
     */
    public function getNomeDoLocal(): string
    {
        return $this->nomeDoLocal;
    }

    /**
     * @param string $nomeDoLocal
     */
    public function setNomeDoLocal(string $nomeDoLocal): void
    {
        $this->nomeDoLocal = $nomeDoLocal;
    }

    /**
     * @return string
     */
    public function getCep(): string
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     */
    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    /**
     * @return string
     */
    public function getRua(): string
    {
        return $this->rua;
    }

    /**
     * @param string $rua
     */
    public function setRua(string $rua): void
    {
        $this->rua = $rua;
    }

    /**
     * @return string
     */
    public function getComplemento(): string
    {
        return $this->complemento;
    }

    /**
     * @param string $complemento
     */
    public function setComplemento(string $complemento): void
    {
        $this->complemento = $complemento;
    }

    /**
     * @return string
     */
    public function getBairro(): string
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     */
    public function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }

    /**
     * @return string
     */
    public function getCidade(): string
    {
        return $this->cidade;
    }

    /**
     * @param string $cidade
     */
    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    /**
     * @return string
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
