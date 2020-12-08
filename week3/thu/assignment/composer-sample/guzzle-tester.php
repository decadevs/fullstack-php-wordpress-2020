<?php

    require_once __DIR__.'/vendor/autoload.php';
    
    $client = new \GuzzleHttp\Client();
    //var_dump($client);

    $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
    $res = $client->request('GET', 'https://api.github.com/user', [
        'auth' => ['user', 'pass']
    ]);