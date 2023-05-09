<?php

namespace App\Entity\Evento;

use App\Enum\TipoIngresso;
use App\Enum\Visibilidade;
use App\Repository\EventoPresencialRepository;
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

    #[ORM\OneToOne(targetEntity: EnderecoEventoPresencial::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: "endereco_id", referencedColumnName: "id", nullable: false)]
    private EnderecoEventoPresencial $endereco;

    /**
     * @param string $nome
     * @param string $imagemDeDivulgacao
     * @param string $descricao
     * @param \DateTime $dataEHoraInicio
     * @param \DateTime $dataEHoraFim
     * @param string $tipoIngresso
     * @param string $visibilidade
     */
    public function __construct(string    $nome,
                                string    $imagemDeDivulgacao,
                                string    $descricao,
                                \DateTime $dataEHoraInicio,
                                \DateTime $dataEHoraFim,
                                string      $tipoIngresso,
                                string      $visibilidade,
                                EnderecoEventoPresencial $endereco
    )
    {
        $this->nome = $nome;
        $this->imagemDeDivulgacao = $imagemDeDivulgacao;
        $this->descricao = $descricao;
        $this->dataEHoraInicio = $dataEHoraInicio;
        $this->dataEHoraFim = $dataEHoraFim;
        $this->tipoIngresso = $tipoIngresso;
        $this->visibilidade = $visibilidade;
        $this->endereco = $endereco;
    }

    public function adicionarEndereco(EnderecoEventoPresencial $endereco)
    {
        $this->endereco = $endereco;
    }

    public function getEndereco()
    {
        return $this->endereco;
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

    public function getTipoIngresso(): string
    {
        return $this->tipoIngresso;
    }

    public function setTipoIngresso(string $tipoIngresso): void
    {
        $this->tipoIngresso = $tipoIngresso;
    }

    public function getVisibilidade(): string
    {
        return $this->visibilidade;
    }

    public function setVisibilidade(string $visibilidade): void
    {
        $this->visibilidade = $visibilidade;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
