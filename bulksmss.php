<?php
require_once "vendor/autoload.php";
  
use GuzzleHttp\Client;
  
/*$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://example.com/',
]);
  
$response = $client->request('POST', '/api/users', [
    'json' => [
        'name' => 'null',//'Sam',
        'job' => 'null'//'Developer'
    ]
])*/
$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://sms.gikko.net//',
]);
$client->request('POST', '/communications', [
    "headers" => [
        "Authorization" => "b4f1fccb437c35cff622dfa98de19db7-d3c83fa8-b358-4040-a505-938c11cce87f"         //"Bearer TOKEN_VALUE"
    ],
    'form_params' => [
       'foo' => '0779595946',                         //'bar',
       'baz' => ['hi', 'there!']
    ]
    
]);
  
/*$body =*/                     //$response->getBody();
//$arr_body = json_decode($body);
//print_r($arr_body);

  //b4f1fccb437c35cff622dfa98de19db7-d3c83fa8-b358-4040-a505-938c11cce87f
//get status code using $response->getStatusCode();

?>