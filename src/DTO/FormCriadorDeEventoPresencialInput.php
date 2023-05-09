<?php

namespace App\DTO;

class FormCriadorDeEventoPresencialInput
{
    public function __construct(
        public string $nomeDoLocal = '',
        public string $cep = '',
        public string $rua = '',
        public string $complemento = '',
        public string $bairro = '',
        public string $cidade = '',
        public string $estado = '',
        public string $nome = '',
        public string $imagemDeDivulgacao = '',
        public string $descricao = '',
        public \DateTime $dataEHoraInicio = new \DateTime('now'),
        public \DateTime $dataEHoraFim =  new \DateTime('now'),
        public string $tipoIngresso = '',
        public string $visibilidade = '',
    ){}


}