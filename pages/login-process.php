<?php 
if (!empty($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Restful client
	$response = $client->post('login', [
	'form_params' => [
		'email' 	=> $email, 
		'password' 	=> $password
	] ]);

	$code = $response->getStatusCode();
	$body = $response->getBody()->getContents();
	$body = json_decode($body);

	if (!$body->success) {
		echo "<script>showAndroidToast('Incorrect username or password!')</script>";
	} else {
		$_SESSION['logged_in'] = $body->message;
		$_SESSION['api_token'] = $body->api_token;
		header("location: index.php?page=tasks-list");
	}
}