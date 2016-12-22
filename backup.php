<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'http://localhost:8000']);
$response = $client->get('tasks');
$login = $client->post('login', [
	'form_params' => [
		'email' => 'john@doe.com', 
		'password' => 'johndoe'
	]
]);

// $code = $response->getStatusCode();
$body = $login->getBody()->getContents();

$body = json_decode($body);

echo "<pre>";
var_dump($body->success);
echo "</pre>";