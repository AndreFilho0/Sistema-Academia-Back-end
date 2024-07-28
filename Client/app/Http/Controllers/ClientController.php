<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\ClientRepository;

class ClientController{

    private $repository;


    public function __construct()
    {
        $this->repository = new ClientRepository();
    }


    public function getAllInformationClients(){
       
        $dados = $this->repository->allInformationClient();
        
        return $dados;
        

    }
}