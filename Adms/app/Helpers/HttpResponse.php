<?php
namespace App\Helpers;

use App\Models\Cliente;
use Illuminate\Contracts\Support\MessageBag;
use App\Models\User;

trait HttpResponse{

    public function erroValidacao(string $messagem , int $status ,MessageBag $erros ){

        return response()->json([
           'message'=>$messagem,
           'status'=>$status,
           'erros'=>$erros,
        ],$status);
    }
    public function sucesso(string $messagem , int $status ,array $erros ){

        return response()->json([
           'message'=>$messagem,
           'status'=>$status,
           'dados'=>$erros,
        ],$status);
    }
    public function sucessoAoCriarConta(string $messagem , int $status ,User $data ){

        return response()->json([
           'message'=>$messagem,
           'status'=>$status,
           'dados'=>$data,
        ],$status);
    }

    public function falha(string $messagem , int $status , $erros ){

        return response()->json([
           'message'=>$messagem,
           'status'=>$status,
           'dados do erro'=>$erros,
        ],$status);
    }
    public function sucessoAsincrono(string $messagem , int $status , $erros ){

        return response()->json([
           'message'=>$messagem,
           'status'=>$status,
           'recibo para consulta'=>$erros,
        ],$status);
    }
    

}
