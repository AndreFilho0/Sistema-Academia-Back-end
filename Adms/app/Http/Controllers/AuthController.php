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
            'gerente'=>'required|boolean',
            'professor'=>'required|boolean',
            'recepcionista'=>'required|boolean'
        ]);
        
 
        if($validar->fails()){
         return $this->erroValidacao("corpo inválido",400,$validar->errors());
        }
        
        
        
        

        $user =new  User();
        $user->gerente = $dados['gerente'];
        $user->professor = $dados['professor'];
        $user->recepcionista = $dados['recepcionista'];
        $user->name = $dados['name'];
        $user->email = $dados['email'];
        $user->password = Hash::make($dados['password']); 
        $user->save();
    
        
        return $this->sucessoAoCriarConta("conta criada",200,$user);


        
    }


     



}