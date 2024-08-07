<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="Micro-Serviço Cliente-api",
 *     version="1.0.0",
 *     description="todos os endpoints usados pelo cliente , porta local: localhost:8006 ou na vps: 195.200.5.149:8006",
 *   
 * )
 */



class AuthDocsController {
    /**
 * @OA\Post(
 *      path="/api/registrar",
 *      operationId="registrarCliente",
 *      tags={"Cliente"},
 *      summary="endpoint para registrar um novo cliente",
 *      description="",
 *      @OA\RequestBody(
 *          required=true,
 *          description="Corpo da requisição contendo os dados para criação do registro",
 *          @OA\JsonContent(
 *              required={"name", "email", "password","plano"},
 *              @OA\Property(property="name", type="string"),
 *              @OA\Property(property="email", type="string"),
 *              @OA\Property(property="password", type="string"),
 *              @OA\Property(property="idade", type="string"),
  *             @OA\Property(property="peso", type="string"),
   *            @OA\Property(property="altura", type="string"),
*              @OA\Property(property="plano", type="string", enum={"mensal", "trimestral", "semestral","anual"})
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



 public function criarConta(){

 }


  /**
 * @OA\Post(
 *      path="/api/login",
 *      operationId="loginCliente",
 *      tags={"Cliente"},
 *      summary="endpoint para login do cliente",
 *      description="",
 *      @OA\RequestBody(
 *          required=true,
 *          description="Corpo da requisição para fazer login",
 *          @OA\JsonContent(
 *              required={"email", "password"},
 *              @OA\Property(property="email", type="string"),
 *              @OA\Property(property="password", type="string"),
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Sucesso ao entrar",
 *          @OA\JsonContent(
 *              type="object",
 *              description="Resposta de sucesso",
 *              @OA\Property(property="token", type="string"),
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
 * 
 * )
 */



 public function login(){



 }

/**
     * @OA\Get(
     *      path="/api/logout",
     *      operationId="logoutCliente",
     *      tags={"Cliente"},
     *      summary="Endpoint para logout do cliente",
     *      description="Passar o token na cabeça (Authorization: Bearer {token})",
     *      @OA\Parameter(
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
     *          description="Sucesso ao entrar",
     *          @OA\JsonContent(
     *              type="object",
     *              description="Resposta de sucesso",
     *              @OA\Property(property="message", type="string"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Corpo inválido",
     *          @OA\JsonContent(
     *              type="object",
     *              description="Resposta de erro",
     *              @OA\Property(property="mensagem", type="string"),
     *              @OA\Property(property="status", type="string"),
     *              @OA\Property(property="erros", type="object")
     *          )
     *      ),
     *     
     * )
     */
 public function logout(){

 }



}