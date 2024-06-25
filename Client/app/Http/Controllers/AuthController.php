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
    private $plano ;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->plano = new Planos();
        
    
    }

    public function logout(Request $request){

        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);



    }
    

    public function login(Request $request)
    {
        
        $validar = Validator::make($request->all(),
        [
            'email'=> 'required|string',
            'password'=> 'required|string',
        ]);
        
 
        if($validar->fails()){
         return $this->erroValidacao("corpo inválido",400,$validar->errors());
        }

        
        $credential =$request->only(['email','password']);

        if (! $token = auth()->attempt($credential)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        

        return response()->json(
            [
                'token'=>$token,
                
            ]);
    }


    public function criarConta(Request $request){
        $dados = $request->all();
        $validar = Validator::make($request->all(),
        [   
            'name'=> 'required|string',
            'email'=> 'required|string',
            'password'=> 'required|string',
            'plano'=>'required|string|in:mensal,trimestral,semestral,anual'
        ]);
        
 
        if($validar->fails()){
         return $this->erroValidacao("corpo inválido",400,$validar->errors());
        }
        
        $idDoPlano = $this->plano->where('nome', $dados['plano'])->value('id');
        $treino =  new Treinos();
        $treino->nomeCliente = $dados['name'];
        $treino->save();
        
        

        $user =new  User();
        $user->idPlano = $idDoPlano;
        $user->idTreino = $treino->id;
        $user->name = $dados['name'];
        $user->email = $dados['email'];
        $user->password = Hash::make($dados['password']); 
        $user->save();
    
        
        return $this->sucessoAoCriarConta("conta criada",200,$user);


        
    }


     



}