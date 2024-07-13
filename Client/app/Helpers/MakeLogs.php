<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class MakeLogs{
    public $ativo;

    public function __construct()
    {
        $this->ativo = env('REGISTRAR_LOG');
    }

    public function registrarLogsINFO($messagem,$tipo,$dados){
       if($this->ativo){
        Log::info($messagem, [$tipo => $dados]);
       }
        
    }

    public function registrarLogsERRO($messagem,$tipo,$dados){
        if($this->ativo){
         Log::error($messagem, [$tipo => $dados]);
        }
         
     }

}
    