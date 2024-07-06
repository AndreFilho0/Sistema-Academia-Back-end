<?php
namespace App\Repository;

use App\Models\Planos;
use App\Models\Treinos;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientRepository {

    private $plano ;

    public function __construct()
    {
        $this->plano = new Planos();
        
    
    }


    public function criarConta($dados){
       $idDoPlano = $this->pegarIdPlano($dados['plano']);
       $treino = $this->criarTreino($dados);
        $user =new  User();
        $user->idPlano = $idDoPlano;
        $user->idTreino = $treino->id;
        $user->name = $dados['name'];
        $user->email = $dados['email'];
        $user->password = Hash::make($dados['password']); 
        $user->save();

        return $user;

    }

    public function pegarIdPlano($plano){
        $idDoPlano = $this->plano->where('nome', $plano)->value('id');
        return $idDoPlano;
    }

    public function criarTreino($dados){
        $treino =  new Treinos();
        $treino->nomeCliente = $dados['name'];
        $treino->save();
        return $treino;

    }

}