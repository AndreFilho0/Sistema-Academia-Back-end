<?php

namespace App\Http\Controllers;

use App\DTOs\TabelaTreinoDTO;
use Illuminate\Http\Request;
use App\Helpers\HttpResponse;
use App\Repository\ClientRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TreinoController{

    use HttpResponse;
    private $repository;

    
    public function __construct()
    {
        $this->repository = new ClientRepository();
        
    
    }


    public function putTreino(Request $request){
      

        $validar = Validator::make($request->all(),
        [
            'segunda-feira'=> 'required',
            'terca-feira'=>'required',
            'quarta-feira'=>'required',
            'quinta-feira'=>'required',
            'sexta-feira'=>'required',
            'quarta-feira'=>'required',
            'sabado'=>'required',
            'domingo'=>'required'
        ]);
        
 
        if($validar->fails()){
         return $this->erroValidacao("corpo inválido",400,$validar->errors(),4);
        }


        $dados = new TabelaTreinoDTO(
            $request->input('segunda-feira'),
            $request->input('terca-feira'),
            $request->input('quarta-feira'),
            $request->input('quinta-feira'),
            $request->input('sexta-feira'),
            $request->input('sabado'),
            $request->input('domingo')
        );

       
        
        $idTreino = $request->user()->idTreino;
        
        try{

         $this->repository->atualizarTabelaTreino($dados,$idTreino);

        }catch(QueryException $e){
            $errorCode = $e->getCode();
            $errorMessage = $e->getMessage();
            

            return $this->falha("erro ao tentar criar dado no banco",409,["codigo do erro do banco mysql"=>$errorCode,"mensagem do erro"=>$errorMessage],4);
        }

        return $this->sucesso("tabela de treino atualizada",200,$dados,1);

        

    }

    public function getTreino(Request $request){
        
        $idTreino = $request->user()->idTreino;

       

        try{

            $tabelaTreino =  $this->repository->getTreino($idTreino);

   
           }catch(QueryException $e){
               $errorCode = $e->getCode();
               $errorMessage = $e->getMessage();
               
   
               return $this->falha("erro ao buscar tabela de treino",409,["codigo do erro do banco mysql"=>$errorCode,"mensagem do erro"=>$errorMessage],4);
           }
            $segunda = $tabelaTreino['segunda-feira'] ?? " ";
            $terca = $tabelaTreino['terca-feira'] ?? " ";
            $quarta = $tabelaTreino['quarta-feira'] ?? " ";
            $quinta = $tabelaTreino['quinta-feira'] ?? " ";
            $sexta = $tabelaTreino['sexta-feira'] ?? " ";
            $sabado = $tabelaTreino['sabado'] ?? " ";
            $domingo = $tabelaTreino['domingo']?? " ";

            $resposta = [
                "segunda-feira"=>$segunda,
                "terca-feira"=>$terca,
                "quarta-feira"=>$quarta,
                "quinta-feira"=>$quinta,
                "sexta-feira"=>$sexta,
                "sabado"=>$sabado,
                "domingo"=>$domingo
            ];
            return $this->sucesso('sucesso ao consultar tabela de treino',200,$resposta,1);


        
    }

    public function deleteTabela(Request $request){
        $idTreino = $request->user()->idTreino;
       
        try{

             $this->repository->deleteTreino($idTreino);

   
           }catch(QueryException $e){
               $errorCode = $e->getCode();
               $errorMessage = $e->getMessage();
               
   
               return $this->falha("erro ao tentar limpar registro de treino desse user",409,["codigo do erro do banco mysql"=>$errorCode,"mensagem do erro"=>$errorMessage],4);
           }

           return $this->sucesso("registro do treino limpo",200,[],1);

        


    }
}