<?php

namespace App\Http\Controllers;

use App\Helpers\ApiClient;

class ClientController{
    private $apiClient;

    public function __construct(ApiClient $apiClient )
    {
         $this->apiClient = new $apiClient;        
    }

    public function getAllClientInformation(){

        $dados = $this->apiClient->getAllClientInformation();

        dd($dados);
      


    }
}