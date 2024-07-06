<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdmsRepository{



    public function criarConta($dados){
        $user =new  User();
        $user->gerente = $dados['gerente'];
        $user->professor = $dados['professor'];
        $user->recepcionista = $dados['recepcionista'];
        $user->name = $dados['name'];
        $user->email = $dados['email'];
        $user->password = Hash::make($dados['password']); 
        $user->save();
        return $user;
    }
}