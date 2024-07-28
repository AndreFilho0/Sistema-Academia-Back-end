<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ApiClient{


    public function getAllClientInformation(){

        try {

            
            $client = new Client([
                'headers' => [
                    'Connection' => "keep-alive",
                    'accept'=>'*/*',
                    'Content-Type'=>'application/json'
                    
                ],
                'verify' => false,
                

            ]);
               
          
            $response = $client->request('GET',"https://melivra.com:8008/api/all/client");
         
            $body = $response->getBody();

           
            $contents = $body->getContents();

            
          

            return $contents;
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $responseBody = $response->getBody()->getContents();
         
            return $responseBody;
        }
    }
}