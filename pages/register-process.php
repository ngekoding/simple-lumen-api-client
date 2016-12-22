<?php 
if (!empty($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Restful client
	$response = $client->post('register', [
	'form_params' => [
		'username' 	=> $username,
		'email' 	=> $email, 
		'password' 	=> $password
	] ]);

	$code = $response->getStatusCode();
	$body = $response->getBody()->getContents();
	$body = json_decode($body);

	if (!$body->success) {
		echo "<script>showAndroidToast('Try with another account!')</script>";
	} else {
		echo "<script>showAndroidToast('Register success')</script>";
	}
}