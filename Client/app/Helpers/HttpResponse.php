<?php
namespace App\Helpers;

use App\Models\Cliente;
use Illuminate\Contracts\Support\MessageBag;
use App\Models\User;

trait HttpResponse{

    public function erroValidacao(string $messagem , int $status ,MessageBag $erros , int $codigo){

        return response()->json([
           'message'=>$messagem,
           'status'=>$status,
           'codigo' => $codigo,
           'erros'=>$erros,
        ],$status);
    }
    public function sucesso(string $messagem , int $status , $dados, int $codigo ){

        return response()->json([
           'message'=>$messagem,
           'codigo' => $codigo,
           'status'=>$status,
           'dados'=>$dados,
        ],$status);
    }
    public function sucessoAoCriarConta(string $messagem , int $status ,User $data , int $codigo ){

        return response()->json([
           'message'=>$messagem,
           'codigo' => $codigo,
           'status'=>$status,
           'dados'=>$data,
        ],$status);
    }

    public function falha(string $messagem , int $status , $erros , int $codigo ){

        return response()->json([
           'message'=>$messagem,
           'codigo'=> $codigo,
           'status'=>$status,
           'dados do erro'=>$erros,
        ],$status);
    }
    
    

}
