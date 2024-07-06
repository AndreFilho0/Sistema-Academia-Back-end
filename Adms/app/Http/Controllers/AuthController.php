<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpResponse;
use App\Models\Cliente;
use App\Models\Planos;
use App\Models\Treinos;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    use HttpResponse;
    

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        
    
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
            'password'=> 'required|string',
            'gerente'=>'required|boolean',
            'professor'=>'required|boolean',
            'recepcionista'=>'required|boolean'
        ]);
        
 
        if($validar->fails()){
         return $this->erroValidacao("corpo inválido",400,$validar->errors(),4);
        }
        
        
        
        

        $user =new  User();
        $user->gerente = $dados['gerente'];
        $user->professor = $dados['professor'];
        $user->recepcionista = $dados['recepcionista'];
        $user->name = $dados['name'];
        $user->email = $dados['email'];
        $user->password = Hash::make($dados['password']); 
        $user->save();
    
        
        return $this->sucessoAoCriarConta("conta criada",200,$user,1);


        
    }


     



}