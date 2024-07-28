<?php
namespace App\Repository;

use App\Models\Planos;
use App\Models\Treinos;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    
            $user = new User();
            $user->idPlano = $idDoPlano;
            $user->idTreino = $treino->id;
            $user->idade = $dados['idade'] ?? " ";
            $user->peso = $dados['peso'] ?? " ";
            $user->altura = $dados['altura'] ?? " ";
            $user->name = $dados['name'];
            $user->email = $dados['email'];
            $user->password = Hash::make($dados['password']);
            $user->save();
    
            DB::commit();
    
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

    public function atualizarTabelaTreino($dados,$id){
        DB::transaction(function () use ($dados, $id) {
            DB::table('clientes')
                ->join('treinos', 'clientes.idTreino', '=', 'treinos.id')
                ->where("treinos.id", "=", $id)
                ->update([
                    'treinos.segunda-feira' => json_encode($dados->segundaFeira,JSON_UNESCAPED_UNICODE),
                    'treinos.terca-feira' => json_encode($dados->tercaFeira,JSON_UNESCAPED_UNICODE),
                    'treinos.quarta-feira' => json_encode($dados->quartaFeira,JSON_UNESCAPED_UNICODE),
                    'treinos.quinta-feira' => json_encode($dados->quintaFeira,JSON_UNESCAPED_UNICODE),
                    'treinos.sexta-feira' => json_encode($dados->sextaFeira,JSON_UNESCAPED_UNICODE),
                    'treinos.sabado' => json_encode($dados->sabado,JSON_UNESCAPED_UNICODE),
                    'treinos.domingo' => json_encode($dados->domingo,JSON_UNESCAPED_UNICODE),
                ]);
        });

    }

    public function getTreino($id){
        $dados = Treinos::find($id);
       
       return $dados;      
                
      
    }

    public function deleteTreino($id){
        
        DB::transaction(function () use ($id) {
            DB::table('clientes')
                ->join('treinos', 'clientes.idTreino', '=', 'treinos.id')
                ->where("treinos.id", "=", $id)
                ->update([
                    'treinos.segunda-feira' => " ",
                    'treinos.terca-feira' => " ",
                    'treinos.quarta-feira' => " ",
                    'treinos.quinta-feira' => " ",
                    'treinos.sexta-feira' => " ",
                    'treinos.sabado' => " ",
                    'treinos.domingo' => " ",
                ]);
        });
      

    }

    public function allInformationClient(){

     $dados =   DB::connection('mysql')->select("SELECT
      clientes.name, clientes.idade, clientes.peso, clientes.altura, planos.nome,
      treinos.`segunda-feira`, treinos.`terca-feira`, treinos.`quarta-feira`,
      treinos.`quinta-feira`, treinos.`sexta-feira`, treinos.`sabado`, treinos.domingo,
      clientes.email FROM clientes JOIN treinos ON clientes.idTreino = treinos.id JOIN planos ON clientes.idPlano = planos.id");

      return $dados;    
    }

}