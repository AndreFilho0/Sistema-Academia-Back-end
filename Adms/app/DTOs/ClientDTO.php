<?php

namespace App\DTOs;



class ClientDTO extends AbstractDTO
{
    public readonly string $name;
    public readonly ?string $idade;
    public readonly ?string $peso;
    public readonly ?string $altura;
    public readonly string $nome;
    public readonly string $segundaFeira;
    public readonly string $tercaFeira;
    public readonly string $quartaFeira;
    public readonly string $quintaFeira;
    public readonly string $sextaFeira;
    public readonly string $sabado;
    public readonly string $domingo;
    public readonly string $email;

    public function __construct(
        string $name,
        ?string $idade,
        ?string $peso,
        ?string $altura,
        string $nome,
        ?string $segundaFeira,
        ?string $tercaFeira,
        ?string $quartaFeira,
        ?string $quintaFeira,
        ?string $sextaFeira,
        ?string $sabado,
        ?string $domingo,
        string $email
    ) {
        $this->name = $name;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->altura = $altura;
        $this->nome = $nome;
        $this->segundaFeira = $segundaFeira ?? " ";
        $this->tercaFeira = $tercaFeira ?? " ";
        $this->quartaFeira = $quartaFeira ?? " ";
        $this->quintaFeira = $quintaFeira ?? " ";
        $this->sextaFeira = $sextaFeira ?? " ";
        $this->sabado = $sabado ?? " ";
        $this->domingo = $domingo ?? " ";
        $this->email = $email;
    }
}