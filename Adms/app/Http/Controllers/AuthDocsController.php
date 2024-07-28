<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="Micro-Serviço Adms-api",
 *     version="1.0.0",
 *     description="todos os endpoints usados pelo adms",
 *   
 * )
 */



class AuthDocsController {
    /**
 * @OA\Post(
 *      path="/api/registrar",
 *      operationId="registrarAdms",
 *      tags={"Adms"},
 *      summary="endpoint para registrar um novo adms",
 *      description="",
 *      @OA\RequestBody(
 *          required=true,
 *          description="Corpo da requisição contendo os dados para criação do registro",
 *          @OA\JsonContent(
 *              required={"name", "email", "password","gerente","professor","recepcionista"},
 *              @OA\Property(property="name", type="string"),
 *              @OA\Property(property="email", type="string"),
 *              @OA\Property(property="password", type="string"),
*               @OA\Property(property="gerente", type="boolean"),
*               @OA\Property(property="professor", type="boolean"),
*               @OA\Property(property="recepcionista", type="boolean")
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
 *      operationId="loginAdms",
 *      tags={"Adms"},
 *      summary="endpoint para login do adms",
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
     *      operationId="logoutAdms",
     *      tags={"Adms"},
     *      summary="Endpoint para logout dos adms",
     *      description="Passar o token na cabeça (Authorization: Bearer {token})",
     *      @OA\Parameter(
     *          name="Authorization",
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
/**
     * @OA\Get(
     *      path="user/All",
     *      operationId="userDados",
     *      tags={"Ver dados dos clientes"},
     *      summary="Endpoint para ver informações dos clientes ",
     *      description="Passar o token na cabeça (Authorization: Bearer {token})",
     *      @OA\Parameter(
     *          name="Authorization",
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
 public function getAllClientInformation(){


 }



}