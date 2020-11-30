<?php
$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');



echo $response->getStatusCode(). '<br />';

echo $response->getHeaderLine('content-type'). '<br />';

echo '<pre>';
print_r($response->getBody());