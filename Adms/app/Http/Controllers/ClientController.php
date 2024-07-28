<?php

namespace App\Http\Controllers;

use App\DTOs\ClientDTO;
use App\Helpers\ApiClient;
use App\Helpers\HttpResponse;
use Exception;

class ClientController{
    private $apiClient;
    use HttpResponse;

    public function __construct(ApiClient $apiClient )
    {
         $this->apiClient = new $apiClient;        
    }

    public function getAllClientInformation(){
      try{

        $informacaoClientes = json_decode($this->apiClient->getAllClientInformation(),true);

        if(empty($informacaoClientes)){
            return $this->falha('nem um cliente encontrado no banco de dados',400,[],4);
        }

        $dadosCompletos=[];
        foreach ($informacaoClientes as $data){
            $clientDTO = new ClientDTO(
                $data["name"],
                $data["idade"] ?? null,
                $data["peso"] ?? null,
                $data["altura"] ?? null,
                $data["nome"],
                $data["segunda-feira"],
                $data["terca-feira"],
                $data["quarta-feira"],
                $data["quinta-feira"],
                $data["sexta-feira"],
                $data["sabado"],
                $data["domingo"],
                $data["email"]
            );
            array_push($dadosCompletos,$clientDTO->toArray());
            
        }
        
       
        return $this->sucesso('consulta das informações dos clientes',200,$dadosCompletos,1);
    }catch(Exception $e){
        $this->falha('falha não tratada',500,$e->getMessage(),5);
    }

}
}