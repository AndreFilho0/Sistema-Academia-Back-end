<?php

namespace App\Http\Controllers;

class TreinoDocsController { 

    /**
 * @OA\Put(
 *      path="/api/treino",
 *      operationId="treinoCliente",
 *      tags={"Treino"},
 *      summary="endpoint para editar a tabela de treino",
 *      description="",
 *  @OA\Parameter(
*          name="Authorization Bearer",
*          in="header",
*          required=true,
*          description="Token JWT",
*          @OA\Schema(
*              type="string"
*          )
*      ),
 *      @OA\RequestBody(
 *          required=true,
 *          description="Corpo da requisição contendo os dados para update do registro",
 *          @OA\JsonContent(
 *              required={"segunda-feira", "terca-feira", "quarta-feira","quinta-feira","sexta-feira","sabado","domingo"},
 *              @OA\Property(property="segunda-feira", example="{}"),
 *              @OA\Property(property="terca-feira",example="{}"),
 *              @OA\Property(property="quarta-feira",example="{}"),
 *              @OA\Property(property="quinta-feira",example="{}"),
  *             @OA\Property(property="sexta-feira",example="{}"),
   *            @OA\Property(property="sabado",example="{}"),
*              @OA\Property(property="domingo",example="{}")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Sucesso",
 *          @OA\JsonContent(
 *              type="object",
 *              description="Resposta de sucesso",
 *              @OA\Property(property="mensagem", type="string"),
 *              @OA\Property(property="status", type="string"),
 *              @OA\Property(property="dados", type="object")
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="corpo invalido",
 *          @OA\JsonContent(
 *              type="object",
 *              description="Resposta de erro",
 *              @OA\Property(property="mensagem", type="string"),
 *              @OA\Property(property="status", type="string"),
 *              @OA\Property(property="erros", type="object")
 *          )
 *      )
 * )
 */


    public function putTreino(){

    }

     /**
 * @OA\Get(
 *      path="/api/treino",
 *      operationId="treinoClienteGet",
 *      tags={"Treino"},
 *      summary="endpoint para pegar o treino do cliente",
 *      description="",
 *  @OA\Parameter(
*          name="Authorization Bearer",
*          in="header",
*          required=true,
*          description="Token JWT",
*          @OA\Schema(
*              type="string"
*          )
*      ),
 *      @OA\Response(
 *          response=200,
 *          description="Sucesso",
 *          @OA\JsonContent(
 *              type="object",
 *              description="Resposta de sucesso",
 *              @OA\Property(property="mensagem", type="string"),
 *              @OA\Property(property="status", type="string"),
 *              @OA\Property(property="dados", type="object")
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="corpo invalido",
 *          @OA\JsonContent(
 *              type="object",
 *              description="Resposta de erro",
 *              @OA\Property(property="mensagem", type="string"),
 *              @OA\Property(property="status", type="string"),
 *              @OA\Property(property="erros", type="object")
 *          )
 *      )
 * )
 */

    public function getTreino(){

    }


/**
 * @OA\Delete(
 *      path="/api/treino",
 *      operationId="treinoClienteDelete",
 *      tags={"Treino"},
 *      summary="endpoint para pegar deletar registro atual de treino do cliente",
 *      description="",
 *  @OA\Parameter(
*          name="Authorization Bearer",
*          in="header",
*          required=true,
*          description="Token JWT",
*          @OA\Schema(
*              type="string"
*          )
*      ),
 *      @OA\Response(
 *          response=200,
 *          description="Sucesso",
 *          @OA\JsonContent(
 *              type="object",
 *              description="Resposta de sucesso",
 *              @OA\Property(property="mensagem", type="string"),
 *              @OA\Property(property="status", type="string"),
 *              @OA\Property(property="dados", type="object")
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="corpo invalido",
 *          @OA\JsonContent(
 *              type="object",
 *              description="Resposta de erro",
 *              @OA\Property(property="mensagem", type="string"),
 *              @OA\Property(property="status", type="string"),
 *              @OA\Property(property="erros", type="object")
 *          )
 *      )
 * )
 */
    public function deleteTreino(){

    }





}