<?php

namespace App\Entity;

use App\Repository\EventoPresencialRepository;
use Doctrine\Common\Annotations\Annotation\Enum;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventoPresencialRepository::class)]
class EventoPresencial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private string $nome;

    #[ORM\Column]
    private string $imagemDeDivulgacao;

    #[ORM\Column]
    private string $descricao;
    #[ORM\Column]
    private \DateTime $dataEHoraInicio;
    #[ORM\Column]
    private \DateTime $dataEHoraFim;
    #[ORM\Column(options: ["default" => "Gratuito", "columnDefinition" => "ENUM('Gratuito','Pago')"])]
    private string $tipoIngresso;

    #[ORM\Column(options: ["default" => "Público", "columnDefinition" => "ENUM('Público','Privado')"])]
    private string $visibilidade;

    /**
     * @param string $nome
     * @param string $imagemDeDivulgacao
     * @param string $descricao
     * @param \DateTime $dataEHoraInicio
     * @param \DateTime $dataEHoraFim
     * @param Enum $tipoIngresso
     * @param Enum $visibilidade
     */
    public function __construct(string    $nome,
                                string    $imagemDeDivulgacao,
                                string    $descricao,
                                \DateTime $dataEHoraInicio,
                                \DateTime $dataEHoraFim,
                                Enum      $tipoIngresso,
                                Enum      $visibilidade)
    {
        $this->nome = $nome;
        $this->imagemDeDivulgacao = $imagemDeDivulgacao;
        $this->descricao = $descricao;
        $this->dataEHoraInicio = $dataEHoraInicio;
        $this->dataEHoraFim = $dataEHoraFim;
        $this->tipoIngresso = $tipoIngresso;
        $this->visibilidade = $visibilidade;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getImagemDeDivulgacao(): string
    {
        return $this->imagemDeDivulgacao;
    }

    public function setImagemDeDivulgacao(string $imagemDeDivulgacao): void
    {
        $this->imagemDeDivulgacao = $imagemDeDivulgacao;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getDataEHoraInicio(): \DateTime
    {
        return $this->dataEHoraInicio;
    }

    public function setDataEHoraInicio(\DateTime $dataEHoraInicio): void
    {
        $this->dataEHoraInicio = $dataEHoraInicio;
    }

    public function getDataEHoraFim(): \DateTime
    {
        return $this->dataEHoraFim;
    }

    public function setDataEHoraFim(\DateTime $dataEHoraFim): void
    {
        $this->dataEHoraFim = $dataEHoraFim;
    }

    public function getTipoIngresso(): Enum
    {
        return $this->tipoIngresso;
    }

    public function setTipoIngresso(Enum $tipoIngresso): void
    {
        $this->tipoIngresso = $tipoIngresso;
    }

    public function getVisibilidade(): Enum
    {
        return $this->visibilidade;
    }

    public function setVisibilidade(Enum $visibilidade): void
    {
        $this->visibilidade = $visibilidade;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
