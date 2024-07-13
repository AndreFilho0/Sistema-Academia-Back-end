<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpResponse;
use App\Models\Cliente;
use App\Models\Planos;
use App\Models\Treinos;
use App\Models\User;
use App\Repository\ClientRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller{
    use HttpResponse;
    private $plano ;
    private $repository;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->plano = new Planos();
        $this->repository = new ClientRepository();
        
    
    }

    public function logout(Request $request){

        auth()->logout();

        return $this->sucesso("logout feito com sucesso",200,[],1);



    }
    

    public function login(Request $request)
    {
        
        $validar = Validator::make($request->all(),
        [
            'email'=> 'required|string',
            'password'=> 'required|string',
        ]);
        
 
        if($validar->fails()){
         return $this->erroValidacao("corpo inválido",400,$validar->errors(),4);
        }

        
        $credential =$request->only(['email','password']);

        if (! $token = auth()->attempt($credential)) {
            return $this->falha("Credencial invalida para login",401,[],4);
        }

        

        return $this->sucesso("sucesso ao fazer login, use o token abaixo agora",200,["token"=>$token],1);
    }


    public function criarConta(Request $request){
        $dados = $request->all();
        $validar = Validator::make($request->all(),
        [   
            'name'=> 'required|string',
            'email'=> 'required|string',
            'idade'=>'nullable|string',
            'peso'=>'nullable|string',
            'altura'=>'nullable|string',
            'password'=> 'required|string',
            'plano'=>'required|string|in:mensal,trimestral,semestral,anual'
        ]);
        
 
        if($validar->fails()){
         return $this->erroValidacao("corpo inválido",400,$validar->errors(),4);
        }
        try{
            DB::beginTransaction();
         $user =  $this->repository->criarConta($dados);
        }catch(QueryException $e){
            $errorCode = $e->getCode();
            $errorMessage = $e->getMessage();
            DB::rollBack();

            return $this->falha("erro ao tentar criar dado no banco",409,["codigo do erro do banco mysql"=>$errorCode,"mensagem do erro"=>$errorMessage],4);
        }
      
    
        
        return $this->sucessoAoCriarConta("conta criada",201,$user,1);


        
    }


     



}