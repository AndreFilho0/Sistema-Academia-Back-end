<?php

namespace App\DTOs;

class TabelaTreinoDTO{
    public $segundaFeira;
    public $tercaFeira;
    public $quartaFeira;
    public $quintaFeira;
    public $sextaFeira;
    public $sabado;
    public $domingo;

    public function __construct(
         $segundaFeira,
         $tercaFeira,
         $quartaFeira,
         $quintaFeira,
         $sextaFeira,
         $sabado,
         $domingo
    ) {
        $this->segundaFeira = $segundaFeira;
        $this->tercaFeira = $tercaFeira;
        $this->quartaFeira = $quartaFeira;
        $this->quintaFeira = $quintaFeira;
        $this->sextaFeira = $sextaFeira;
        $this->sabado = $sabado;
        $this->domingo = $domingo;
    }


}