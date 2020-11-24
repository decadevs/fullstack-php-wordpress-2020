<?php 

use \GuzzleHttp\Client as HttpClient;
use Ramsey\Uuid\Uuid;


require_once __DIR__ . '/vendor/autoload.php';

$client = new HttpClient();

$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

$payload = json_decode($response->getBody());

echo $payload->owner->login . PHP_EOL;
echo $payload->owner->avatar_url . PHP_EOL;
;

$uuid = Uuid::uuid4();

echo $uuid->toString();